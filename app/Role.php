<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $tables = 'roles';

    protected $fillable = [
        'name','display_name','description'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
