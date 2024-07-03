@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('/media/frontend/images/Home.jpg'); height: 100px;">
        <div class="overlay" style="height: 100px;"></div>
    </div>
    <div class="container mt-5">
        <h1>{{ $post->title }}</h1>
        <span style="font-style: italic;"><i class="fa fa-calendar"></i> {{ $post->created_at->format('d M Y') }}</span>
        {{-- <p>Category: {{ $post->category }}</p> --}}
        <div>
            @if ($post->media->isNotEmpty())
                <img src="{{ asset('media/' . $post->media->first()->nama) }}" class="img-fluid" style="width: 50%; height: auto; object-fit: cover;" alt="{{ $post->title }}">
            @else
                <img src="{{ asset('path/to/placeholder/image.jpg') }}" class="img-fluid" style="width: 50%; height: auto; object-fit: cover;" alt="Placeholder Image">
            @endif
        </div>
        <div class="mt-4 mb-5">
            {!! $post->content !!}
        </div>
    </div>
@endsection
