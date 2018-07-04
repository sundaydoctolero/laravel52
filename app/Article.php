<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $tables = 'articles';

    protected $fillable = [
        'title', 'body', 'published_at',
    ];

}
