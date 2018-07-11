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
        if($value != ''){
            $this->attributes['password'] = bcrypt($value);
        }

    }
    public function setConfirmPasswordAttribute($value){
        if($value != '') {
            $this->attributes['confirm_password'] = bcrypt($value);
        }
    }

    public function getRoleListAttribute(){
        return $this->roles->lists('id')->toArray();
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRole($roles){
        if (is_array($roles)){
            foreach($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
    }

    public function hasRole($role){
        if($this->roles->where('name',$role)->first()){
            return true;
        }
        return false;
    }

}
