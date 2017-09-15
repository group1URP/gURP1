<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
	protected $fillable = ['user_id','profile_picture'];
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }
}
