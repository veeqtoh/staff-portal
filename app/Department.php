<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function positions()
    {
        return $this->hasMany('App\Position');
    }

}


