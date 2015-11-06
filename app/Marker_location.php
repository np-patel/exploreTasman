<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marker_location extends Model
{
    //
    protected $table = 'marker_location';

    public function PhotoMapImageUploader() {
    	return $this->hasMany('App\PhotoMapImageUploader', 'markerLocationId');
    }


}
