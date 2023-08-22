<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function amenity()
    {
        return $this->belongsTo(Amenity::class, 'amenity_id', 'id');
    }

}