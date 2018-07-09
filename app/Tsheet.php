<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tsheet extends Model
{
    protected $tables = 'tsheets';

    protected $fillable = [
        'jobnumber_id','description','start_time','end_time','total_hours','total_records','remarks','user_id','status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function job_number(){
        return $this->belongsTo('App\JobNumber','jobnumber_id','id');
    }
}
