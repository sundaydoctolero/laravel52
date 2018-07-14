<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationIssue extends Model
{
    protected $tables = 'publicationissues';

    protected $fillable = [
        'issue_name','issue_description',
    ];
}
