<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable
{
    use HasFactory;
    protected $table = 'staffs';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
       
    ];
    protected $hidden = [
        'password',
    ];
}
