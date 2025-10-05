<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
      protected $fillable = [
        'name', 
        'email', 
        'password', 
        'user_type', 
       'business_name',
       'phone',
       'whatsapp_no',
       'telegram_username',
       'status'
    ];

    protected $hidden = ['password', ];
    public $timestamps = true;
    protected $table = "users";
}
