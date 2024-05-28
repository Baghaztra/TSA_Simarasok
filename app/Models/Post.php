<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
