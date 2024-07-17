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
                <div class="col-lg-3"></div>
                {{-- <div class="ftco-animate col-lg-6  d-flex justify-content-center mb-3">
                    <img src="{{ asset('media/' . $produk->media[0]->nama) }}" class="img-fluid" alt="Gambar Produk">
                </div> --}}

                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="ftco-animate col-lg-6" style="">
                        <div id="slider" class="carousel slide mb-3">
                            <div class="carousel-indicators" style="position: absolute; top: 10px">
                                @if ($produk->media->count() > 0)
                                    @foreach ($produk->media as $index => $media)
                                        <button type="button" data-bs-target="#slider" data-bs-slide-to="{{ $index }}"
                                            class="{{ $index === 0 ? 'active' : '' }}"
                                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-label="Slide {{ $index + 1 }}"></button>
                                    @endforeach
                                @endif
                            </div>
                            <div class="carousel-inner">
                                @if ($produk->media->count() > 0)
                                    @foreach ($produk->media as $index => $media)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            @if ($media->tipe == 'video')
                                                <video src="{{ asset('media/' . $media->nama) }}" loading="lazy"
                                                    class="d-block w-100" controls muted autoplay></video>
                                            @else
                                                <img src="{{ asset('media/' . $media->nama) }}" loading="lazy"
                                                    class="d-block w-100" alt="Gambar {{ $index + 1 }}">
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div class="carousel-item active">
                                        <div class="img"
                                            style="background-color: #f8f9fa; align-items: center; justify-content: center; display: flex;">
                                            <span style="color: #6c757d; font-size: 18px; text-align: center">Tidak ada
                                                gambar</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="ftco-animate">
                    <div class="mb-5">{!! $produk->desc !!}</div>
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
