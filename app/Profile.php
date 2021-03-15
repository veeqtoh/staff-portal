<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use softDeletes;

    protected $fillable = ['user_id', 'gender', 'emp_id', 'avatar', 'start_date', 'nhf_no','pfa_id','rsa_pin_no','grade','r_address','p_address',
    'title','phone','d_o_b','p_o_b','nationality','state_of_origin','home_town','local_govt','marital_status','salary_basis','salary','payment_type',
    'religion','name_of_spouse','maiden_name','address_of_spouse','next_of_kin_ben','relationship_ben',
    'address_ben','tel_ben','next_of_kin_em', 'relationship_em','address_em','tel_em','disability','height',
    'weight','blood_group','genotype','hobbies','languages','indebted','debt_details','intention','convict','crime_details'];

    protected $dates = ['deleted_at', 'start_date', 'd_o_b'];

    public function getAvatarAttribute($avatar)
	{
        if(!is_null($avatar))
        {
		  return asset($avatar);
        }
        else
        {
            //return null;
            return "https://www.gravatar.com/avatar/" . md5($this->email) . "?d=identicon&s=300&r=r";
            //return "https://api.adorable.io/avatars/285/". md5($this->email) ;
        }
	}

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function pfa()
    {
    	return $this->belongsTo('App\Pfa', 'pfa_id');
    }

}
