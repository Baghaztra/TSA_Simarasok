@extends('frontend.layouts.main')

@section('content')
    {{-- <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/media/frontend/images/Home.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>List Homestay <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">List Homestay</h1>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Simarasok</span>
                    <h2 class="mb-4">Booking {{ $homestay->name }}</h2>
                </div>
            </div>
            <div class="container">
                <form action="/booking/send" method="post">
                    @csrf @method('put')
                    <input type="text" name="name" placeholder="Nama pemesan" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="email" name="email" placeholder="alamat email aktif" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" name="notelp" placeholder="nomor telpon" value="{{ old('notelp') }}">
                    @error('notelp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="date" name="checkin" {{ old('checkin') }}>
                    @error('checkin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="date" name="checkout" {{ old('checkout') }}>
                    @error('checkout')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="hidden" name="umkm_id" value="{{ $homestay->id }}">
                    <button type="submit">Booking now</button>
                </form>
            </div>
        </div>
    @endsection
