<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyTimeRecord extends Model
{
    protected $table = "daily_time_records";

    protected $fillable = ['operator_no','dtr_date','dtr_time','dtr_code','device_id'];
}
