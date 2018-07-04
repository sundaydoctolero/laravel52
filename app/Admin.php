<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $guard = "admins";

    protected $tables = 'admins';

    protected $fillable = [
        'name', 'email', 'password','username','user_photo'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    public function setConfirmPasswordAttribute($value){
        $this->attributes['confirm_password'] = bcrypt($value);
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function getRoleListAttribute(){
        return $this->roles->lists('id')->toArray();
    }

}
