<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $tables = 'publications';

    protected $fillable = [
        'publication_name','website','issue','username','password','publication_type','day_due_out','publication_code','download_type'
    ];

    public function states(){
        return $this->belongsToMany('App\State');
    }

    public function getStateListAttribute(){
        return $this->states->lists('id')->toArray();
    }

    public function downloads(){
        return $this->hasMany('App\Download');
    }

}
