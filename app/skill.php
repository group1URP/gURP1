<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function developers()
    {
        return $this->belongsToMany('App\Developer');
    }
}
