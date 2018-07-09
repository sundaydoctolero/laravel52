<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $tables = 'permissions';

    protected $fillable = [
        'name','display_name','description'
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
