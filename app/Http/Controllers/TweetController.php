<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Tweet;


class TweetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    

    public function create(Request $request)
    {

     $tweet = new Tweet;
     $tweet -> tweet = $request -> tweet;
     $tweet -> user_id = Auth::id(); 
     $tweet -> save(); 
     return redirect('/home');
    }
}

