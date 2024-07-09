@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-wrap-2 js-fullheight" style="position: relative; overflow: hidden; height: 100vh;">
        <!-- YouTube Video Embed -->
        <iframe class="video-background"
            src="https://www.youtube.com/embed/9bLsezbwF44?si=Tcm9biHJKVxYuBOM&autoplay=0&mute=1&loop=1&playlist=9bLsezbwF44"
            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen title="YouTube Video Background"></iframe>

        <div class="overlay"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <!-- Content can be added here -->
            </div>
        </div>
    </div>

    <div class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-2">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Simarasok</span>
                    <h2 class="mb-4">Daftar Video</h2>
                </div>
            </div>
            <div class="row">
                <!-- Tambahkan konten video di sini sesuai kebutuhan -->
                <div class="card mb-2 ml-10 vb" style="width: 50%;">
                    <a href="https://www.youtube.com/watch?v=9bLsezbwF44" target="_blank" rel="noopener noreferrer" style="display: block; position: relative; width: 100%; height: 0; padding-top: 56.25%;">
                        <iframe src="https://www.youtube.com/embed/9bLsezbwF44?autoplay=0&mute=1&loop=1&playlist=9bLsezbwF44" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" class="card-img-top" alt="Ini video"></iframe>
                        <div class="card-body">
                            <p class="card-text">Goa Nan Panjang</p>
                        </div>
                    </a>
                </div>
                <div class="card mb-2" style="width: 50%;">
                    <a href="https://www.youtube.com/watch?v=9bLsezbwF44" target="_blank" rel="noopener noreferrer" style="display: block; position: relative; width: 100%; height: 0; padding-top: 56.25%;">
                        <iframe src="https://www.youtube.com/embed/9bLsezbwF44?autoplay=0&mute=1&loop=1&playlist=9bLsezbwF44" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" class="card-img-top" alt="Ini video"></iframe>
                        <div class="card-body">
                            <p class="card-text">Goa Nan Panjang</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .hero-wrap .overlay {
            z-index: 1;
        }

        .hero-wrap .container {
            position: relative;
            z-index: 2;
        }

        .video-thumbnail {
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .video-thumbnail img {
            transition: transform 0.3s ease-in-out;
        }

        .video-thumbnail:hover img {
            transform: scale(1.1);
        }

        .video-thumbnail .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .video-thumbnail:hover .overlay {
            opacity: 1;
        }

        .btn-play {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 40px;
            transition: transform 0.3s ease-in-out;
        }

        .video-thumbnail:hover .btn-play {
            transform: translate(-50%, -50%) scale(1.5);
        }

        .text h3 {
            margin-top: 15px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
@endsection
