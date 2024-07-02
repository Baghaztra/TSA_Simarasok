@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/media/frontend/images/Home.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>List Berita <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">List Berita</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrap">
        <div class="container clearfix">
            <h1> Hard News </h1>
            <div class="row">
                <div class="col-lg-8 postcontent nobottommargin clearfix">
                    <div id="posts" class="post-grid grid-container grid-2 clearfix" data-layout="fitRows">
                        @foreach ($posts as $index => $post)
                            <div class="entry clearfix">
                                <div class="entry-image">
                                    @if ($post->media->isNotEmpty())
                                        <a href="{{ asset('media/' . $post->media->first()->nama) }}" data-lightbox="image">
                                            <img class="image_fade"
                                                src="{{ asset('media/' . $post->media->first()->nama) }}"
                                                alt="{{ $post->title }}"
                                                style="width: 100%; height: 300px; object-fit: cover; object-position: center;">
                                        </a>
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                                <div class="entry-title" style="font-size:20px; margin-top: 15px; text-align: justify;">
                                    <a href="{{ route('post.hardNewsDetail', $post->slug) }}"
                                        style="color:black; text-decoration: none;">{{ $post->title }}</a>
                                </div>
                                <ul class="entry-meta clearfix">
                                    {{-- <li>{{ $post->created_at->format('d M Y') }}</li>
                                    <li><a href="#"> {{ $post->views }}</a></li> --}}
                                </ul>
                                <div class="entry-content" style="text-align:justify; margin-top: 15px;">
                                    <p>
                                        {{ Str::limit($post->content, 150, '...') }}
                                        <br />
                                        <a href="{{ route('post.hardNewsDetail', $post->slug) }}"
                                            class="more-link">Selengkapnya</a>
                                    </p>
                                    {{-- <div class="card-footer text-muted">
                                        Category: {{ $post->category }}
                                    </div> --}}

                                </div>
                                @if ($index < count($posts) - 1)
                                    <hr style="margin-top: 20px; margin-bottom: 20px; border-top: 1px solid #ccc;">
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5 mb-5">
                        <div class="col text-center">
                            <a href="{{ route('post.hardNews') }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 sidebar-widgets-wrap">
                    <div id="shortcodes" class="widget widget_links clearfix">
                        <h4>Info lainnya</h4>
                        <ul>
                            <li><a href="{{ route('post.softNews') }}">
                                    <div>Soft News</div>
                                </a></li>
                            <li><a href="{{ route('post.feature') }}">
                                    <div>Features</div>
                                </a></li>
                        </ul>
                    </div>
                    {{-- @foreach ($sidebarPosts as $index => $post)
                        <div class="entry clearfix">
                            <div class="entry-image">
                                <a href="{{ $post->media->first()->url }}" data-lightbox="image">
                                    <img class="image_fade"
                                        src="{{ asset('media/' . $post->media->first()->nama) }}"
                                        alt="{{ $post->title }}"
                                        style="width: 100%; height: 200px; object-fit: cover; object-position: center;">
                                </a>
                            </div>
                            <div class="entry-title" style="font-size:20px; margin-top: 15px; text-align: justify;">
                                <a href="{{ route('post.show', $post->id) }}" style="color:black; text-decoration: none;">{{ $post->title }}</a>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li> {{ $post->created_at->format('d M Y') }}</li>
                                <li><a href="#">{{ $post->views }}</a></li>
                            </ul>
                            <div class="entry-content" style="text-align:justify; margin-top: 15px;">
                                <p>
                                    {{ Str::limit($post->content, 150, '...') }}
                                    <br />
                                    <a href="{{ route('post.show', $post->id) }}" class="more-link">Selengkapnya</a>
                                </p>
                            </div>
                            @if ($index < count($sidebarPosts) - 1)
                                <hr style="margin-top: 20px; margin-bottom: 20px; border-top: 1px solid #ccc;">
                            @endif
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
@endsection
