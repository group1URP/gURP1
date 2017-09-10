<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function developer()
    {
        return $this->belongsToMany('App\Developer');
    }
}
