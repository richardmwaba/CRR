<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_info extends Model
{
    //
    protected $fillable = [

        'other_names', 'nationality', 'department', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function user(){

        return $this->belongsTo('App\User');

    }

}
