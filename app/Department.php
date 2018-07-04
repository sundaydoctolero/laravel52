<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $tables = 'departments';

    protected $fillable = [
        'dept_name','dept_code','dept_description'
    ];

    public function employee()
    {
        return $this->hasMany('App\Employee');
    }
}
