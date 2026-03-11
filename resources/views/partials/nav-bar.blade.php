<nav class="flex-row p-0 navbar default-layout col-lg-12 col-12 fixed-top d-flex align-items-top">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('staradmin/images/logo.svg') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('staradmin/images/logo-mini.svg') }}" alt="logo" />
            </a>
        </div>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">
                    Hello, <span class="text-black fw-bold">{{ auth()->user()->name ?? 'Admin' }}</span>
                </h1>
                <h3 class="welcome-sub-text">Laptop Store Admin Dashboard</h3>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <form class="search-form" action="#">
                    <i class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                </form>
            </li>

            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ asset('staradmin/images/faces/face8.jpg') }}" alt="Profile image">
                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="text-center dropdown-header">
                        <img class="img-md rounded-circle" src="{{ asset('staradmin/images/faces/face8.jpg') }}" alt="Profile image">
                        <p class="mt-3 mb-1 fw-semibold">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="mb-0 fw-light text-muted">{{ auth()->user()->email ?? 'admin@gmail.com' }}</p>
                    </div>

                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Sign Out
                        </button>
                    </form>
                </div>
            </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>