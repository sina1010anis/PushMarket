<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditNumber;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\NewProduct;
use App\Models\Creditor;
use App\Models\Factors;
use App\Models\Product;
use App\Models\ProductSimpel;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CashierContoller extends Controller
{
    public function index()
    {
        $data = ProductSimpel::where('factor_id' , null)->get();
        return view('cashier.index' , compact('data'));
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

    public function save_product(Request $request)
    {
        $count_data = Product::whereBarcode($request->code)->count();
        if($count_data > 0){
            $data = Product::whereBarcode($request->code)->first();
            $count = ProductSimpel::where('product_id' , $data->id)->where('factor_id' , null)->count();
            if($count == 0){
                ProductSimpel::create([
                    'product_id' => $data->id,
                    'total_number' => 1,
                    'total_price' => $data->price,
                    'name' => $data->name,
                    'image' => $data->image,
                    'price' => $data->price,
                    'factor_id' => null,
                ]);
            }else{
                ProductSimpel::where('product_id' ,$data->id)->where('factor_id' , null)->increment('total_number' , 1);
                ProductSimpel::where('product_id' ,$data->id)->where('factor_id' , null)->increment('total_price' , $data->price);
            }
            $factor = ProductSimpel::latest('id')->where('factor_id' , null)->get();
            $product_count = ProductSimpel::where('factor_id' , null)->count();
            return ['first' => $data , 'factor' => $factor , 'total_number'=> $factor->sum('total_number'), 'total_price'=> $factor->sum('total_price') , 'number'=>$product_count];
        }else{
            $factor = ProductSimpel::latest('id')->where('factor_id' , null)->get();
            $product_count = ProductSimpel::where('factor_id' , null)->count();
            return ['first' => null , 'factor' => $factor, 'total_number'=> $factor->sum('total_number'), 'total_price'=> $factor->sum('total_price') , 'number'=>$product_count];
        }
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
        $data = Product::latest('id')->paginate(20);
        return view('cashier.products' , compact('data'));
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
        Product::latest('id')->first()->update(['name'=>$request->name,'price'=>$request->price , 'image'=> 'storage/images/'.$file->getClientOriginalName()]);
        return back()->with('msg' , 'محصول جدید اضافه شد');
    }

    public function search_product(Request $request)
    {
        $count = Product::whereBarcode($request->code)->count();
        $data =($count ==1) ? Product::whereBarcode($request->code)->first() : 'none';

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
        return view('cashier.edit_product' , ['data'=>$name]);
    }

    public function edit_product_p(EditProductRequest $request , $name)
    {

        Product::whereName($name)->update(['name' => $request->name , 'price' => $request->price , 'barcode' => $request->barcode]);;
        return redirect()->route('cashier.products')->with('msg' , 'محصول با موفقیت ویرایش شد');
    }

    public function report()
    {
        $factors = Factors::where('created_at' , '>=' , Carbon::today())->latest('id')->get();
        return view('cashier.report' , compact('factors'));
    }

    public function reprot_products(Request $request)
    {
        if(isset($request->as_date) and isset($request->ta_date)){
            $factors = Factors::where('created_at' , '>=' , $request->as_date)->where('created_at' , '<=' , $request->ta_date)->latest('id')->get();
            $date = "از تاریخ ".jdate($request->as_date)->format('%B %d، %Y')." : تا تاریخ ".jdate($request->ta_date)->format('%B %d، %Y');
        }else{
            $factors = Factors::whereDate('created_at' , $request->date)->latest('id')->get();
            $date = "تاریخ های ".jdate($request->date)->format('%B %d، %Y');
        }
        return view('cashier.report' , compact('factors' , 'date'));

    }

    public function creditor()
    {
        $creditors = Creditor::latest('id')->get();
        $receipts = Receipt::latest('id')->get();
        return view('cashier.creditor' , compact('creditors' , 'receipts'));
    }

    public function creditor_search(Request $request)
    {
        $data = collect(Creditor::where('name' , 'Like' , '%'.$request->name.'%')->get())->map(function ($item) {
            return [
                    'id' => $item['id'] ,
                    'name' => $item['name'] ,
                    'price' => $item['price'],
                    'des'=> $item['des'],
                    'created_at'=>jdate($item['created_at'])->format('%A, %d %b %y'),
                    'time'=>$item['created_at']->format('H:i:s')
                ];
        });
        return $data;
    }

    public function receipt_search(Request $request)
    {
        $data = collect(Receipt::where('name' , 'Like' , '%'.$request->name.'%')->get())->map(function ($item) {
            return [
                    'id' => $item['id'] ,
                    'name' => $item['name'] ,
                    'price' => $item['price'],
                    'created_at'=>jdate($item['created_at'])->format('%A, %d %b %y'),
                    'time'=>$item['created_at']->format('H:i:s')
                ];
        });
        return $data;
    }
}
