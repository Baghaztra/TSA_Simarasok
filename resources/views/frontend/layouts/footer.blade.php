<footer class="ftco-footer bg-bottom ftco-no-pt" style="position: relative; z-index: 2;">
    <img src="{{ asset('/media/frontend/images/GreyBG.jpg') }}" alt="Background Image"
        style="width: 100%; height: auto; object-fit: cover; position: absolute; top: 0; left: 0; z-index: -1;">
    {{-- <style>
        .card-box {
            padding: 20px;
            border-radius: 3px;
            margin-bottom: 30px;
            background-color: #fff;
            display: none;
            /* Initially hide the card */
        }

        .social-links li a {
            border-radius: 50%;
            color: rgba(121, 121, 121, .8);
            display: inline-block;
            height: 30px;
            line-height: 27px;
            border: 2px solid rgba(121, 121, 121, .5);
            text-align: center;
            width: 30px
        }

        .social-links li a:hover {
            color: #797979;
            border: 2px solid #797979
        }

        .thumb-lg {
            height: 88px;
            width: 88px;
        }

        .img-thumbnail {
            padding: .25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            max-width: 100%;
            height: auto;
        }

        .text-pink {
            color: #ff679b !important;
        }

        .btn-rounded {
            border-radius: 2em;
        }

        .text-muted {
            color: #98a6ad !important;
        }

        h4 {
            line-height: 22px;
            font-size: 18px;
        }

        .btn-primary {
            background-color: white;
            color: #007bff;
        }

        .btn-primary:hover {
            background-color: #007bff;
            color: white;
        }
    </style> --}}
    <script>
        function showCard(cardId) {
            document.querySelectorAll('.card-box').forEach(card => card.style.display = 'none');
            document.getElementById(cardId).style.display = 'block';
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.card-box').forEach(card => card.style.display = 'none');
            document.getElementById('card-trpl').style.display = 'block';
        });
    </script>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">Developer</h2>
                    <p class="text-justify">
                        <abbr title="Talent Scouting Academic Project Base Learning">TSA-PBL</abbr>, salah satu program
                        <abbr title="Merdeka Belajar Kampus Merdeka">MBKM</abbr> dalam pengembangan skill mahasiswa yang
                        berjalan di dalam kampus dengan menggabungkan beberapa program studi dan jurusan di <abbr
                            title="Politeknik Negeri Padang">PNP</abbr> </br>
                        </p>
                        <p>
                            <a target="_blank" href="https://www.instagram.com/tsa.pnp/"><span
                                class="fa fa-instagram" style="color: gray"></span> @tsa.pnp</a></li>
                        </p>
                </div>

            </div>
            <div class="col-md pt-5 border-left">
                <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">TSA-PBL PNP 2024</h2>
                    <ul class="list-unstyled">
                        <li><a target="_blank" href="https://ti.pnp.ac.id/" class="py-2 d-block">Teknologi Informasi</a>
                        </li>
                        <li><a target="_blank" href="https://an.pnp.ac.id/" class="py-2 d-block">Administrasi Niaga</a>
                        </li>
                        <li><a target="_blank" href="https://bing.pnp.ac.id/" class="py-2 d-block">Bahasa Inggris</a>
                        </li>
                        <li><a target="_blank" href="https://elektro.pnp.ac.id/" class="py-2 d-block">Teknik Elektro</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md pt-5 border-left">
                <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Ucapan terima kasih</h2>
                    <ul class="list-unstyled">
                        <li><a class="py-2 d-block">Koordinator MBKM PNP</a></li>
                        <li><a class="py-2 d-block">Kaprodi</a></li>
                        <li><a class="py-2 d-block">Dosen pembimbing</a></li>
                        <li><a class="py-2 d-block">Rekan Mahasiswa</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <h1 class="ftco-heading-2 fs-5 fw-bold">TSA TEAM</h1>
        <div class="row d-flex justify-content-center">
            <div class="mb-5" style="gap: 200px ">
                <a class="btn dropdown-toggle m-2 btn-sm" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="background-color: rgb(152, 151, 151); color: white">
                    D4 TRPL
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Mahasiswa</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Baghaztra Van Rill</a></li>
                    <li><a class="dropdown-item" href="#">Ibrahim Risyad</a></li>
                    <li><a class="dropdown-item" href="#">Firman Ardiansyah</a></li>
                    <li><a class="dropdown-item" href="#">Sakinah Rahmawati</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Dosen Pembimbing</a></li>
                    <li><a class="dropdown-item" href="#">Roni Putra</a></li>
                    <li><a class="dropdown-item" href="#">Deni Satria</a></li>
                </ul>
                <a class="btn dropdown-toggle m-2 btn-sm" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="background-color: rgb(152, 151, 151); color: white">
                    D3 Teknik Komputer
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Mahasiswa</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Baghaztra Van Rill</a></li>
                    <li><a class="dropdown-item" href="#">Ibrahim Risyad</a></li>
                    <li><a class="dropdown-item" href="#">Firman Ardiansyah</a></li>
                    <li><a class="dropdown-item" href="#">Sakinah Rahmawati</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Dosen Pembimbing</a></li>
                    <li><a class="dropdown-item" href="#">Roni Putra</a></li>
                    <li><a class="dropdown-item" href="#">Deni Satria</a></li>
                </ul>
                <a class="btn dropdown-toggle m-2 btn-sm" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="background-color: rgb(152, 151, 151); color: white">
                    D3 Teknik Telekomunikasi
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Mahasiswa</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Baghaztra Van Rill</a></li>
                    <li><a class="dropdown-item" href="#">Ibrahim Risyad</a></li>
                    <li><a class="dropdown-item" href="#">Firman Ardiansyah</a></li>
                    <li><a class="dropdown-item" href="#">Sakinah Rahmawati</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Dosen Pembimbing</a></li>
                    <li><a class="dropdown-item" href="#">Roni Putra</a></li>
                    <li><a class="dropdown-item" href="#">Deni Satria</a></li>
                </ul>
                <a class="btn dropdown-toggle m-2 btn-sm" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="background-color: rgb(152, 151, 151); color: white">
                    D4 Teknik Telekomunikasi
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Mahasiswa</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Baghaztra Van Rill</a></li>
                    <li><a class="dropdown-item" href="#">Ibrahim Risyad</a></li>
                    <li><a class="dropdown-item" href="#">Firman Ardiansyah</a></li>
                    <li><a class="dropdown-item" href="#">Sakinah Rahmawati</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Dosen Pembimbing</a></li>
                    <li><a class="dropdown-item" href="#">Roni Putra</a></li>
                    <li><a class="dropdown-item" href="#">Deni Satria</a></li>
                </ul>
                <a class="btn dropdown-toggle m-2 btn-sm" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="background-color: rgb(152, 151, 151); color: white">
                    D3 Bahasa Inggris
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Mahasiswa</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Baghaztra Van Rill</a></li>
                    <li><a class="dropdown-item" href="#">Ibrahim Risyad</a></li>
                    <li><a class="dropdown-item" href="#">Firman Ardiansyah</a></li>
                    <li><a class="dropdown-item" href="#">Sakinah Rahmawati</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Dosen Pembimbing</a></li>
                    <li><a class="dropdown-item" href="#">Roni Putra</a></li>
                    <li><a class="dropdown-item" href="#">Deni Satria</a></li>
                </ul>
                <a class="btn dropdown-toggle m-2 btn-sm" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="background-color: rgb(152, 151, 151); color: white">
                    D4 UPW & D3 DPW
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Mahasiswa</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Baghaztra Van Rill</a></li>
                    <li><a class="dropdown-item" href="#">Ibrahim Risyad</a></li>
                    <li><a class="dropdown-item" href="#">Firman Ardiansyah</a></li>
                    <li><a class="dropdown-item" href="#">Sakinah Rahmawati</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Dosen Pembimbing</a></li>
                    <li><a class="dropdown-item" href="#">Roni Putra</a></li>
                    <li><a class="dropdown-item" href="#">Deni Satria</a></li>
                </ul>
                <a class="btn dropdown-toggle m-2 btn-sm" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="background-color: rgb(152, 151, 151); color: white">
                    D3 Administrasi Bisnis
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Mahasiswa</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Baghaztra Van Rill</a></li>
                    <li><a class="dropdown-item" href="#">Ibrahim Risyad</a></li>
                    <li><a class="dropdown-item" href="#">Firman Ardiansyah</a></li>
                    <li><a class="dropdown-item" href="#">Sakinah Rahmawati</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="#" style="color: black">Dosen Pembimbing</a></li>
                    <li><a class="dropdown-item" href="#">Roni Putra</a></li>
                    <li><a class="dropdown-item" href="#">Deni Satria</a></li>
                </ul>
            </div>
        </div>
            {{-- <div class="col-md-12 text-center">
                <h1 class="ftco-heading-2 fs-5 fw-bold">TSA TEAM</h1>
                <div class="row">
                    <div class="col" name="trpl" id="trpl"
                        style="display: block onclick="showCard('card-trpl')">
                        <button class="small btn btn-primary btn-sm">D4 TRPL</button>
                    </div>
                    <div class="col" name="tkom" id="tkom" onclick="showCard('card-tkom')">
                        <button class="small btn btn-primary btn-sm">D3 Teknik Komputer</button>
                    </div>
                    <div class="col" name="ed" id="ed" onclick="showCard('card-ed')">
                        <button class="small btn btn-primary btn-sm">D3 Bahasa Inggris</button>
                    </div>
                    <div class="col" name="d3telkom" id="d3telkom" onclick="showCard('card-d3telkom')">
                        <button class="small btn btn-primary btn-sm">D3 Telekomunikasi</button>
                    </div>
                    <div class="col" name="upwdpw" id="upwdpw" onclick="showCard('card-upwdpw')">
                        <button class="small btn btn-primary btn-sm">D4 UPW & D3 DPW</button>
                    </div>
                    <div class="col" name="d4telkom" id="d4telkom" onclick="showCard('card-d4telkom')">
                        <button class="small btn btn-primary btn-sm">D4 Telekomunikasi</button>
                    </div>
                    <div class="col" name="d3ab" id="d3ab" onclick="showCard('card-d3ab')">
                        <button class="small btn btn-primary btn-sm">D3 Administrasi Bisnis</button>
                    </div>
                </div> --}}
            {{-- <div class="row mt-3">
                    <div class="col-lg-4 mx-auto">
                        <div id="card-trpl" class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                </div>
                                <div>
                                    <h4>Freddie J. Plourde</h4>
                                    <p class="text-muted">@Founder <span>| </span><span><a href="#"
                                                class="text-pink">websitename.com</a></span></p>
                                </div>
                                <ul class="social-links list-inline">
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Facebook"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Skype"><i
                                                class="fa fa-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="card-tkom" class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                </div>
                                <div>
                                    <h4>Jane Doe</h4>
                                    <p class="text-muted">@Developer <span>| </span><span><a href="#"
                                                class="text-pink">example.com</a></span></p>
                                </div>
                                <ul class="social-links list-inline">
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="LinkedIn"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="GitHub"><i
                                                class="fa fa-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="card-ed" class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                </div>
                                <div>
                                    <h4>John Smith</h4>
                                    <p class="text-muted">@Translator <span>| </span><span><a href="#"
                                                class="text-pink">example.com</a></span></p>
                                </div>
                                <ul class="social-links list-inline">
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Facebook"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="card-d3telkom" class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                </div>
                                <div>
                                    <h4>Linda Williams</h4>
                                    <p class="text-muted">@Engineer <span>| </span><span><a href="#"
                                                class="text-pink">example.com</a></span></p>
                                </div>
                                <ul class="social-links list-inline">
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="LinkedIn"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="GitHub"><i
                                                class="fa fa-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="card-upwdpw" class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                </div>
                                <div>
                                    <h4>Michael Johnson</h4>
                                    <p class="text-muted">@Manager <span>| </span><span><a href="#"
                                                class="text-pink">example.com</a></span></p>
                                </div>
                                <ul class="social-links list-inline">
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Facebook"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="card-d4telkom" class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                </div>
                                <div>
                                    <h4>Susan Brown</h4>
                                    <p class="text-muted">@Designer <span>| </span><span><a href="#"
                                                class="text-pink">example.com</a></span></p>
                                </div>
                                <ul class="social-links list-inline">
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="LinkedIn"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="GitHub"><i
                                                class="fa fa-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="card-d3ab" class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                </div>
                                <div>
                                    <h4>Chris Evans</h4>
                                    <p class="text-muted">@Marketer <span>| </span><span><a href="#"
                                                class="text-pink">example.com</a></span></p>
                                </div>
                                <ul class="social-links list-inline">
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Facebook"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a title data-placement="top" data-toggle="tooltip"
                                            class="tooltips" href="#" data-original-title="Twitter"><i
                                                class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
            <p>
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                <a href="https://pnp.ac.id" target="_blank">TSA-MBKM PNP</a>
            </p>
        </div>
    </div>
    </div>
</footer>
