<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contract extends Model
{
    //
    protected $fillable = [
        'man_number', 'last_modified_by', 'renewed_on', 'expires_on'
    ];

}
