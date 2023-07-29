<?php

namespace App\Http\Controllers;

use App\Models\Seting;
use Faker\Core\Number;
use App\Models\Cashire;
use App\Models\New_P;

use App\Models\Creditor;
use App\Models\AllAccount;
use Illuminate\Http\Request;
use App\Models\ProductSimpel;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NewCasireRequest;
use App\Http\Requests\NewAccountRequest;
use App\Http\Requests\CheckCashireRequest;
use App\Http\Requests\EditLockRequest;

class SetingController extends Controller
{
    public function index()
    {
        return view('seting.index');
    }

    public function store()
    {
        return view('seting.store');
    }

    public function acco()
    {
        $all_acco = AllAccount::latest('id')->get();
        return view('seting.acco' , compact('all_acco'));
    }

    public function admin()
    {
        $cashires = Cashire::latest('id')->get();
        return view('seting.admin' , compact('cashires'));
    }
    public function lock()
    {
        return view('seting.lock');
    }
    public function edit_seting($id)
    {
        $data = Seting::find($id);
        if($data->status == 1){
            $data->update(['status'=>0]);
        }else{
            $data->update(['status'=>1]);
        }
        return response()->json(200);
    }
    public function edit_setting(Request $request)
    {
        $this->edit_seting($request->id);
    }
    public function edit_unit()
    {
        $this->edit_seting(2);
    }
    public function delete(Request $request)
    {
        $request->model::where('id' , 'Like' , '%')->delete();
        return response()->json(200);
    }

    public function edit_acco(Request $request)
    {
        Seting::where('type' , 'def_acco')->update(['status' => $request->id]);
        return response()->json(200);
    }

    public function new_acco(NewAccountRequest $request)
    {
        AllAccount::create($request->all());
        return back()->with('msg' , 'حساب جدید شما با موفقیت اضافه شد.');
    }

    public function new_cashire(NewCasireRequest $request)
    {
        Cashire::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'stuats' => 0,
        ]);
        return back()->with('msg' , 'یک صندوقدار جدید اضافه شده است.');
    }

    public function delete_cashire($id)
    {
        Cashire::where('id' , $id)->delete();
        return back()->with('msg' , 'صندوقدار مورد نظر حذف شد.');
    }

    public function check_cashire(CheckCashireRequest $request)
    {
        $count = Cashire::where(['username' => $request->username , 'password' => $request->password])->count();
        if($count == 1){
            Cashire::where(['username' => $request->username , 'password' => $request->password])->update(['stuats'=>1]);
            $user = Cashire::where(['username' => $request->username , 'password' => $request->password])->first();
            $data = ProductSimpel::where('factor_id' , null)->get();
            $creditors = Creditor::latest('id')->get();
            $menu = 'index';
            $news = New_P::latest('id')->get();
            $setting = Seting::find(11);
            session()->put('login' , $user->id);
            return view('cashier.index' , compact('data' ,'creditors' , 'menu' , 'news'));
        }else{
            return back()->with('msg' , 'با این مشخصات صندوقداری پیدا نشد');
        }
    }

    public function exit_cashire()
    {
        Cashire::whereId(session()->get('login'))->update(['stuats' => 0]);
        return redirect()->to('/');
    }

    public function edit_lock(EditLockRequest $request , $type)
    {
        Seting::where('type' , $type)->update(['username' => $request->username ,'password' => $request->password ]);
        return back()->with('msg' , 'بخش مورد نظر شما به روز رسانی شد.');
    }
}
