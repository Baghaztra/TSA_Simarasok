<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use Illuminate\Http\Request;

class FrontendHomestayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homestays = Homestay::latest()->cari()->paginate(6);
        return view ('frontend.homestay.index',['homestays' => $homestays]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $homestays = Homestay::with('media')->find($id);
        $homestays->desc = $this->convertOembedToIframe($homestays->desc);
        return view('frontend.homestay.show', compact('homestays'));
    }

    private function convertOembedToIframe($content)
    {
        return preg_replace_callback(
            '/<oembed url="(https:\/\/youtu\.be\/[^"]+)"><\/oembed>/',
            function ($matches) {
                $url = $matches[1];
                $embedUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $url);
                return '<iframe src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>';
            },
            $content
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
