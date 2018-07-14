<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationType extends Model
{
    protected $tables = 'publicationtypes';

    protected $fillable = [
        'publication_type','publication_description',
    ];
}
