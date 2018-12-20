<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;


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
    public function __construct()
    {

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//followテーブルが取れているか確認
    $user = User::find(1);
    //もしくはUser::where('id'=>1)->get();など findby も
    dd($user->follows);

    }


}
