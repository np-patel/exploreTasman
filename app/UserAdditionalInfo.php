<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdditionalInfo extends Model
{
   protected $table = 'userAdditionalInfo';

   public function user() {
   	return $this->belongsTo('App\User');
   }
}
