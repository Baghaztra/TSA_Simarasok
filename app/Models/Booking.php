<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'notelp',
        'checkin',
        'checkout',
        'homestay_id',
        'status',
    ];

    function homestay(){
        return $this->belongsTo(Homestay::class, 'homestay_id');
    }
}
