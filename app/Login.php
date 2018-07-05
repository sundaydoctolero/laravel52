<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $tables = 'logins';

    protected $fillable = [
        'user_id','ip_address','computer_name'
    ];

}
