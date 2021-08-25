<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\RiadImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riad extends Model
{
    use HasFactory;

    protected $casts = [
        'price_night' => 'float',
        'rating' => 'float',
    ];

    protected $fillable = [
        'title',
        'rating',
        'description',
        'price_night',
        'image_path',
        'numberOfRooms',
        'numberOfBathrooms',
        'city',
    ];

    public function riadimage()
    {
        return $this->hasMany(RiadImage::class);
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
