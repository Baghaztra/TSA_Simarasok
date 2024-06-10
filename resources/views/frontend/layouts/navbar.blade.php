<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Simarasok<span>Desa Wisata Sumatera Barat</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item {{ request()->is('list-destinasi') ? 'active' : '' }}"><a href="/list-destinasi" class="nav-link">Destinasi</a></li>
                <li class="nav-item {{ request()->is('list-homestay') ? 'active' : '' }}"><a href="/list-homestay" class="nav-link">Homestay</a></li>
                <li class="nav-item"><a href="hotel.html" class="nav-link">UMKM</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Video</a></li>
                <li class="nav-item {{ request()->is('hubungi-kami') ? 'active' : ''}}"><a href="\hubungi-kami" class="nav-link">Hubungi Kami</a></li>
            </ul>
        </div>
    </div>
</nav>
