<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    protected $tables = 'outputs';

    protected $fillable = [
        'sale_records','rent_records','sequence_from','sequence_to','output_date','delivery_time','user_id'

    ];

    public function download(){
        return $this->belongsTo('App\Download');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getTotalRecordsAttribute(){
        return $this->sale_records + $this->rent_records;
    }


}
