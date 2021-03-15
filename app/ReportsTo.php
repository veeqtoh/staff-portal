<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportsTo extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User', 'reports_to');
    }
}
