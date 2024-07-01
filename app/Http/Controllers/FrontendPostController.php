<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->cari()->paginate(6);
        return view('frontend.post.index', ['posts' => $posts]);
    }

    public function hardNews()
    {
        $posts = Post::latest()->cari()->hardNews()->paginate(6);
        return view('frontend.post.index', ['posts' => $posts]);
    }

    public function softNews()
    {
        $posts = Post::latest()->cari()->softNews()->paginate(6);
        return view('frontend.post.index', ['posts' => $posts]);
    }

    public function feature()
    {
        $posts = Post::latest()->cari()->feature()->paginate(6);
        return view('frontend.post.index', ['posts' => $posts]);
    }
}
