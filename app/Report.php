<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'user_id', 'report_date', 'report', 
    ];

    protected $dates = ['deleted_at', 'report_date'];
	
    public function employee()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }	

}
