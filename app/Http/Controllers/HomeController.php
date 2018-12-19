<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class HomeController extends Controller
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
        // $tweets = Tweet::select("tweets.created_at as tweet_time","users.created_at as user_time", "tweets.*", "users.name")

        //DBのtableをjoinさせる
            // ->join('users','users.id','=','tweets.user_id')->get();
    
            
        // return view('home',['TweetDate' => $tweets]);
//joinさせたモデルから、情報を引っ張ってくる
        $tweets = Tweet::all();

        return view('home',['TweetDate' => $tweets]);

    }



}
