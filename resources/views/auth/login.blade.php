<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('staradmin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('staradmin/images/favicon.png') }}" />
  </head>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                
                <div class="brand-logo text-center">
                  <img src="../../assets/images/logo.svg" alt="logo">
                </div>

                <h4>Hello! let's get started</h4>
                <h6 class="fw-light mb-4">Sign in to continue.</h6>

                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif

                <form class="pt-3" method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="form-group">
                    <input 
                      type="email" 
                      class="form-control form-control-lg @error('email') is-invalid @enderror" 
                      id="email" 
                      name="email"
                      value="{{ old('email') }}"
                      placeholder="Email"
                      required 
                      autofocus
                    >
                    @error('email')
                      <div class="invalid-feedback d-block">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <input 
                      type="password" 
                      class="form-control form-control-lg @error('password') is-invalid @enderror" 
                      id="password" 
                      name="password"
                      placeholder="Password"
                      required
                    >
                    @error('password')
                      <div class="invalid-feedback d-block">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input 
                          type="checkbox" 
                          class="form-check-input" 
                          name="remember"
                        >
                        Keep me signed in
                      </label>
                    </div>

                    @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}" class="auth-link text-black">
                        Forgot password?
                      </a>
                    @endif
                  </div>

                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">
                      SIGN IN
                    </button>
                  </div>

                  @if (Route::has('register'))
                    <div class="text-center mt-4 fw-light">
                      Don't have an account?
                      <a href="{{ route('register') }}" class="text-primary">Create</a>
                    </div>
                  @endif
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('staradmin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('staradmin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('staradmin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('staradmin/js/template.js') }}"></script>
    <script src="{{ asset('staradmin/js/settings.js') }}"></script>
    <script src="{{ asset('staradmin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('staradmin/js/todolist.js') }}"></script>
  </body>
</html>