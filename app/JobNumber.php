<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobNumber extends Model
{
    protected $tables = 'job_numbers';

    protected $fillable = [
        'job_number_id','job_number_description','month_of'
    ];

    public function tsheets(){
        return $this->hasMany('App\Tsheet');
    }

}

