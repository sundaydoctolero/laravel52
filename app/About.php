<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $tables= 'abouts';

    protected $fillable = [
        'id', 'site_name', 'company_name', 'logo', 'theme', 'website'
    ];
}
