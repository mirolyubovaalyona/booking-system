<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'status_id',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
