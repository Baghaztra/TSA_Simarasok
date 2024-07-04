<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use GuzzleHttp\Client;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\DestinasiPariwisata;
use App\Http\Controllers\Controller;

class FrontendHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $destinasis = DestinasiPariwisata::latest()->get();
        $produk = Produk::latest()->get();
        $penginapan = Homestay::latest()->get();

        // Menunggu API dari D3 Telekomunikasi
        $suhu = rand(10,30);
        
        // Menunggu data dari D4 Telekomunikasi
        $jaringan = [
            ['provider'=>'Telkomsel','speed'=>'100mbps'],
            ['provider'=>'Axis','speed'=>'1mbps'],
            ['provider'=>'Indosat','speed'=>'700mbps'],
            ['provider'=>'XL','speed'=>'50mbps'],
        ];

        return view('frontend.home.index')->with([
            'suhu' => $suhu,
            'jaringan' => $jaringan,
            'destinasis' => $destinasis,
            'produk' => $produk,
            'homestay' => $penginapan
        ]);
    }

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
}
