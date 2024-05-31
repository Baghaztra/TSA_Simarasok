<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('admin/post*') ? 'active' : '' }}"
                    href="{{ route('post.index') }}">
                    <span data-feather="align-left" class="align-text-bottom"></span>
                    Berita
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}"
                    href="{{ route('category.index') }}">
                    <span data-feather="info" class="align-text-bottom"></span>
                    Kategori
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}"
                    href="{{ route('user.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    User
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('admin/umkm*') ? 'active' : '' }}"
                    href="{{ route('umkm.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    UMKM
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('admin/destinasipariwisata*') ? 'active' : '' }}"
                    href="{{ route('destinasipariwisata.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Destinasi pariwisata
                </a>
            </li>
        </ul>

    </div>
</nav>
