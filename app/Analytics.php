<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    //
    public function link()
    {
    	return $this->belongsTo('App\Link', 'linkid');
    }
}
