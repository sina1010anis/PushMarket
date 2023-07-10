<?php

namespace App\Http\Controllers;

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
        return view('acco.index' , compact('accounts' , 'account_cashs' , 'account_bancks'));
    }
}
