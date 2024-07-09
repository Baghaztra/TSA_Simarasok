@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="height: 100px; background-color: rgb(0, 0, 0)">
        <div class="overlay" style="height: 100px; background-color: rgb(0, 0, 0); color: black"></div>
    </div>

    <div class="container mt-5">
        <h1>{{ $post->title }}</h1>
        <span style="font-style: italic;"><i class="fa fa-calendar"></i> {{ $post->created_at->format('d M Y') }}</span>
        {{-- <p>Category: {{ $post->category }}</p> --}}
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="ftco-animate col-lg-6" style="">
                <div id="slider" class="carousel slide mb-3">
                    <div class="carousel-indicators" style="position: absolute; top: 10px">
                        @if ($post->media->count() > 0)
                            @foreach ($post->media as $index => $media)
                                <button type="button" data-bs-target="#slider" data-bs-slide-to="{{ $index }}"
                                    class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        @endif
                    </div>
                    <div class="carousel-inner">
                        @if ($post->media->count() > 0)
                            @foreach ($post->media as $index => $media)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    @if ($media->tipe == 'video')
                                    <video src="{{ asset('media/' . $media->nama) }}"  loading="lazy" class="d-block w-100" controls muted autoplay></video>
                                    @elseif ($media->tipe == 'gambar')
                                    <img src="{{ asset('media/' . $media->nama) }}"  loading="lazy" class="d-block w-100" alt="Gambar {{ $index + 1 }}">
                                    @elseif ($media->tipe == 'youtube')
                                    <iframe src="{{ strpos($media->nama, 'youtube.com') !== false ? str_replace('watch?v=', 'embed/', $media->nama) : (strpos($media->nama, 'youtu.be') !== false ? 'https://www.youtube.com/embed/' 
                                                    . explode('youtu.be/', $media->nama)[1] : $media->nama) }}" 
                                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen class="d-block w-100" style="height: auto">
                                    </iframe>
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
        <div class="mt-4 mb-5">
            {!! $post->content !!}
        </div>
    </div>
@endsection
