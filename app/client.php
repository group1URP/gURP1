<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
	protected $fillable = ['user_id','business_name','business_type', 'profile_picture'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
