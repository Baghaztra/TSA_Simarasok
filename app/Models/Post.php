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

    function scopeCari(Builder $query) : void {
        if (request('q')) {
            $query->where('title', 'like', '%'.request('q').'%');
        } 
    }
    
    function scopePublished(Builder $query) : void {
        $query->where('status', 'publish');
    }

    function scopeHardNews(Builder $query) : void {
        $query->where('category', 'Hard News');
    }
    function scopeSoftNews(Builder $query) : void {
        $query->where('category', 'Soft News');
    }
    function scopeFeature(Builder $query) : void {
        $query->where('category', 'Feature');
    }

    function getCleanContentAttribute()
    {
        // Menghapus tag <p>
        return strip_tags($this->attributes['content']);
    }
}
