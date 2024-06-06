<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'harga',
        'umkm_id',
    ];

    function media(){
        return $this->hasMany(Asset::class, 'jenis_id')->where('jenis', 'produk');;
    }
}
