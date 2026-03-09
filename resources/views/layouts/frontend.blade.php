<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','My Shop')</title>

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- Modern UI CSS --}}
  <style>
    :root{
      --soft-shadow: 0 10px 30px rgba(0,0,0,.08);
      --soft-shadow-hover: 0 14px 45px rgba(0,0,0,.14);
      --radius: 18px;
    }
    body{ background:#f6f7fb; }
    .page-wrap{ min-height: 70vh; }
    .soft-card{
      border:0; border-radius:var(--radius);
      box-shadow:var(--soft-shadow);
      overflow:hidden; transition:.25s ease; background:#fff;
    }
    .soft-card:hover{ transform: translateY(-4px); box-shadow:var(--soft-shadow-hover); }
    .thumb{ height:170px; width:100%; object-fit:cover; }
    .noimg{
      height:170px; display:flex; align-items:center; justify-content:center;
      background: linear-gradient(135deg,#f2f4f7,#eef2ff);
      color:#6b7280; font-weight:700;
    }
    .pill{ border-radius:999px !important; }
    .line-clamp-2{
      display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;
    }
    .hero{
      background: radial-gradient(1000px circle at 10% 10%, #e9efff 0, transparent 55%),
                  radial-gradient(900px circle at 90% 0%, #fff2e6 0, transparent 55%),
                  #ffffff;
      border-radius: 22px;
      box-shadow: var(--soft-shadow);
    }
    .nav-glass{
      backdrop-filter: blur(8px);
      background: rgba(255,255,255,.75);
      border-bottom: 1px solid rgba(17,24,39,.06);
    }
    .footer{
      background:#0b1220; color:#cbd5e1;
    }
    .footer a{ color:#cbd5e1; text-decoration:none; }
    .footer a:hover{ color:#fff; }

    /* pagination */
    .pagination .page-link{
      border:0; box-shadow: 0 6px 18px rgba(0,0,0,.06);
      margin:0 4px; border-radius: 12px; padding: .5rem .85rem;
    }
    .pagination .active .page-link{
      background:#111827; color:#fff;
    }
  </style>

  @stack('styles')
</head>

<body>
  {{-- NAVBAR --}}
  <nav class="navbar navbar-expand-lg nav-glass sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ url('/') }}">
        <i class="bi bi-bag-heart me-1"></i> My Shop
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="topNav">
        <ul class="mb-2 navbar-nav me-auto mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="#">New Arrival</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        </ul>

        {{-- Search (UI only / you can wire later) --}}
        <form class="d-flex me-lg-3" role="search" action="#" method="GET">
          <div class="input-group">
            <span class="bg-white border-0 input-group-text" style="box-shadow:0 10px 30px rgba(0,0,0,.06);border-radius:14px 0 0 14px;">
              <i class="bi bi-search"></i>
            </span>
            <input class="border-0 form-control" type="search" placeholder="Search..."
              style="box-shadow:0 10px 30px rgba(0,0,0,.06);border-radius:0 14px 14px 0;">
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
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="{{ url('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button class="dropdown-item">Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            <a href="{{ url('login') }}" class="btn btn-outline-dark pill">Login</a>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  {{-- HEADER / HERO --}}
  <header class="container mt-4">
    <div class="p-4 p-md-5 hero">
      <div class="row align-items-center g-3">
        <div class="col-md-7">
          <h1 class="mb-2 fw-bold">@yield('hero_title','Modern Shop UI')</h1>
          <p class="mb-0 text-muted">@yield('hero_subtitle','Clean • Fast • Responsive')</p>
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
    {{-- Flash message for toast fallback (optional) --}}
    @if(session('success'))
      <div class="border-0 alert alert-success rounded-4" style="box-shadow:var(--soft-shadow);">
        {{ session('success') }}
      </div>
    @endif

    @yield('content')
  </main>

  {{-- FOOTER --}}
  <footer class="mt-5 footer">
    <div class="container py-5">
      <div class="row g-4">
        <div class="col-md-5">
          <div class="mb-2 fw-bold fs-5"><i class="bi bi-bag-heart me-1"></i> My Shop</div>
          <div class="small">e-commerce</div>
        </div>

        <div class="col-6 col-md-3">
          <div class="mb-2 fw-semibold">Quick links</div>
          <div class="gap-1 d-grid small">
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="#">New Arrival</a>
            <a href="#">Contact</a>
          </div>
        </div>

        <div class="col-6 col-md-4">
          <div class="mb-2 fw-semibold">Contact</div>
          <div class="small">
            <div><i class="bi bi-geo-alt me-1"></i> Phnom Penh</div>
            <div><i class="bi bi-telephone me-1"></i> +855 10 800 921</div>
            <div><i class="bi bi-envelope me-1"></i> sembunly2005@gmail.com</div>
          </div>
        </div>
      </div>

      <hr class="my-4 opacity-25 border-light">
      <div class="d-flex justify-content-between small">
        <span>© {{ date('Y') }} My Shop</span>
        <span>SEM BUNLY</span>
      </div>
    </div>
  </footer>

  {{-- TOAST (Add to cart popup) --}}
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
    function showCartToast(message = " Added to cart!") {
      const el = document.getElementById('cartToast');
      el.querySelector('.toast-body').innerText = message;
      const toast = new bootstrap.Toast(el, { delay: 1800 });
      toast.show();
    }

    // If backend sets session('cart_toast'), show automatically
    @if(session('cart_toast'))
      document.addEventListener('DOMContentLoaded', () => {
        showCartToast(@json(session('cart_toast')));
      });
    @endif
  </script>

  @stack('scripts')
</body>
</html>