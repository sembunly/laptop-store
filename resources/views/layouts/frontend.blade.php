<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','My Shop')</title>

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- Bootstrap Icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  {{-- Modern UI CSS --}}
  <style>
    :root{
      --bg-1: #f8fafc;
      --bg-2: #eef2ff;
      --bg-3: #ecfeff;
      --card-bg: rgba(255,255,255,.78);
      --text-main: #0f172a;
      --text-soft: #64748b;
      --border-soft: rgba(255,255,255,.35);
      --primary: #4f46e5;
      --primary-2: #7c3aed;
      --dark: #111827;
      --success: #10b981;
      --radius-xl: 24px;
      --radius-lg: 18px;
      --radius-md: 14px;
      --shadow-soft: 0 10px 30px rgba(15, 23, 42, 0.08);
      --shadow-hover: 0 18px 50px rgba(15, 23, 42, 0.14);
    }

    *{
      box-sizing: border-box;
    }

    body{
      margin: 0;
      color: var(--text-main);
      font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      background:
        radial-gradient(circle at top left, rgba(124,58,237,.12), transparent 28%),
        radial-gradient(circle at top right, rgba(59,130,246,.12), transparent 30%),
        radial-gradient(circle at bottom left, rgba(16,185,129,.10), transparent 25%),
        linear-gradient(135deg, var(--bg-1), var(--bg-2) 45%, var(--bg-3));
      background-attachment: fixed;
      min-height: 100vh;
    }

    a{
      text-decoration: none;
    }

    .page-wrap{
      min-height: 70vh;
    }

    .soft-card{
      border: 1px solid rgba(255,255,255,.45);
      border-radius: var(--radius-xl);
      background: var(--card-bg);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      box-shadow: var(--shadow-soft);
      overflow: hidden;
      transition: all .28s ease;
    }

    .soft-card:hover{
      transform: translateY(-6px);
      box-shadow: var(--shadow-hover);
    }

    .thumb{
      width: 100%;
      height: 220px;
      object-fit: cover;
      background: #f1f5f9;
    }

    .noimg{
      height: 220px;
      display: flex;
      align-items: center;
      justify-content: center;
      background:
        linear-gradient(135deg, rgba(79,70,229,.08), rgba(6,182,212,.10));
      color: #475569;
      font-weight: 700;
      font-size: 1rem;
    }

    .pill{
      border-radius: 999px !important;
    }

    .line-clamp-2{
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .nav-glass{
      position: sticky;
      top: 0;
      z-index: 1030;
      background: rgba(255,255,255,.72);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid rgba(148,163,184,.15);
      box-shadow: 0 6px 24px rgba(15,23,42,.05);
    }

    .navbar-brand{
      font-size: 1.3rem;
      letter-spacing: .3px;
      color: var(--dark) !important;
    }

    .navbar .nav-link{
      color: #334155 !important;
      font-weight: 500;
      transition: .2s ease;
    }

    .navbar .nav-link:hover{
      color: var(--primary) !important;
    }

    .search-wrap .input-group{
      background: rgba(255,255,255,.9);
      border-radius: 999px;
      box-shadow: 0 8px 24px rgba(15,23,42,.07);
      overflow: hidden;
      border: 1px solid rgba(226,232,240,.85);
    }

    .search-wrap .input-group-text,
    .search-wrap .form-control{
      border: 0;
      background: transparent;
    }

    .search-wrap .form-control{
      box-shadow: none !important;
      padding-left: .2rem;
    }

    .search-wrap .form-control:focus{
      box-shadow: none !important;
    }

    .btn{
      border-radius: 14px;
      font-weight: 600;
      transition: all .25s ease;
    }

    .btn-dark{
      background: linear-gradient(135deg, var(--primary), var(--primary-2));
      border: 0;
      box-shadow: 0 10px 24px rgba(79,70,229,.22);
    }

    .btn-dark:hover{
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(79,70,229,.28);
    }

    .btn-outline-dark{
      border: 1px solid rgba(15,23,42,.14);
      color: var(--dark);
      background: rgba(255,255,255,.75);
    }

    .btn-outline-dark:hover{
      background: var(--dark);
      color: #fff;
      border-color: var(--dark);
    }

    .hero{
      position: relative;
      overflow: hidden;
      border-radius: 30px;
      padding: 2rem;
      background:
        radial-gradient(circle at 15% 20%, rgba(99,102,241,.18), transparent 28%),
        radial-gradient(circle at 85% 10%, rgba(6,182,212,.16), transparent 28%),
        radial-gradient(circle at 80% 80%, rgba(16,185,129,.12), transparent 24%),
        rgba(255,255,255,.72);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      border: 1px solid rgba(255,255,255,.45);
      box-shadow: 0 18px 45px rgba(15,23,42,.08);
    }

    .hero::before{
      content: "";
      position: absolute;
      width: 240px;
      height: 240px;
      border-radius: 50%;
      background: rgba(255,255,255,.20);
      top: -70px;
      right: -70px;
      filter: blur(8px);
    }

    .hero h1{
      font-size: clamp(1.8rem, 3vw, 2.8rem);
      font-weight: 800;
      color: #0f172a;
    }

    .hero p{
      color: var(--text-soft);
      font-size: 1rem;
    }

    .breadcrumb{
      background: rgba(255,255,255,.65);
      padding: .9rem 1.2rem;
      border-radius: 16px;
      box-shadow: var(--shadow-soft);
      border: 1px solid rgba(255,255,255,.45);
    }

    .breadcrumb-item a{
      color: #475569;
    }

    .breadcrumb-item.active{
      color: var(--primary);
      font-weight: 600;
    }

    .alert{
      border: 0;
      box-shadow: var(--shadow-soft);
      border-radius: 18px;
    }

    .dropdown-menu{
      border: 0;
      border-radius: 18px;
      box-shadow: 0 20px 40px rgba(15,23,42,.12);
      padding: .6rem;
    }

    .dropdown-item{
      border-radius: 10px;
      padding: .65rem .85rem;
    }

    .dropdown-item:hover{
      background: #f1f5f9;
    }

    .footer{
      margin-top: 4rem;
      background:
        linear-gradient(135deg, #0f172a, #111827, #1e293b);
      color: #cbd5e1;
      border-top-left-radius: 30px;
      border-top-right-radius: 30px;
      overflow: hidden;
    }

    .footer a{
      color: #cbd5e1;
      transition: .2s ease;
    }

    .footer a:hover{
      color: #ffffff;
      padding-left: 2px;
    }

    .pagination{
      gap: 4px;
    }

    .pagination .page-link{
      border: 0;
      border-radius: 12px !important;
      padding: .6rem .95rem;
      color: var(--dark);
      background: rgba(255,255,255,.82);
      box-shadow: 0 8px 20px rgba(15,23,42,.06);
    }

    .pagination .page-item.active .page-link{
      background: linear-gradient(135deg, var(--primary), var(--primary-2));
      color: #fff;
    }

    .toast{
      border-radius: 16px;
      box-shadow: 0 18px 40px rgba(15,23,42,.18);
    }

    @media (max-width: 991px){
      .search-wrap{
        margin: 1rem 0;
      }
    }

    @media (max-width: 767px){
      .hero{
        padding: 1.4rem;
        border-radius: 22px;
      }

      .thumb,
      .noimg{
        height: 190px;
      }
    }
  </style>

  @stack('styles')
</head>

<body>
  {{-- NAVBAR --}}
  <nav class="navbar navbar-expand-lg nav-glass">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ url('/') }}">
        <i class="bi bi-laptop"></i>   GenZ Electronics
      </a>

      <button class="border-0 shadow-none navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="topNav">
        <ul class="mb-2 navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
              <i class="bi bi-grid me-1"></i> Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-stars me-1"></i> About
            </a>
          </li>
        </ul>

        {{-- Search --}}
        <form class="d-flex me-lg-3 search-wrap" role="search" action="#" method="GET">
          <div class="input-group">
            <span class="px-3 input-group-text">
              <i class="bi bi-search"></i>
            </span>
            <input
              class="form-control"
              type="search"
              placeholder="Search products..."
              name="search"
            >
          </div>
        </form>

        {{-- Right actions --}}
        <div class="gap-2 d-flex align-items-center">
          <a href="{{ route('cart.index') }}" class="px-3 btn btn-dark pill">
            <i class="bi bi-cart3 me-1"></i> Cart
          </a>

          @auth
            <div class="dropdown">
              <button class="btn btn-outline-dark pill dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1"></i> {{ auth()->user()->name }}
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="{{ url('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button class="dropdown-item">
                      <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            <a href="{{ url('login') }}" class="btn btn-outline-dark pill">
              <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  {{-- HEADER / HERO --}}
  <header class="container mt-4">
    <div class="hero">
      <div class="row align-items-center g-3">
        <div class="col-md-7">
          <h1 class="mb-2">@yield('hero_title','Modern Shop UI')</h1>
          <p class="mb-0">@yield('hero_subtitle','Clean • Modern • Responsive eCommerce design')</p>
        </div>
        <div class="col-md-5 text-md-end">
          @yield('hero_action')
        </div>
      </div>
    </div>
  </header>

  {{-- BREADCRUMB --}}
  <section class="container mt-3">
    @yield('breadcrumb')
  </section>

  {{-- CONTENT --}}
  <main class="container mt-3 page-wrap">
    @if(session('success'))
      <div class="alert alert-success rounded-4">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
      </div>
    @endif

    @yield('content')
  </main>

  {{-- FOOTER --}}
  <footer class="footer">
    <div class="container py-5">
      <div class="row g-4">
        <div class="col-md-5">
          <div class="mb-2 fw-bold fs-4">
            <i class="bi bi-bag-heart-fill me-1"></i> My Shop
          </div>
          <div class="small text-light-emphasis">
            Modern e-commerce website with stylish UI and responsive layout.
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="mb-2 fw-semibold">Quick links</div>
          <div class="gap-2 d-grid small">
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="#">New Arrival</a>
            <a href="#">Contact</a>
          </div>
        </div>

        <div class="col-6 col-md-4">
          <div class="mb-2 fw-semibold">Contact</div>
          <div class="small">
            <div class="mb-1"><i class="bi bi-geo-alt me-1"></i> Phnom Penh</div>
            <div class="mb-1"><i class="bi bi-telephone me-1"></i> +855 10 800 921</div>
            <div><i class="bi bi-envelope me-1"></i> sembunly2005@gmail.com</div>
          </div>
        </div>
      </div>

      <hr class="my-4 opacity-25 border-light">

      <div class="flex-wrap gap-2 d-flex justify-content-between small">
        <span>© {{ date('Y') }} My Shop</span>
        <span>SEM BUNLY</span>
      </div>
    </div>
  </footer>

  {{-- TOAST --}}
  <div class="bottom-0 p-3 toast-container position-fixed end-0">
    <div id="cartToast" class="border-0 toast align-items-center text-bg-dark" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          Added to cart!
        </div>
        <button type="button" class="m-auto btn-close btn-close-white me-2" data-bs-dismiss="toast"></button>
      </div>
    </div>
  </div>

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Toast helper --}}
  <script>
    function showCartToast(message = "Added to cart!") {
      const el = document.getElementById('cartToast');
      el.querySelector('.toast-body').innerText = message;
      const toast = new bootstrap.Toast(el, { delay: 1800 });
      toast.show();
    }

    @if(session('cart_toast'))
      document.addEventListener('DOMContentLoaded', () => {
        showCartToast(@json(session('cart_toast')));
      });
    @endif
  </script>

  @stack('scripts')
</body>
</html>