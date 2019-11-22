{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/Template/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('limitless/Template/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('limitless/Template/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('limitless/Template/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script src="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/js/app.js') }}"></script>
    <script src="{{ asset('limitless/Template/global_assets/js/demo_pages/login.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>
    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form" method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Your credentials</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"placeholder="Username" required autocomplete="email" autofocus>
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"required autocomplete="current-password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-input-styled" id="remember" {{ old('remember') ? 'checked' : ''}} checked data-fouc>
                                        Remember
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                            </div>

                            <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                        </div>
                    </div>
                </form>
                <!-- /login form -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>
</html>
 --}}

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&family=Montserrat:400,900&display=swap" rel="stylesheet">
</head>

<body>
<div class="login-page">
<div class="row" style="margin:0px;padding:0px;height:100vh">
    <div class="col-xs-0 col-sm-0 col-md-6 login-bg-kiri">
        <div class="title-apotech title-big">Apotech.id</div>
        <div class="login-content-kiri row">
            <div><img src="{{ asset('images/Asset1.jpeg') }}" alt=""></div>
        </div>
        <div class="copyright-apotech title-copyright">copyright &copy; 2018 - 2019 Apotech.id </div>
    </div>
    <div class="col-md-6 login-bg-kanan">
        <div class="login-content-kanan">
            <div class="kanan-content">
                <div class="display-in-small title-for-small title-apotech title-small" style="text-align:center">Apotech.id</div>
                <div class="display-in-small " style="text-align:center"><img src="{{ asset('images/Asset1.png') }}" alt="" width="200"></div>
                <!-- Login form -->
                <form class="login-form" method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-0 login-form-apotech">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5 class="mb-0">L O G I N</h5>
                                <br>
                                <!-- <span class="d-block text-muted">Your credentials</span> -->
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"placeholder="Username" required autocomplete="email" autofocus>
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"required autocomplete="current-password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-input-styled" id="remember" {{ old('remember') ? 'checked' : ''}} checked data-fouc>
                                        Remember
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                            </div>

                            <!-- <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> -->
                        </div>
                    </div>
                </form>
                <!-- /login form -->
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
