<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens as SanctumHasApiTokens;
use Lravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use SanctumHasApiTokens, HasFactory, Notifiable;
protected $fillable=[

'email',
'password',

];
protected $hidden= [
'password',
'remember_token',

];
protected $casts = [
     'email_verified_at' => 'datetime',
     'password' =>'hashed',

];
}
