<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAccountRequest;
use App\Http\Requests\NewAccoRequest;
use App\Http\Requests\NewAccountBankRequest;
use App\Http\Requests\NewRequestRequest;
use App\Models\Account;
use App\Models\AccountBanck;
use App\Models\AccountCash;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function index()
    {
        $accounts = Account::latest('id')->get();
        $account_cashs = AccountCash::latest('id')->get();
        $account_bancks = AccountBanck::latest('id')->get();
        $menu = 'index';
        return view('acco.index' , compact('accounts' , 'account_cashs' , 'account_bancks' , 'menu'));
    }

    public function new_acco(NewAccoRequest $request)
    {
        Account::create($request->all());
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
