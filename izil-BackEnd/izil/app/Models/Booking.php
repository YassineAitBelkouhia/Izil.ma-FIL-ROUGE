<?php

namespace App\Models;

use App\Models\Riad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'riad_id',
        'user_id'
    ];

    public function riad()
    {
        return $this->belongsTo(Riad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
