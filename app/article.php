<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
    public function cate()
    {
    	return $this->belongsTo('App\Cate');
    }
}
