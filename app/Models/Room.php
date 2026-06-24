<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['nama_kamar', 'tipe_kamar', 'harga', 'foto', 'status'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}