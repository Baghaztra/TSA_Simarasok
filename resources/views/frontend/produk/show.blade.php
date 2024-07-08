@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="height: 100px; background-color: rgb(0, 0, 0)">
        <div class="overlay" style="height: 100px; background-color: rgb(0, 0, 0); color: black"></div>
    </div>
    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ $produk->name }}</h2>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 ftco-animate">
                    <img src="{{ asset('media/' . $produk->media[0]->nama) }}" class="img-fluid" alt="Gambar Produk">
                </div>
                <div class="col-md-6 ftco-animate">
                    <p class="mb-3">{!! $produk->desc !!}</p>
                    @if (is_null($produk->harga))
                        <strong> Disajikan pada {{ $produk->event }}</strong>
                    @else
                        <strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
