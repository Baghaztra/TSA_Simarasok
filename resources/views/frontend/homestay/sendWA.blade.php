@extends('frontend.layouts.main')

@section('content')
<div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('media/' . $media) }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>Booking Homestay <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">Booking Homestay</h1>
            </div>
        </div>
    </div>
</div>
<div class="mt-3 page-wrapper p-t-130 p-b-100">
    <div class="wrapper wrapper--w680">
        <h1 class="text-center mb-2">{{ $nama }}</h1>
        <div class="card card-4 mb-6">
            <div class="card-body mb-6">
                <p>Click untuk melanjutkan pemesanan kamar pada {{ $nama }}</p>
                <a href="{{ $whatsappUrl }}" class="btn btn_primary" target="_blank">Kirim Pesan</a>
            </div>
        </div>
    </div>
</div>
@endsection
