<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogSheet extends Model
{
    protected $tables = 'log_sheets';

    protected $fillable = [
        'operators','batch_id','start_time','end_time','total_time','records','entry_date','status',
                'remarks','sale_rent','user_id','state'

    ];

    public function download(){
        return $this->belongsTo('App\Download');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }



}
