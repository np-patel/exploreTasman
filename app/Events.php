<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
	protected $primaryKey = 'event_id';

    public function user(){
    	return $this->belongsTo('App\User', 'eventUserId');
    }

    public function Marker_location() {
    	return $this->belongsTo('App\Marker_location', 'eventLocationId');
    }
}
