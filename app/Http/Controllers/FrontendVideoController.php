<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendVideoController extends Controller
{
    public function index()
    {
        $videos = [
            ['url'=>'https://www.youtube.com/watch?v=xicIX_jgfWU'],
            ['url'=>'https://www.youtube.com/watch?v=xicIX_jgfWU'],
            ['url'=>'https://www.youtube.com/watch?v=xicIX_jgfWU'],
            ['url'=>'https://www.youtube.com/watch?v=xicIX_jgfWU'],
            ['url'=>'https://www.youtube.com/watch?v=xicIX_jgfWU'],
        ];
        return view('frontend.video.index', ['videos' => $videos]);
    }
}
