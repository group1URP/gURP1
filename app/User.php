<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','is_client',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function settings()
    {
        return $this->hasOne('App\Setting');
    }

    public function client()
    {
        return $this->hasOne('App\Client');
    }

    public function developer()
    {
        return $this->hasOne('App\Developer');
    }

    /*
    //checking if the user is a client or a developer
    public function userRole(){
        if ($this->client()->where('id', $this->id)->first()){
            return "client";
        } else {
            return "developer";
        }
    }
    */



}
