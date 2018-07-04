<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $tables = 'menus';

    protected $fillable = [
        'title','icon','url'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
