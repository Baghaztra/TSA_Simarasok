<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function categoryBerita() {
        return Category::where('jenis','Berita')->get();
    }

    public static function categoryProduk() {
        return Category::where('jenis','Produk')->get();
    }
}
