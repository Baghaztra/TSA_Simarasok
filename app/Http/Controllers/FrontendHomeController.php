<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class FrontendHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //NYOBA AJA BLM BERHASIL :V
    public function getWeather()
    {
        $apiKey = env('SBIqQETzA6cfKh94Y6NwH9XBlS5ud9oT');
        $locationKey = '3439598'; // Simarasok location key
        $client = new Client();
        $response = $client->request('GET', "SBIqQETzA6cfKh94Y6NwH9XBlS5ud9oT", [
            'query' => [
                'apikey' => $apiKey,
                'language' => 'id-ID'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        if (isset($data[0])) {
            $currentConditions = $data[0];
        } else {
            $currentConditions = null;
        }

        return view('frontend.home.index', compact('currentConditions'));
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
