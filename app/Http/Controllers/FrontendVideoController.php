<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class FrontendVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $videos = [
            'Pemandian Batu Putiah' => "https://youtu.be/XoqO-ABX_VA",
            'Sungai Angek Rafting' => "https://youtu.be/ZppvbstTY3Y",
            'UMKM Simarasok : Kue Bolu' => "https://youtu.be/8UeUTG-ndqY",
            'Homestay Rumah Gadang'=> "https://youtu.be/vlz892nCSn0",
            'Petualangan di Bawah Pulai Camp' => "https://youtu.be/FKk_ZpmCRls",
        ];

        return view('frontend.video.index', compact('videos'));
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
        //
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
