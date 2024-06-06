<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(Asset::class, 'jenis_id')->where('jenis', 'homestay');;
    }
}
