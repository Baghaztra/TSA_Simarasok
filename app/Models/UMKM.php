<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    function scopeCari(Builder $query, $term=NULL) {
        if(!empty($term)) {
            $query->where('name', 'like', '%' . $term . '%')->orWhere('owner', 'like', '%' . $term . '%');
        }
        return $query;
    }
}
