<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    function scopeCari(Builder $query) : void {
        if (request('query')) {
            $query->where('name', 'like', '%'.request('query').'%')
                  ->orWhereHas('homestay', function($q) {
                    $q->where('name', 'like', '%'.request('query').'%');
                    });
        } 
    }
}
