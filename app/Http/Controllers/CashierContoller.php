<?php

namespace App\Http\Controllers;

use App\Models\Factors;
use App\Models\Product;
use App\Models\ProductSimpel;
use Illuminate\Http\Request;

class CashierContoller extends Controller
{
    public function index()
    {
        return view('cashier.index');
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
}
