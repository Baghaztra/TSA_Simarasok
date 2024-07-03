<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->cari()->published()->paginate(3);
        $sidebarPosts = Post::latest()->softNews()->take(3)->get()->merge(Post::latest()->feature()->take(3)->get());

        return view('frontend.post.index', [
            'posts' => $posts,
            'sidebarPosts' => $sidebarPosts,
        ]);
    }

    public function hardNews()
    {
        $posts = Post::latest()->cari()->published()->hardNews()->paginate(5);
        return view('frontend.post.hardNews', ['posts' => $posts]);
    }

    public function softNews()
    {
        $posts = Post::latest()->cari()->published()->softNews()->paginate(6);
        return view('frontend.post.softNews', ['posts' => $posts]);
    }

    public function feature()
    {
        $posts = Post::latest()->cari()->published()->feature()->paginate(6);
        return view('frontend.post.feature', ['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('frontend.post.show', compact('post'));
    }      
}
