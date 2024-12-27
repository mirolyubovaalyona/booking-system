<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name', // 'available' or 'booked'
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
