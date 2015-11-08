<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoMapImageUploader extends Model
{
    protected $table = 'photoMap_image_uploader';

    public function Marker_location() {
    	return $this->belongsTo('App\Marker_location', 'markerLocationId');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'userId');
    }
}
