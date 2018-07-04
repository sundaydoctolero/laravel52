<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $tables = 'tasks';

    protected $fillable = [
        'task_name','description','completion_date'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
