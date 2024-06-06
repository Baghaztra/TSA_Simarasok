<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class UMKM extends Model
{
    use HasFactory;
    protected $table = 'umkms';
    protected $fillable = [
        'name',
        'owner',
        'notelp',
        // 'user_id',
    ];

    /* function owner(){
        return $this->belongsTo(User::class, 'user_id');
    } */

    function produk(){
        return $this->hasMany(Produk::class, 'umkm_id');
    }
}
