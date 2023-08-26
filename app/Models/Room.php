<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'beds' => 'array',
        'images' => 'array',
    ];

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'room_amenities');
    }

    // room type
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
