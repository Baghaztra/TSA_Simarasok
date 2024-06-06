<nav class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 200px; height: 100%; overflow-y: auto; position: fixed">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-6">Admin Simarasok</span> <!-- Mengubah font-size menjadi 12px -->
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/destinasipariwisata*') ? 'active' : '' }}"
          href="{{ route('destinasipariwisata.index') }}">
          <span data-feather="users" class="align-text-bottom"></span>
          Destinasi pariwisata
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/homestay*') ? 'active' : '' }}"
          href="{{ route('homestay.index') }}">
          <span data-feather="users" class="align-text-bottom"></span>
          Homestay
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}"
            href="{{ route('category.index') }}">
            <span data-feather="info" class="align-text-bottom"></span>
            Kategori
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}"
            href="{{ route('user.index') }}">
            <span data-feather="users" class="align-text-bottom"></span>
            User
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/umkm*') ? 'active' : '' }}"
            href="{{ route('umkm.index') }}">
            <span data-feather="users" class="align-text-bottom"></span>
            UMKM
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="/sign-out">Sign out</a></li>
      </ul>
    </div>
</nav>
