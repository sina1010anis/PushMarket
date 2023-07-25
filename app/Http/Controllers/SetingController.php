<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('seting.acco');
    }

    public function admin()
    {
        return view('seting.admin');
    }
    public function lock()
    {
        return view('seting.lock');
    }
}
