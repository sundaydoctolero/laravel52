<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobNumber extends Model
{
    protected $tables = 'job_numbers';

    protected $fillable = [
        'job_number_id','job_number_description','month_of'
    ];

    public function tsheets(){
        return $this->hasMany('App\Tsheet');
    }

    public function getDisplayMonthAttribute(){

        return Carbon::parse($this->attributes['month_of'])->format('F');

    }
}

