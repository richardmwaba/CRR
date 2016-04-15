<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
    //

{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [

        'first_name', 'password','last_name', 'man_number', 'email', 'password', 'position','other_names', 'nationality', 'department','man_number'
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
