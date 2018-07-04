<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $tables = 'employees';

    protected $fillable = [
        'firstname','lastname','birthdate','gender','contact','address','designation','date_hired','date_left'
    ];
}
