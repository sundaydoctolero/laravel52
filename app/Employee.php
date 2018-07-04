<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $tables = 'employees';

    protected $fillable = [
        'dept_id','firstname','lastname','birthdate','gender','contact','address','designation','date_hired','date_left'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function department(){
        return $this->hasOne('App\Department');
    }
}
