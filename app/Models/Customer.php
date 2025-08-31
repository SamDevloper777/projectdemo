<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
     protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];

    protected $casts = [
    'is_online' => 'boolean',
    'last_seen' => 'datetime',
];

}
