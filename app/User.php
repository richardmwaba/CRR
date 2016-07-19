<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $incrementing = false;
    protected $primaryKey = 'man_number';

    protected $fillable = [

        'first_name', 'last_name', 'man_number', 'email', 'password', 'position','other_names', 'nationality',
        'department','man_number', 'last_modified_by', 'expires_on', 'school','department', 'contract_tracking',
        'contract_status', 'NRC', 'address', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [

        'password', 'remember_token',

    ];
}
