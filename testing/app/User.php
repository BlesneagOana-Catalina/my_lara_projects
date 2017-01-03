<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     protected $fillable = [
        'name',
        'email'
        'adress',
        'photo',
		'gender',
		'age',
		'programmer',
		'designer'
    ];
    protected $hidden = [
         'remember_token',
    ];
}
