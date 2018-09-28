<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $tables = 'holidays';

    protected $fillable = [
        'holiday_type','holiday_code','holiday_name','holiday_rate','remarks','holiday_date'
    ];

}
