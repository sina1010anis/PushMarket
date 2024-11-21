<?php

namespace App\Http\Controllers;

use App\Execl\ExportFactor;
use App\Models\Store;
use App\Models\Seting;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\EditLockRequest;
use App\Http\Requests\NewExitRequest;
use App\Http\Requests\NewStoreRequest;
use App\Http\Requests\ReportAccoRequest;
use App\Models\ExitProduct;
use Maatwebsite\Excel\Facades\Excel;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::latest('id')->get();
        $exits = ExitProduct::latest('id')->get();
        return view('store.index' , compact('stores', 'exits'));
    }

    public function edit_product(Store $data)
    {
        return view('store.edit_product' , compact('data'));
    }

    public function edit_product_post(NewStoreRequest $request , $id)
    {
        Store::whereId($id)->update(['name' => $request->name , 'barcode' => $request->barcode , 'location' => $request->location , 'box' => $request->box , 'total_number' => $request->total_number]);
        return redirect()->route('store.index');
    }

    public function delete_store(Request $request)
    {
        Store::whereIn('id' , $request->id_store)->delete();
        return back()->with('msg' , 'محصولات مورد از انبار حذف شد');
    }


    public function delete_exit(Request $request)
    {
        ExitProduct::whereIn('id' , $request->id_store)->delete();
        return back()->with('msg' , 'محصولات مورد از بخش خروجی حذف شد');
    }

    public function new_store(NewStoreRequest $request)
    {
        Store::create([
            'name' => $request->name,
            'location' => $request->location,
            'total_number' => $request->total_number,
            'box' => $request->box,
        ]);
        return back()->with('msg' , 'یک محصول جدید به انبار اضافه شد');
    }

    public function new_exit(NewExitRequest $request)
    {
        ExitProduct::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'total_number' => $request->total_number,
            'box' => $request->box,
        ]);
        return back()->with('msg' , 'خروجی جدید به انبار اضافه شد');
    }

    public function lock_page()
    {
        if(session()->has('lock_store')){
            return view('store.lock');
        }else{
            return $this->index();
        }
    }

    public function check_store_lock(EditLockRequest $request)
    {
        $count = Seting::where(['username'=> $request->username , 'password'=> $request->password , 'type' => 'lock_store'])->count();
        if($count == 1){
            return redirect()->route('store.index');
        }else{
            return back()->with('msg' , 'نام کاربری یا رومز عبور اشتباه است');
        }
    }

    public function report(ReportAccoRequest $request)
    {

        $query = Store::where('created_at' , '>=' , $this->makeDate($request->date_as))->where('created_at' , '<=' , $this->makeDate($request->date_ta))->latest('id')->get();

        return $query;

    }

    private function makeDate($date)
    {

        $dateString = \Morilog\Jalali\CalendarUtils::convertNumbers(editDate($date), true);

        return \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y-m-d', $dateString)->format('Y-m-d');

    }

    public function exportExcel(Request $request)
    {

        return Excel::store(new ExportFactor($request->data), 'export/store.xlsx');


    }

    public function exportDownload()
    {

        $file = public_path('storage/export/store.xlsx');

        return response()->download($file, 'store.xlsx');

    }

    public function exitReport(ReportAccoRequest $request)
    {

        $query = ExitProduct::where('created_at' , '>=' , $this->makeDate($request->date_as))->where('created_at' , '<=' , $this->makeDate($request->date_ta))->latest('id')->get();

        return $query;

    }

    public function exitExportExcel(Request $request)
    {

        return Excel::store(new ExportFactor($request->data), 'export/exit.xlsx');


    }

    public function exitExportDownload()
    {

        $file = public_path('storage/export/exit.xlsx');

        return response()->download($file, 'exit.xlsx');

    }
}
