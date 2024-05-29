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
        'slug',
        'content',
        'user_id',
        'category_id',
        'status',
    ];
    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // function gambar(){
    //     return $this->hasMany(Asset::class);
    // }
    
    public static function make_slug($judul) {
        return str_replace(' ', '-', strtolower($judul));
    }
}
