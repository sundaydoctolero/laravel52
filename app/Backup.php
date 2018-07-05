<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    protected $tables = 'backups';

    protected $fillable = [
        'filename','backup_size','description'
    ];
}
