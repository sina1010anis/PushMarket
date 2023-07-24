<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::latest('id')->get();
        return view('store.index' , compact('stores'));
    }

    public function edit_product(Store $data)
    {
        return view('store.edit_product' , compact('data'));
    }

    public function edit_product_post(Request $request , $id)
    {
        Store::whereId($id)->update(['name' => $request->name , 'barcode' => $request->barcode , 'location' => $request->location , 'box' => $request->box , 'total_number' => $request->total_number]);
        return redirect()->route('store.index');
    }

    public function delete_store(Request $request)
    {
        Store::whereIn('id' , $request->id_store)->delete();
        return back()->with('msg' , 'محصولات مورد از انبار حذف شد');
    }

    public function new_store(Request $request)
    {
        Store::create([
            'name' => $request->name,
            'location' => $request->location,
            'total_number' => $request->total_number,
            'box' => $request->box,
        ]);
        return back()->with('msg' , 'یک محصول جدید به انبار اضافه شد');

    }
}
