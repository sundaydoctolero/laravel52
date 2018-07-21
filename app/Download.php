<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Download extends Model
{
    protected $tables = 'downloads';

    protected $fillable = [
        'publication_id','publication_date','dop_on_website','website_update_at','time_downloaded','remarks','status','locked','locked_by',
        're_pages','paper_pages','glossy_pages','classifieds_pages','user_id','checked_by','no_of_batches','added_by'

    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function publication(){
        return $this->belongsTo('App\Publication');
    }

    public function getPagesAttribute(){
        $pages="";
        if($this->re_pages != ""){
            $pages .= 're '.$this->re_pages;
        }
        if($this->paper_pages != ""){
            $pages .= ' | paper '.$this->paper_pages;
        }
        if($this->glossy_pages != ""){
            $pages .= ' | glossy '.$this->glossy_pages;
        }
        if($this->classifieds_pages != ""){
            $pages .= ' | classifieds '.$this->classifieds_pages;
        }

        return $pages;
    }

    public function getAustralianFormatAttribute(){
        return Carbon::parse($this->publication_date)->format('d/m/Y');
    }


    public function log_sheet(){
        return $this->hasMany('App\LogSheet');
    }

    public function output(){
        return $this->hasMany('App\Output');
    }

    public function operators(){
        return $this->belongsToMany('App\User');
    }

    public function getOperatorListAttribute(){
        return $this->operators->lists('id')->toArray();
    }

    public function getOperatorNoAttribute(){
        return User::select('operator_no')->where('id',$this->locked_by)->get();
    }

    public function getOperatorNoCheckAttribute(){
        return User::select('operator_no')->where('id',$this->checked_by)->get();
    }

}
