<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $tables = 'tasks';

    protected $fillable = [
        'task_name','description','completion_date','status','comments','admin_id','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function admin(){
        return $this->belongsTo('App\Admin');
    }

}
