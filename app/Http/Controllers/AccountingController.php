<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAccountRequest;
use App\Http\Requests\EditLockRequest;
use App\Http\Requests\NewAccoRequest;
use App\Http\Requests\NewAccountBankRequest;
use App\Http\Requests\NewRequestRequest;
use App\Models\Account;
use App\Models\AccountBanck;
use App\Models\AccountCash;
use App\Models\AllAccount;
use App\Models\Seting;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function check_acco_lock(EditLockRequest $request){
        $count = Seting::where(['username'=> $request->username , 'password'=> $request->password , 'type' => 'lock_acco'])->count();
        if($count == 1){
            return redirect()->route('cashier.index');
        }
    }
    public function lock()
    {
        if(session()->has('lock_acco')){
            return view('acco.lock');
        }else{
            return $this->index();
        }
    }
    public function index()
    {
        $def_acco = Seting::where('type' , 'def_acco')->first();
        $acco = AllAccount::find($def_acco->status);
        $accounts = Account::where('acco_id' , $def_acco->status)->latest('id')->get();
        $account_cashs = AccountCash::latest('id')->get();
        $account_bancks = AccountBanck::latest('id')->get();
        $menu = 'index';
        return view('acco.index' , compact('accounts' , 'account_cashs' , 'account_bancks' , 'menu' , 'acco'));
    }

    public function new_acco(NewAccoRequest $request)
    {
        Account::create([
            'total' => $request->total,
            'indebted' => $request->indebted,
            'creditor' => $request->creditor,
            'des' => $request->des,
            'acco_id' => (Seting::where('type' , 'def_acco')->first())->status,
        ]);
        return back()->with('msg' , 'یک داده جدید اضافه شد');
    }

    public function edit_acco(Account $DataAcco)
    {
        return view('acco.edit_account'  ,['data' => $DataAcco]);
    }

    public function edit_acco_post(EditAccountRequest $request , $id)
    {
        Account::whereId($id)->update(['total' => $request->total , 'indebted' => $request->indebted , 'creditor' => $request->creditor]);
        return redirect()->route('acco.index');
    }

    public function new_cash(NewRequestRequest $request)
    {
        AccountCash::create(['total'=> $request->total , 'des' => $request->des , 'stauts' => 1]);
        return back()->with('msg' , 'یک داده جدید اضافه شد');
    }
    public function new_bank(NewRequestRequest $request)
    {
        AccountBanck::create(['total'=> $request->total , 'des' => $request->des , 'stauts' => 1]);
        return back()->with('msg' , 'یک داده جدید اضافه شد');
    }

    public function edit_stauts_cash(Request $request)
    {
        if($request->type == 'cash'){
            return AccountCash::whereId($request->id)->update(['stauts' => $request->status]);
        }else{
            return AccountBanck::whereId($request->id)->update(['stauts' => $request->status]);
        }
    }

    public function report()
    {
        $menu = 'report';
        $accounts = Account::latest('id')->get();
        return view('acco.report' , compact('menu' , 'accounts'));
    }

    public function report_acco(Request $request)
    {
        $menu = 'report';
        if(isset($request->as_date) and isset($request->ta_date)){
            $accounts = Account::where('created_at' , '>=' , $request->as_date)->where('created_at' , '<=' , $request->ta_date)->latest('id')->get();
            $date = "از تاریخ ".jdate($request->as_date)->format('%B %d، %Y')." : تا تاریخ ".jdate($request->ta_date)->format('%B %d، %Y');
        }else{
            $accounts = Account::whereDate('created_at' , $request->date)->latest('id')->get();
            $date = "تاریخ های ".jdate($request->date)->format('%B %d، %Y');
        }
        return view('acco.report' , compact('accounts' , 'date' , 'menu'));

    }
}
