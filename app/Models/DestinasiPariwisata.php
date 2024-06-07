<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinasiPariwisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'harga',
        'notelp',
        'lokasi',
    ];

    function media(){
        return $this->hasMany(Asset::class, 'jenis_id')->where('jenis', 'destinasi');;
    }
}
