<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    protected $tables = 'passwords';

    protected $fillable = [
        'product_key','company_name', 'user_name','password','description','account_name'
    ];
}
