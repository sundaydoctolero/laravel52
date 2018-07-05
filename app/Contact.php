<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $tables = 'contacts';

    protected $fillable = [
        'id','firstname','lastname','company_name','address','landline','website','email','mobile_1','mobile_2','skype_id'
    ];

   }