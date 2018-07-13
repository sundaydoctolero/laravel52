<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password','username','user_photo'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];



    public function setPasswordAttribute($value){
        if($value != ''){
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function setConfirmPasswordAttribute($value){
        if($value != '') {
            $this->attributes['confirm_password'] = bcrypt($value);
        }
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function tsheets(){
        return $this->hasMany('App\Tsheet');
    }

    public function setUserPhotoAttribute($value){
        $this->attributes['user_photo'] = $value->getClientOriginalName();
    }

    public function employee(){
        return $this->hasOne('App\Employee');
    }

    public function downloads(){
        return $this->hasMany('App\Download');
    }


}
