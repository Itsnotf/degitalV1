<aside id="sidebar-wrapper">
    <div class="sidebar-brand mt-2 d-flex align-items-center justify-content-center">
        <a href="{{ url('/') }}">
            <p>DIGITAL</p>
            {{-- <img src="{{ asset('assets/img/icon.png') }}" width="30" height="40" alt="icon"> --}}
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>
        <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{--  aktifkan ini jika mau dropdown  --}}
        {{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                <span>Dropdown Menu</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Dropdown Item</a></li>
            </ul>
        </li> --}}

        {{-- sidebar superadmin  --}}
        {{--  @can('superadmin')
        <li class="menu-header">Administrator</li>
        @endcan  --}}

        {{-- sidebar admin  --}}
        @can('admin')
        <li class="menu-header">Administrator</li>
        <li class="{{ Route::is('user*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-users"></i>
                <span>Kelola User</span>
            </a>
        </li>
        <li class="{{ Route::is('produk*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('produk.index') }}">
                <i class="fas fa-users"></i>
                <span>Kelola Produk</span>
            </a>
        </li>
        <li class="{{ Route::is('pembayaran*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pembayaran.index') }}">
                <i class="fas fa-users"></i>
                <span>Kelola Pembayaran</span>
            </a>
        </li>
        <li class="{{ Route::is('transaksi*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('transaksi.index') }}">
                <i class="fas fa-users"></i>
                <span>Kelola Transaksi</span>
            </a>
        </li>
        @endcan

        {{-- sidebar user  --}}
        @can('user')
        <li class="menu-header">User</li>
        @endcan
    </ul>
</aside>
