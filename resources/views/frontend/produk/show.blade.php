{{-- @extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/media/frontend/images/Home.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Detail Produk <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">{{ $produk->name }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ $produk->name }}</h2>
                    <p>Price: {{ $produk->price }}</p>
                    <p>{{ $produk->description }}</p>
                </div>
            </div>
            <div class="row">
                @if (is_countable($produk->media) && count($produk->media) > 0)
                    @foreach ($produk->media as $media)
                        <div class="col-md-4">
                            <img src="{{ asset('media/' . $media->nama) }}" alt="{{ $produk->name }}" class="img-fluid">
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <p class="text-center">Tidak ada gambar</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection --}}
