<?php

namespace App\Http\Controllers;

use App\Execl\ExportFactor;
use App\Models\New_P;
use App\Models\Seting;
use App\Models\Factors;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\Creditor;
use Illuminate\Http\Request;
use App\Models\ProductSimpel;
use Illuminate\Support\Carbon;
use App\Http\Requests\EditNumber;
use App\Http\Requests\NewProduct;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\EditLockRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditReceptRequest;
use App\Http\Requests\ReceiptNewRequest;
use App\Http\Requests\CreditorNewRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\EditCraditorRequest;
use App\Http\Requests\NewNewsRequest;
use App\Repository\Products\ProductCore;
use App\Repository\Products\ProductSimpel as ProductsProductSimpel;
use Illuminate\Support\Facades\DB;
use App\Repository\Products\SaveFactor;
use App\Repository\Products\SearchProduct;
use Maatwebsite\Excel\Facades\Excel;

class CashierContoller extends Controller
{

    public function check_cashire_lock(EditLockRequest $request)
    {
        $count = Seting::where(['username'=> $request->username , 'password'=> $request->password , 'type' => 'lock_cashire'])->count();
        if($count == 1){
            return redirect()->route('cashier.index');
        }
    }
    public function index()
    {
        $data = ProductSimpel::where('factor_id' , null)->get();
        $creditors = Creditor::latest('id')->get();
        $menu = 'index';
        $news = New_P::latest('id')->get();
        $setting = Seting::find(11);
        if($setting->status == 0)
        {
            return view('cashier.index' , compact('data' ,'creditors' , 'menu' , 'news'));
        }else{
            return view('cashier.mult_cashire');
        }
    }
    public function lock()
    {
        //session()->forget('lock_login');
        if(session()->has('lock_cashire')){
            return view('cashier.lock');
        }else{
            return $this->index();
        }

    }
    public function saveFactor()
    {

        return (new SaveFactor())->builderSaveProduct('فاکتور با موفقیت ساخته شد');

    }

    public function editTotalNumber(Request $request)
    {

        $obj_product = new ProductCore();

        if($request->mode == 'down'){

            $obj_product->decrementCountProductSimpel($request->id);

        }else{

            $obj_product->incrementCountProductSimpel($request->id);

        }

        $obj_product->updateProductSimpel($request->id);

        return $obj_product->buildOutput();
    }

    public function saveProduct(Request $request)
    {

        $obj_product = new ProductCore($request->code);

        if($obj_product->hasProduct()){

            $obj_product->firstProduct();

            if($obj_product->countProductSimpel() == 0){

                $obj_product->createProductSimpel();

            } else {

                $obj_product->incrementProductSimpel();

            }

        }

        return $obj_product->buildOutput();

    }

    public function editNumber(EditNumber $request)
    {
        $data = ProductSimpel::find($request->id);

        if($request->number > 0){

            ProductsProductSimpel::updateTotalPriceTotalNumberProductSimpleForId($request->id, $request->number, $data->price);

        }else{

            ProductsProductSimpel::deleteProductSimpleForId($request->id);

        }

        $factor = ProductsProductSimpel::getNullProduct();

        $product_count = ProductsProductSimpel::getNullProduct()->count();

        return ['first' => null , 'factor' => $factor, 'total_number'=> $factor->sum('total_number'), 'total_price'=> $factor->sum('total_price') , 'number'=>$product_count];

    }

    public function products()
    {
        $data = Product::latest('id')->paginate(7);
        $menu = 'products';

        return view('cashier.products' , compact('data' , 'menu'));
    }

    public function newProducts(Request $request)
    {
        return (new ProductCore())->createProductNullMode($request->code);
    }

    public function uNewProducts(NewProduct $request)
    {

        return (new ProductCore())->createProductFull($request);

    }

    public function search_product(Request $request)
    {

        return (new SearchProduct())->searchProductFirst($request);

        if($request->type == 'barcode'){
            $count =Product::whereBarcode($request->code)->count();
            $data =($count ==1) ? Product::whereBarcode($request->code)->first() : 'none';
        }else{
            $count =Product::where('name' , 'LIKE' , '%'.$request->name.'%')->count();
            $data =($count >= 1) ? Product::where('name' , 'LIKE' , '%'.$request->name.'%')->first() : 'none';
        }

        return $data;
    }


    public function delete_product($id)
    {
        $data = Product::find($id);
        $barcode = $data->barcode;
        $data->delete();
        return back()->with('msg' , "محصولی با بارکد {$barcode} حذف شد");
    }

    public function delete_products(Request $request)
    {
        Product::whereIn('id' , $request->check_delete)->delete();
        return back()->with('msg' , 'محصولات مورد نظر حذف شد');
    }

    public function edit_product(Product $name)
    {
        return view('cashier.edit_product' , ['data'=>$name , 'menu' => 'products']);
    }

    public function toRtoS($price)
    {
        return str_replace(',','',$price);

    }
    public function edit_product_p(EditProductRequest $request , $name)
    {
        $product = Product::whereName($name)->first();
        $price =  ($request->price == null) ? $product->price :$this->toRtoS($request->price)  ;
        Product::whereName($name)->update(['name' => $request->name , 'price' => $price, 'barcode' => $request->barcode])  ;
        return redirect()->route('cashier.products')->with('msg' , 'محصول با موفقیت ویرایش شد');
    }

    public function delete_news(NewsRequest $request)
    {
        New_P::whereIn('id' , $request->news)->delete();

        return back()->with('msg' , 'خبر های مورد نظر حذف شد');
    }

    public function newNews(NewNewsRequest $request)
    {
        New_P::create(['title' => $request->title , 'body' => $request->body]);

        return back()->with('msg' , 'خبر مورد نظر اضافه شد.');
    }
    public function report()
    {

        $factors = Factors::where('created_at' , '>=' , Carbon::today())->with('products')->latest('id')->get();

        $menu = 'report';

        return view('cashier.report' , compact('factors' , 'menu'));
    }

    public function reprotProducts(Request $request)
    {

        if($request->mode == 'bet'){


            $factors = Factors::where('created_at' , '>=' , $this->makeDate($request->date_as))->where('created_at' , '<=' , $this->makeDate($request->date_ta))->with('products')->latest('id')->get();

            $out = [];

            $report = [];

            $date_o = Carbon::parse($this->makeDate($request->date_as))->toDateString();

            $date_n = $this->makeDate($request->date_ta);

            for ($i = 0; Carbon::parse($date_o)->timestamp <= Carbon::parse($date_n)->timestamp; $i++) {

                $data = Factors::whereDate('created_at', $date_o)->sum('total_price');

                $rep = Factors::whereDate('created_at', $date_o)->with('products')->get();

                if ($rep->count() >= 1) {

                    $report[] = $rep;

                }


                $out[]=[$date_o, $data];

                $date_o = Carbon::parse($date_o)->addDays(1)->toDateString();

            }


        }else{

            $factors = Factors::whereDate('created_at' , $this->makeDate($request->date_in))->with('products')->latest('id')->get();

            $out = [[$this->makeDate($request->date_in), $factors->sum('total_price')]];

            $report = ['data' => 'بدون داده'];

        }

        return ['chart'=>$out, 'factors' => $factors, 'report' => $report];


    }

    private function reportData()
    {

        return 'ok';

    }

    private function makeDate($date)
    {


        $dateString = \Morilog\Jalali\CalendarUtils::convertNumbers($this->editDate($date), true);

        return \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y-m-d', $dateString)->format('Y-m-d');

    }

    private function editDate($date)
    {

        return substr($date, 0, 4).'-'.substr($date, 5, 2).'-'.substr($date, 8, 2);

    }

    public function creditor()
    {
        $creditors = Creditor::latest('id')->get();
        $receipts = Receipt::latest('id')->get();
        $menu = 'creditor';
        return view('cashier.creditor' , compact('creditors' , 'receipts' , 'menu'));
    }

    public function creditor_search(Request $request)
    {
        $data = collect(Creditor::where('name' , 'Like' , '%'.$request->name.'%')->get())->map(function ($item) {
            return [
                    'id' => $item['id'] ,
                    'name' => $item['name'] ,
                    'price' => $item['price'],
                    'des'=> $item['des'],
                    'time'=> (Seting::where('type' , 'time')->first()->status == 1)
                        ? $this->setCarbon($item['created_at'])->addHours(3)->addMinutes(30)->format('H:i:s')
                        :$this->setCarbon($item['created_at'])->format('H:i:s') ,
                        'created_at'=>substr(jdate($item['created_at']) , 0 , 11)
                ];
        });
        return $data;
    }
    public function setCarbon($val)
    {
        $date = new Carbon($val);

        return $date;
    }
    public function receipt_search(Request $request)
    {
        $data = collect(Receipt::where('name' , 'Like' , '%'.$request->name.'%')->get())->map(function ($item) {
            return [
                    'id' => $item['id'] ,
                    'name' => $item['name'] ,
                    'price' => $item['price'],
                    'time'=> (Seting::where('type' , 'time')->first()->status == 1)
                        ? $this->setCarbon($item['created_at'])->addHours(3)->addMinutes(30)->format('H:i:s')
                        :$this->setCarbon($item['created_at'])->format('H:i:s') ,
                    'created_at'=>substr(jdate($item['created_at']) , 0 , 11)
                ];
        });
        return $data;
    }

    public function creditor_delete(Request $request , $model)
    {
        ($model == 'creditor') ?Creditor::whereIn('id' , $request->check_delete)->delete() : Receipt::whereIn('id' , $request->check_delete_2)->delete();
        return back()->with('msg' , 'ایتم  های مورد نظر با موفقیت حذف شد.');
    }

    public function creditor_new(CreditorNewRequest $request)
    {
        Creditor::create([
            'name' => $request->name,
            'price' =>  $this->toRtoS($request->price),
            'des' => $request->des,
        ]);
        return back()->with('msg' , 'بدهکار جدید اضافه شد.');

    }

    public function receipt_new(ReceiptNewRequest $request)
    {
        Receipt::create([
            'name' => $request->name,
            'price' =>  $this->toRtoS($request->price),
        ]);
        return back()->with('msg' , 'دریافتی جدید اضافه شد.');
    }

    public function creditor_edit(Creditor $data)
    {
        $menu = 'creditor';
        return view('cashier.edit_craditor' ,compact('data' , 'menu'));
    }

    public function creditor_edit_post(EditCraditorRequest $request , $id)
    {
        $product = Creditor::whereId($id)->first();
        $price =  ($request->price == null) ? $product->price :$this->toRtoS($request->price)  ;
        Creditor::find($id)->update(['name' => $request->name , 'price' => $price , 'des' => $request->des]);
        return back()->with('msg' , 'ویرایش های لازم انجام شد.');
    }

    public function receipt_edit(Receipt $data)
    {
        $menu = 'creditor';
        return view('cashier.edit_receipt' ,compact('data' , 'menu'));

    }

    public function receipt_edit_post(EditReceptRequest $request , $id)
    {
        $product = Receipt::whereId($id)->first();
        $price =  ($request->price == null) ? $product->price :$this->toRtoS($request->price)  ;
        Receipt::find($id)->update(['name' => $request->name , 'price' => $price ]);
        return back()->with('msg' , 'ویرایش های لازم انجام شد.');
    }

    public function searchPrice(Request $request)
    {

        return (new SearchProduct())->searchProductGet($request);

    }

    public function searchProductCodeReport(Request $request)
    {

        if ($request->ajax()) {

            $id = Product::where('barcode', $request->code)->first();

            return ['name' => $id->name, 'total_price' => ProductSimpel::whereProduct_id($id->id)->get()->sum('total_price'), 'total_number' => ProductSimpel::whereProduct_id($id->id)->get()->sum('total_number')];

        }

    }

    public function exportExcel(Request $request)
    {

        return Excel::store(new ExportFactor($request->data), 'export/cashier.xlsx');

    }

    public function exportDownload()
    {

        $file = public_path('storage/export/cashier.xlsx');

        return response()->download($file, 'cashier.xlsx');

    }
}
