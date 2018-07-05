<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $tables = 'assets';

    protected $fillable = [
        'quantity','item_name','description','item_brand','item_no','status','remarks','serial_no'
    ];
    
}
