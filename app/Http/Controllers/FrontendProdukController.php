<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class FrontendProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('media')->latest()->paginate(6);
        return view('frontend.produk.index', ['produks' => $produks]);
    }

    public function show($id)
    {
        $produk = Produk::with('media')->findOrFail($id);
        return view('frontend.produk.show', ['produk' => $produk]);
    }

}
