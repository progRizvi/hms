<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerUser extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    // bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class, "user_id", "id");
    }
}
