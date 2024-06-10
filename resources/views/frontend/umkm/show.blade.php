@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/media/frontend/images/Home.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span><a href="/list-umkm">List UMKM <i class="fa fa-chevron-right"></i></a></span>
                        <span>{{ $umkm->name }} <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">{{ $umkm->name }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ $umkm->name }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ftco-animate">
                    <div class="project-wrap">
                        @if (is_countable($umkm->media) && count($umkm->media) > 0)
                            <a href="#" class="img"
                                style="background-image: url('{{ asset('media/' . $umkm->media[0]->nama) }}');"></a>
                        @else
                            <div class="img"
                                style="background-color: #f8f9fa; align-items: center; justify-content: center; display: flex;">
                                <span style="color: #6c757d; font-size: 18px; text-align: center">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 ftco-animate">
                    <h3>Informasi UMKM</h3>
                    <p><strong>Pemilik:</strong> {{ $umkm->owner }}</p>
                    <p><strong>No. Telepon:</strong> <a href="https://api.whatsapp.com/send?phone={{ $umkm->notelp }}">{{ $umkm->notelp }}</a></p>
                </div>
            </div>

            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Produk</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($umkm->produk as $prdk)
                    <div class="col-md-4 ftco-animate">
                        <div class="project-wrap">
                            @if (is_countable($prdk->media) && count($prdk->media) > 0)
                                <a href="#" class="img"
                                    style="background-image: url('{{ asset('media/' . $prdk->media[0]->nama) }}');"></a>
                            @else
                                <a href="#" class="img"
                                    style="background-color: #f8f9fa; align-items: center; justify-content: center; display: flex;">
                                    <span style="color: #6c757d; font-size: 18px; text-align: center">Tidak ada gambar</span>
                                </a>
                            @endif
                            <div class="text p-4">
                                <h3>
                                    <a href="#">
                                        {{ strlen($prdk->name) > 30 ? substr($prdk->name, 0, 30) . '...' : $prdk->name }}
                                    </a>
                                </h3>
                                <p style="color: rgb(0, 0, 0)"><strong>Harga: </strong>Rp {{ number_format($prdk->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
