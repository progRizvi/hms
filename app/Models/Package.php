<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function packageAmenities()
    {
        return $this->hasMany(PackageAmenity::class);
    }
}
