<?php

namespace App\Http\Controllers;

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
    public function save_factor()
    {
        $products = ProductSimpel::where('factor_id' ,null)->get();
        $new_factor = Factors::create([
            'total_price'=> $products->sum('total_price'),
            'total_number'=> $products->sum('total_number')
        ]);
        ProductSimpel::where('factor_id' ,null)->update(['factor_id' => $new_factor->id]);
        return back()->with('msg' , 'فاکتور ساخته شد');
    }
    public function edit_total_number(Request $request)
    {
        $data = ProductSimpel::find($request->id);
        if($request->mode == 'down'){
            if($data->total_number > 1){
                ProductSimpel::whereId($request->id)->decrement('total_number');
            }else{
                ProductSimpel::whereId($request->id)->delete();
            }
        }else{
            ProductSimpel::whereId($request->id)->increment('total_number');
        }
        $number = ProductSimpel::find($request->id);
        ProductSimpel::where('id',$data->id)->update(['total_price' => $number->total_number*$number->price]);
        $factor = ProductSimpel::latest('id')->where('factor_id' , null)->get();
        $product_count = ProductSimpel::where('factor_id' , null)->count();
        return ['first' => null , 'factor' => $factor, 'total_number'=> $factor->sum('total_number'), 'total_price'=> $factor->sum('total_price') , 'number'=>$product_count];
    }

    public function save_product(Request $request)
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

    public function edit_number(EditNumber $request)
    {
        $data = ProductSimpel::find($request->id);
        if($request->number > 0){
            ProductSimpel::where('id',$data->id)->update(['total_number' => $request->number , 'total_price' => $request->number*$data->price]);
        }else{
            ProductSimpel::whereId($request->id)->delete();
        }
        $factor = ProductSimpel::latest('id')->where('factor_id' , null)->get();
        $product_count = ProductSimpel::where('factor_id' , null)->count();
        return ['first' => null , 'factor' => $factor, 'total_number'=> $factor->sum('total_number'), 'total_price'=> $factor->sum('total_price') , 'number'=>$product_count];

    }

    public function products()
    {
        $data = Product::latest('id')->paginate(7);
        $menu = 'products';

        return view('cashier.products' , compact('data' , 'menu'));
    }

    public function new_products(Request $request)
    {
        $count = Product::whereBarcode($request->code)->count();
        if($count == 0)
        {
            Product::create([
                'name' => null,
                'price' => null,
                'barcode' => $request->code,
                'image' => null,
                'stuats' => null,
            ]);
            return 'ok';
        }else{
            return 'no';
        }
    }

    public function u_new_products(NewProduct $request)
    {
        $file = $request->file('image');
        Storage::put("/public/images/{$file->getClientOriginalName()}" , file_get_contents($file->getRealPath()));
        Product::latest('id')->first()->update(['name'=>$request->name,'price'=> $this->toRtoS($request->price) , 'image'=> 'storage/images/'.$file->getClientOriginalName() , 'stuats' => $request->status]);
        return back()->with('msg' , 'محصول جدید اضافه شد');
    }

    public function search_product(Request $request)
    {

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

    public function new_news(NewNewsRequest $request)
    {
        New_P::create(['title' => $request->title , 'body' => $request->body]);
        return back()->with('msg' , 'خبر مورد نظر اضافه شد.');
    }
    public function report()
    {
        $factors = Factors::where('created_at' , '>=' , Carbon::today())->latest('id')->get();
        $menu = 'report';

        return view('cashier.report' , compact('factors' , 'menu'));
    }

    public function reprot_products(Request $request)
    {
        $menu = 'report';
        if(isset($request->as_date) and isset($request->ta_date)){
            $factors = Factors::where('created_at' , '>=' , $request->as_date)->where('created_at' , '<=' , $request->ta_date)->latest('id')->get();
            $date = "از تاریخ ".jdate($request->as_date)->format('%B %d، %Y')." : تا تاریخ ".jdate($request->ta_date)->format('%B %d، %Y');
        }else{
            $factors = Factors::whereDate('created_at' , $request->date)->latest('id')->get();
            $date = "تاریخ های ".jdate($request->date)->format('%B %d، %Y');
        }
        return view('cashier.report' , compact('factors' , 'date' , 'menu'));

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

    public function search_price(Request $request)
    {
        $data = ($request->model == 'price') ? Product::whereBarcode($request->code)->get() : Product::where('name','LIKE','%'.$request->name.'%')->get();
        return $data;
    }
}
