<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
    ];

    function embedUrl(){
        $videoId = Str::afterLast($this->url, '/');
        $embedUrl = "https://www.youtube.com/embed/{$videoId}";
        return $embedUrl;
    }

    function scopeCari(Builder $query) : void {
        if (request('q')) {
            $query->where('title', 'like', '%'.request('q').'%');
        } 
    }
}
