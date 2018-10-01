<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{
    protected $tables = 'exceptions';

    protected $fillable = [
        'exception_type','date_from','date_to','time_from','time_to','paid','description','user_id','approver_id','status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
