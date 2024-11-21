<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalController extends Controller
{
    public function index()
    {

        return view('cal.index');

    }
}
