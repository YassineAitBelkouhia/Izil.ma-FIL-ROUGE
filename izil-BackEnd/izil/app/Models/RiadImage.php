<?php

namespace App\Models;

use App\Models\Riad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiadImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'riad_id',
    ];

    public function riad()
    {
        return $this->belongsTo(Riad::class);
    }
}
