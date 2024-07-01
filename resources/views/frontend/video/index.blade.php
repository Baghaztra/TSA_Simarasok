@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/media/frontend/images/Home.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>List Video <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">List Video</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <form action="/list-video" method="GET" class="input-group">
            <div class="form-outline flex-grow-1" data-mdb-input-init>
                <input type="search" name="q" class="form-control" placeholder="Cari Video" value="{{ request('q') }}"/>
            </div>
            <button type="submit" class="btn btn-primary">
                <i data-feather="search"></i>
            </button>
        </form>
    </div>

    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Video</span>
                    <h2 class="mb-4">List Video</h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($videos as $item) 
                    <div class="embed-responsive embed-responsive-16by9 mb-3">
                        <iframe class="embed-responsive-item" src="{{ $item['url'] }}" allowfullscreen></iframe>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
