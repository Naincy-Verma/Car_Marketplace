<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends  Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        // 'status' if you add it later
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
    protected $table = "admins";
}
