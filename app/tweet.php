<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
 	protected $table = 'tweets';
 	protected $guarded = array('id');

 	public function user()
 	{
 		return $this->belongsto('App\User');
 	} 
 	
}

