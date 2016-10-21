<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * the attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    /**
     * the attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'photo_id',
    'role_id',
    'country_id',
    'first_name',
    'last_name',
    'email',
    'bio',
    'plays',
    'website',
    'status',
    'password',
    'phone'
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    // defining user 0:1 photo ( WHY BELONGS TO NOT HAS ONE ) ??!
    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    // define 0:m posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // country 1:1
    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function isAdmin()
    {
        if($this->role->name === "Administrator" && $this->status == "Active"){

            return true;

            }

        return false;

    }

}
