<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdditionalInfo extends Model
{
   protected $table = 'userAdditionalInfo';

   protected $primaryKey = 'UAI_id';

   protected $fillable = ['firstName', 'lastName', 'bio', 'profileImage', 'CoverImage'];

   public function user() {
   	return $this->belongsTo('App\User');
   }
}
