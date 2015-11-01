<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
     public function user(){
    	return $this->belongsTo('App\User', 'from_user');
    }

	public function post(){
		return $this->belongsTo('App\Posts','on_post');
	}
}
