<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

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

    public function firstProductImage()
    {
        $firstProduct = $this->produk()->with('media')->first();
        return $firstProduct && $firstProduct->media->count() > 0 ? $firstProduct->media[0]->nama : null;
    }

    public function scopePencarian(Builder $query)
    {
        if(request('search')){
            $query->where('name', 'like', '%'.request('search').'%')
                ->orWhere('owner', 'like', '%'.request('search').'%');
        }
    }
}
