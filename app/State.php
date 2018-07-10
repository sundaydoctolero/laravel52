<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $tables = 'states';

    protected $fillable = [
        'state_code','state',
    ];

    public function publications(){
        return $this->belongsToMany('App\Publication');
    }
}
