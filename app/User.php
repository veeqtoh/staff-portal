<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name', 'l_name', 'o_name', 'role', 'slug', 'email', 'password', 'admin', 'category_id', 'position_id', 'department_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function account()
    {
        return $this->hasOne('App\Account');
    }

    public function children()
    {
        return $this->hasOne('App\Children');
    }

    public function education()
    {
        return $this->hasOne('App\Education');
    }

    public function history()
    {
        return $this->hasOne('App\History');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    public function payrolls()
    {
        return $this->hasMany('App\Payroll');
    }

    public function complaints()
    {
        return $this->hasMany('App\Complaint');
    }

    public function forms()
    {
        return $this->hasMany('App\Form');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function reportsto()
    {
        return $this->hasOne('App\ReportsTo');
    }

}
