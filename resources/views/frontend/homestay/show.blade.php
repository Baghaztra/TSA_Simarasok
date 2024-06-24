@extends('frontend.layouts.main')

@section('content')
    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ $homestays->name }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ftco-animate">
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
                </div>
                <div class="col-md-6 ftco-animate">
                    <h3>Informasi Penginapan</h3>
                    <p><strong>Nama Destinasi :</strong> {{ $homestays->name }}</p>
                    <p><strong>Deskripsi :</strong> {{ $homestays->desc }}</p>
                    <p><strong>Harga :</strong> {{ $homestays->harga }} / Malam</p>
                    <p><strong>No. Telepon:</strong> <a href="https://api.whatsapp.com/send?phone={{ $homestays->notelp }}">{{ $homestays->notelp }}</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
