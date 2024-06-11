<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Homestay extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'notelp',
        'harga',
    ];

    function media(){
        return $this->hasMany(Asset::class, 'jenis_id')->where('jenis', 'homestay');
    }

    function bookingLog(){
        return $this->hasMany(Booking::class, 'homestay_id');
    }

    function scopeCari(Builder $query) : void {
        if (request('query')) {
            $query->where('name', 'like', '%'.request('query').'%');
        } 
    }
}
