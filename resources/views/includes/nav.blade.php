<nav class="navbar py-2 navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!"><b>Colaqo Grafika</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item {{ Request::is('home*') ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('shop*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                </li>
            </ul>
            @if (auth()->check())
                <li class="nav-item dropdown btn btn-outline-dark">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="navbarDropdown"
                        class=" nav-link dropdown-toggle"><i class="bi bi-person-fill"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profileUser') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('transaksiUser') }}">Riwayat Transaksi</a></li>
                        @can('admin')
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endcan
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item has-icon text-danger btn-logout">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-dark">
                    Login
                </a>
            @endif
        </div>
    </div>
</nav>
