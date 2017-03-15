<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Todo extends Model{

    protected $fillable = [
        'name',
        'user_id',
    ];

    
}
