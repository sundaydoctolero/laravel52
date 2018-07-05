<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workstation extends Model
{
    protected $tables = 'workstations';

    protected $fillable = [
        'rack_id','ip_address','workstation_id', 'table', 'location', 'operator', 'comp_name', 'mac_address'
    ];
}
