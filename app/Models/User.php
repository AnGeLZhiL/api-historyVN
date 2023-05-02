<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_user';
    protected $fillable = [
        'last_name',
        'first_name',
        'midlle_name',
        'login',
        'password'
    ];

    protected $hidden = [
        'password'
    ];
}
