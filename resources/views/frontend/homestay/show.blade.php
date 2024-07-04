@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2 "
    style="background-image: url('{{ asset('media/' . $homestays->media[0]->nama) }}');height: 100px;">
        <div class="overlay" style="height: 100px;"></div>
    </div>
    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ $homestays->name }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3"></div>
                <div class="ftco-animate col-lg-6" style="">
                    <div id="slider" class="carousel slide mb-3">
                        <div class="carousel-indicators" style="position: absolute; top: 10px">
                            @if ($homestays->media->count() > 0)
                                @foreach ($homestays->media as $index => $media)
                                    <button type="button" data-bs-target="#slider" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                                @endforeach
                            @endif
                        </div>
                        <div class="carousel-inner">
                            @if ($homestays->media->count() > 0)
                                @foreach ($homestays->media as $index => $media)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        @if ($media->tipe == 'video')
                                        <video src="{{ asset('media/' . $media->nama) }}"  loading="lazy" class="d-block w-100" controls muted autoplay></video>
                                        @else
                                        <img src="{{ asset('media/' . $media->nama) }}"  loading="lazy" class="d-block w-100" alt="Gambar {{ $index + 1 }}">
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <div class="img" style="background-color: #f8f9fa; align-items: center; justify-content: center; display: flex;">
                                        <span style="color: #6c757d; font-size: 18px; text-align: center">Tidak ada gambar</span>
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
            <div class="row">
                {{-- <div class="col-md-6 ftco-animate">
                    <div class="project-wrap">
                        @if ($homestays->media->count() > 0)
                            @foreach ($homestays->media as $media)
                                <a href="#" class="img" style="background-image: url('{{ asset('media/' . $media->nama) }}');"></a>
                            @endforeach
                        @else
                            <div class="img" style="background-color: #f8f9fa; align-items: center; justify-content: center; display: flex;">
                                <span style="color: #6c757d; font-size: 18px; text-align: center">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>
                </div> --}}
                <div class="ftco-animate">
                    <div class="mb-5">{!! $homestays->desc !!}</div>
                    <p><strong>Harga :</strong> {{ $homestays->harga }} / Malam</p>
                    <p><strong><span data-feather="phone" style="width: 16px"
                        class="mr-2"></span></strong> <a href="https://api.whatsapp.com/send?phone={{ str_replace('+', '', $homestays->notelp) }}">{{ $homestays->notelp }}</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
