@extends('frontend.layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="hero-wrap hero-wrap-2 js-fullheight" style="position: relative;">
        <img src="/media/frontend/images/Home.jpg" alt="Background Image"
            style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: -1;">
        <div class="overlay"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: -1;">
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Hubungi Kami<i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Hubungi Kami</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="ftco-section ftco-about img"style="background-image: url(/media/frontend/images/gambar1.jpg);">
        <div class="overlay"></div>
        {{-- <div class="container py-md-5">
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

    <div class="ftco-section ftco-about ftco-no-pt img mt-6">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="img d-flex w-100 align-items-center justify-content-center"
                                style="margin-top: 50px; position: relative; width: 100%; padding-top: 56.25%;">
                                <img src="/media/frontend/images/Home.jpg" alt="Deskripsi Gambar"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">
                                    <span class="subheading">Tentang Kami</span>
                                    <h2 class="mb-4">Buatlah Kenangan Wisata yang Mengagumkan Bersama Kami</h2>
                                    <p class="text-justify">Nagari Simarasok merupakan nagari yang terletak di Kecamatan Baso, kabupaten Agam. Nagari Simarasok memiliki potensi alam yang luar biasa. Berada diketinggian 800 – 1200 mdpl dengan luas 1789 Ha nagari ini terbagi atas empat jorong yaitu jorong Simarasok, jorong Koto Tuo, jorong Kampeh dan jorong Sungai Angek. Memiliki suhu udara 20 – 24&deg;C dan curah hujan perbulannya 123,04 mm. Dengan jumlah penduduk 6.872 orang. Selain potensi alam tersebut, di Nagari Simarasok terdapat pula kekayaan budaya, kuliner dan edukasi.</p>
                                    <p><a href="#" class="btn btn-primary">Lihat Destinasi Sekarang</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="ftco-section ftco-no-pb contact-section mb-4">
        <div class="container">
            <div class="row d-flex contact-info">
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <a href="https://maps.app.goo.gl/UiZSwwi9qECuNaBcA">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-location-pin"></span>
                            </div>
                            <h3 class="mb-2">Alamat</h3>
                            <p style="color: black">Nagari Simarasok, Kecamatan Baso, Kabupaten Agam, Sumatera Barat</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <a href="https://api.whatsapp.com/send?phone=081374248212">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa-brands fa-whatsapp"></span>
                            </div>
                            <h3 class="mb-2">Nomor Kontak</h3>
                        </a>
                        <p><a href="https://api.whatsapp.com/send?phone=081374248212">081374248212 : Ifnaldi</p></a>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <a href="mailto:pesonasimarasokbaso@gmail.com">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <h3 class="mb-2">Alamat Email</h3>
                        </a>
                        <a href="mailto:pesonasimarasokbaso@gmail.com">
                            <p style="overflow-wrap: break-word; word-wrap: break-word; hyphens: auto; color: black">
                                pesonasimarasokbaso@gmail.com</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa-brands fa-instagram"></span>
                        </div>
                        <h3 class="mb-2">Instagram</h3>
                        <p><a href="https://www.instagram.com/pesona_simarasok?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">pesona_simarasok</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="ftco-section contact-section ftco-no-pt">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="POST" class="bg-light p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31918.258845647382!2d100.46979679359583!3d-0.2432759842768762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5491952f35195%3A0x6e9b1ad882fad262!2sSimarasok%2C%20Kec.%20Baso%2C%20Kabupaten%20Agam%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1717952060454!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
