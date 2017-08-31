<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function projects()
    {
    	return $this->hasMany('App\Project');
    }

    public function proposals()
    {
    	return $this->hasMany('App\Proposal');
    }

    public function hasProposal($id)
    {
    	return $this->find($id);
    }

}
