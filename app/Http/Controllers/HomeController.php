<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;

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
        


        // 下と同じ意味　$follows = Follow::where('user_id'.Auth::id())->get();

        // $my_user = User::where('id',Auth::id())->get();

        // $follow = $my_user->follows;

        // //フォロー中のユーザのユーザIDを取得。hasmanyでfollowsをとってくるので、下記1行でとってこれる。


        $my_user = User::find(Auth::id()); 

        $target_id_list = [];
        foreach ($my_user->follows as $key => $follows){
            $target_id_list[] = $follows->follows_id;
        }

        $target_id_list[]= Auth::id();

        $tweets = Tweet::WhereIn('user_id',$target_id_list)->orderby('created_at','desc')->paginate(5);
        
        //試行錯誤        
        // $login = Auth::id();
              
        // $follow = Follow::where()->get();

        //配列が取得できていなかった。


        // $follow[]= 

        // $tweets = Tweet::where('user_id' , $follow or $login)->get();



        // ここでtweetsの、user_idがログイン中ユーザーと同じもの、followsのfollows_idが同じものを取得

        //これhasmanyちゃんと使えたらこんな変なこと思いつかずに済んだ気がする。

        // $tweets = Tweet::select('tweet','user_id')->join( 'follows','follows.follows_id','=','tweets.user_id')->get();

        // $tweets = Tweet::all();




        return view('home',['TweetDate' => $tweets]);


                    // タイムラインにフォローしてるユーザのツイートを表示


                    // DBをいじる

                        // tweetsとfollowsを結合させる
                        // ログインしてるユーザーのツイートと、followsのfollows_idとtweetsのuser_idと一致してるものを持ってくる

                    //例 ①フォロー中の情報を取得
                    //  ②①と自分のidも含める
                    //  ③②のidを含むpostを取得し投稿順に並べる

                    // TweetDateとして渡す

                    

    }



}
