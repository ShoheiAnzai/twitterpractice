<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     // * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $string = "10";

        return view('layouts.same1',["name" => $string]);
   


    }

    public function index2()
    {
        return view('layouts.same1');
    }


}
