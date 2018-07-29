<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index($name)
    {
    	return view('abc')->with('name',$name);
    }
}
