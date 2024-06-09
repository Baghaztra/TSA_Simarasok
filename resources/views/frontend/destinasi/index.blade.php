@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/media/frontend/images/Home.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>List Destinasi <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">List Destinasi</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Destinasi</span>
                    <h2 class="mb-4">List Destinasi</h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($destinasis as $item)
                        <div class="col-md-4 ftco-animate">
                            <div class="project-wrap">
                                @if (count($item->media) > 0)
                                    <a href="#" class="img"
                                        style="background-image: url('{{ asset('media/' . $item->media[0]->nama) }}');"></a>
                                @else
                                    <div class="img"
                                        style="background-color: #f8f9fa; align-items: center; justify-content: center; display: flex;">
                                        <span style="color: #6c757d; font-size: 18px; text-align: center">Tidak ada
                                            gambar</span>
                                    </div>
                                @endif
                                <div class="text p-4">
                                    <h3>
                                        <a
                                            href="#">{{ strlen($item->name) > 15 ? substr($item->name, 0, 30) . '...' : $item->name }}</a>
                                    </h3>
                                    <p class="location"><span class="fa fa-map-marker mr-2"></span>Lokasi</p>
                                    <ul>
                                        <li style="color: black">
                                            <a href="https://api.whatsapp.com/send?phone={{ $item->notelp }}"
                                                style="color: inherit; text-decoration: none;">
                                                <span data-feather="phone-call" style="width: 16px"
                                                    class="mr-2"></span>{{ $item->notelp }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($destinasis->lastPage() > 1)
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            <ul>
                                @if ($destinasis->onFirstPage())
                                    <li class="disabled"><span>&lt;</span></li>
                                @else
                                    <li><a href="{{ $destinasis->previousPageUrl() }}">&lt;</a></li>
                                @endif

                                @foreach ($destinasis->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="disabled"><span>{{ $element }}</span></li>
                                    @endif
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $destinasis->currentPage())
                                                <li class="active"><span>{{ $page }}</span></li>
                                            @else
                                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                @if ($destinasis->hasMorePages())
                                    <li><a href="{{ $destinasis->nextPageUrl() }}">&gt;</a></li>
                                @else
                                    <li class="disabled"><span>&gt;</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endsection
