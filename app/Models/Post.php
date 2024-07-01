<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//delete
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
        'status',
    ];
    function media(){
        return $this->hasMany(Asset::class, 'jenis_id')->where('jenis', 'post');
    }

    public static function make_slug($judul) {
        return str_replace(' ', '-', strtolower($judul));
    }

    function scopeHardNews(Builder $query) : void {
        $query->where('category', 'is', 'Hard News');
    }
    function scopeSoftNews(Builder $query) : void {
        $query->where('category', 'is', 'Soft News');
    }
    function scopeFeature(Builder $query) : void {
        $query->where('category', 'is', 'Feature');
    }
}
