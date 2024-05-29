<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'gambar',
        'user_id',
        'category_id',
        'content',
        'tanggal_post',
    ];
    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public static function make_slug($judul) {
        return str_replace(' ', '-', strtolower($judul));
    }
}
