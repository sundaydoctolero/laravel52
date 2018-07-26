<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $tables = 'images';

    protected $fillable = [
    'image_name', 'image_path'
    ];

}
