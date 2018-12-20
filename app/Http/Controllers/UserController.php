<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
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
      //自分以外全員のデータをとってくる。自分を除いて全部取るか、全部とって自分を除くか。

	  //アクセスしてる人のidを持ってくる。
    //dd( Auth::id());
    	$my_user = User::find(Auth::id());
    	$follow_id_list = [];

    	foreach($my_user->follows as $key => $follow){
    		$follow_id_list[] = $follow->follows_id;
    	}
    	$follow_id_list[] = Auth::id();

    	$users = User::whereNotIn('id',[Auth::id()])->get();

    	return view('list',['users' => $users, 'follow_id_list' => $follow_id_list]);

    }

}
