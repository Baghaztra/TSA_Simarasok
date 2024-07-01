@extends('frontend.layouts.main')
@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('/media/frontend/images/Home.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading">Welcome to Simarasok</span>
                    <h1 class="mb-4">Nagari Awak Basamo</h1>
                    <p class="caps">Travel to the any corner of the world, without going around in circles</p>
                </div>
                {{-- <a href="https://www.youtube.com/watch?v=xicIX_jgfWU"
                    class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                    <span class="fa fa-play"></span>
                </a> --}}
                {{-- <iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe> --}}
                {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/z3OfmuNMIDI?si=d7eXBkWIdbWBA47H"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay1; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" class="popup-vimeo" allowfullscreen></iframe> --}}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.popup-vimeo').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
    </script>
    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftco-search d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1"
                                        role="tab" aria-controls="v-pills-1" aria-selected="true">Laporan Terkini</a>
                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-nextgen-tab">
                                        <form action="#" class="search-property-1">
                                            <div class="row no-gutters">
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="">Cuaca</label>
                                                        <p id="suhu">26</p>
                                                        <div class="form-field">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="#">Top Destinasi</label>
                                                        <div class="form-field">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="#">Top Homestay</label>
                                                        <div class="form-field">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="#">Best UMKM</label>
                                                        <div class="form-field">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ftco-section services-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100">
                        <span class="subheading">Simarasok Website</span>
                        <h2 class="mb-4">It's time to start your adventure</h2>
                        <p>Nagari Simarasok merupakan nagari yang terletak di Kecamatan Baso, kabupaten Agam.  Nagari Simarasok memiliki potensi alam yang luar biasa. Berada diketinggian 800 – 1200 mdpl dengan luas 1789 Ha nagari ini terbagi atas empat jorong yaitu jorong Simarasok, jorong Koto Tuo, jorong Kampeh dan jorong Sungai Angek. Memiliki suhu udara 20 – 24oC dan curah hujan perbulannya 123,04 mm. Dengan jumlah penduduk 6.872 orang.Selain potensi alam tersebut, di Nagari Simarasok terdapat pula kekayaan budaya, kuliner dan edukasi.</p>
                        <p><a href="/list-destinasi" class="btn btn-primary py-3 px-4">Search Destination</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-1 d-block img"
                                style="background-image: url(/media/frontend/images/Home.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-paragliding"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Activities</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img"
                                style="background-image: url(/media/frontend/images/Home.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-route"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Travel Arrangements</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-3 d-block img"
                                style="background-image: url(/media/frontend/images/Home.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-tour-guide"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Private Guide</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-4 d-block img"
                                style="background-image: url(/media/frontend/images/Home.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-map"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Location Manager</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Destinasi</span>
                    <h2 class="mb-4">Top Destination</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($destinasis as $index => $item)
                    @if ($index >= 6)
                    @break
                @endif
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap"
                        style="background-color: white; box-shadow: 0 4px 8px rgba(163, 163, 163, 0.2);">
                        @if (count($item->media) > 0)
                            <a href="{{ route('destinasi.show', ['id' => $item->id]) }}" class="img"
                                style="background-image: url('{{ asset('media/' . $item->media[0]->nama) }}');"></a>
                        @endif
                        <div class="text p-4">
                            <h3><a
                                    href="#">{{ strlen($item->name) > 15 ? substr($item->name, 0, 30) . '...' : $item->name }}</a>
                            </h3>
                            <p class="location mb-1 fs-12"><span class="fa fa-map-marker mr-2"> <a href="{{ $item->lokasi }}"></span>Lihat Lokasi</a></p>
                            <ul>
                                <span data-feather="percent" style="width: 16px; color: rgb(86, 86, 86)"></span>
                                <li style="color: rgb(86, 86, 86)">RP.
                                    {{ number_format($item->harga, 2, ',', '.') }}/orang</li>
                            </ul>
                            <ul>
                                <a href=""></a>
                                <li style="color: black"><a
                                        href="https://api.whatsapp.com/send?phone={{ str_replace('+', '', $item->notelp) }}"
                                        style="color: inherit; text-decoration: none;">
                                        <span data-feather="phone-call" style="width: 16px"
                                            class="mr-2"></span>{{ $item->notelp }}
                                    </a></li>
                            </ul>
                            <ul>
                                <li class="btn btn-outline rounded-2 btn-sm mt-2"><a href="{{ route('destinasi.show', ['id' => $item->id]) }}">Detail</a></li>
                                {{-- ini kalau ada booking destinasi --}}
                                {{-- <li>
                                    <form method="POST" action="/booking-wisata">
                                        @csrf
                                        <input type="hidden" name="destinasi_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-primary rounded-2 btn-sm mt-2">Detail
                                            Destinasi</button>
                                    </form>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col text-center mt-4">
                <p><a href="/list-destinasi" class="btn btn-primary">Lihat Destinasi Lainnya</a></p>
            </div>
        </div>
    </div>
</div>

<div class="ftco-section img ftco-select-destination" style="background-image: url(/media/frontend/images/GreyBG.jpg);">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Usaha Mikro Kecil Menengah</span>
                <h2 class="mb-4">TOP Produk UMKM</h2>
            </div>
        </div>
    </div>
    <div class="container container-2">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-destination owl-carousel ftco-animate">
                    @foreach ($umkms as $item)
                        <div class="item">
                            <div class="project-destination">
                                @if ($item->produk->isNotEmpty() && $item->produk[0]->media->isNotEmpty())
                                    <a href="{{ route('umkm.show', $item->id) }}" class="img" style="background-image: url('{{ asset('media/' . $item->produk[0]->media[0]->nama) }}');">
                                        <div class="text">
                                            <h3>{{ $item->name }}</h3>
                                            <span>Lihat Produk</span>
                                        </div>
                                    </a>
                                @else
                                    <a href="#" class="img" style="background-image: url('/media/frontend/images/default.jpg');">
                                        <div class="text">
                                            <h3>{{ $item->name }}</h3>
                                            <span>{{ $item->produk->count() }} Produk</span>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<div class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Penginapam</span>
                <h2 class="mb-4">Top Penginapan</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($homestay as $index => $item)
                @if ($index >= 6)
                @break
            @endif
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap"
                    style="background-color: white; box-shadow: 0 4px 8px rgba(163, 163, 163, 0.2);">
                    @if (count($item->media) > 0)
                        <a href="{{ route('destinasi.show', ['id' => $item->id]) }}" class="img"
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
                                href="{{ route('destinasi.show', ['id' => $item->id]) }}">{{ strlen($item->name) > 15 ? substr($item->name, 0, 15) . '...' : $item->name }}</a>
                        </h3>
                        <p class="location mb-1"><span class="fa fa-map-marker mr-2"></span>Lokasi</p>
                        <ul>
                            <span data-feather="percent" style="width: 16px; color: rgb(86, 86, 86)"></span>
                            <li style="color: rgb(86, 86, 86)">RP.
                                {{ number_format($item->harga, 2, ',', '.') }}/orang</li>
                        </ul>
                        <ul>
                            <li style="color: black">
                                <a href="https://api.whatsapp.com/send?phone={{ str_replace('+', '', $item->notelp) }}"
                                    style="color: inherit; text-decoration: none;">
                                    <span data-feather="phone-call" style="width: 16px"
                                        class="mr-2"></span>{{ $item->notelp }}
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li class="btn btn-outline rounded-2 btn-sm mt-2"><a href="{{ route('homestay.show', ['id' => $item->id]) }}">Detail</a></li>
                            <li>
                                {{-- <form method="POST" action="/booking">
                                    @csrf
                                    <input type="hidden" name="homestay_id" value="{{ $item->id }}"> --}}
                                    <a href="https://api.whatsapp.com/send?phone={{ str_replace('+', '', $item->notelp) }}" target="_blank" class="btn btn-primary rounded-2 btn-sm mt-2">Pesan
                                        Sekarang</a>
                                {{-- </form> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="col text-center mt-4">
            <p><a href="/list-homestay" class="btn btn-primary">Lihat Penginapan Lainnya</a></p>
        </div>
    </div>
</div>
</div>


{{-- <div class="ftco-section ftco-about img"style="background-image: url(/media/frontend/images/gambar1.jpg);">
<div class="overlay"></div>
<div class="container py-md-5">
    <div class="row py-md-5">
        <div class="col-md d-flex align-items-center justify-content-center">
            <a href="https://vimeo.com/45830194"
                class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                <span class="fa fa-play"></span>
            </a>
        </div>
    </div>
</div>
</div> --}}

{{-- <div class="ftco-section ftco-about ftco-no-pt img">
<div class="container">
    <div class="row d-flex">
        <div class="col-md-12 about-intro">
            <div class="row">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="img d-flex w-100 align-items-center justify-content-center"
                        style="background-image:url(/media/frontend/images/Home.jpg);">
                    </div>
                </div>
                <div class="col-md-6 pl-md-5 py-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <span class="subheading">About Us</span>
                            <h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                Consonantia, there live the blind texts. Separated they live in Bookmarksgrove
                                right at the coast of the Semantics, a large language ocean.</p>
                            <p><a href="#" class="btn btn-primary">Book Your Destination</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> --}}
@endsection
