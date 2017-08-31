<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
