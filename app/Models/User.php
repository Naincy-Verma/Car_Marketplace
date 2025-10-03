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
        'phone',
        'whatsapp', 
        'telegram', 
        'status'
    ];
    protected $hidden = ['password', 'remember_token'];
    public $timestamps = true;
    protected $table ="customers";
}
