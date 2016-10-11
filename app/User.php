<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * the attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role_id',
        'photo_id',
        'status',
        'password',
        'phone'
    ];

    /**
     * the attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    // defining user 0:1 photo ( WGY BELONGSTO NOT HAS ONE ) ??!
    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin()
    {
        if($this->role->name === "Administrator" && $this->status == "Active"){

            return true;

            }

        return false;


    }
}
