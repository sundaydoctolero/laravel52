<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $tables = 'days';

    protected $fillable = [
        'day_name','day_code',
    ];

    public function days(){
        return $this->belongsToMany('App\Publication');
    }
}
