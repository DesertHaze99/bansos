<!DOCTYPE html>
<html lang="en">
<head>
	<title>Selamat datang di Inofa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/loginRegister/css/main.css') }}">
<!--===============================================================================================-->

    <link href="{{ asset('template/limitless/Template/layout_3/LTR/default/full/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/limitless/Template/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Scripts -->
    <script src="{{ asset('template/limitless/Template/layout_1/LTR/default/full/assets/js/app.js') }}" defer></script>
    <link rel="icon" href="{!! asset('template/limitless/Template/global_assets/images/logo_icon_dark.png') !!}"/>

</head>
<body style="background-color: #4973e3;">
	
    <div class="limiter" style="background-color: white">
		<div style="margin-top: -8vh" class="container-login100">
			<div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h5 class="text-center mb-0 font-weight-bold" >
                        Registrasi Admin
                    </h5>
					<p class="text-center text-muted py-3">
						Mendaftar kontrol panel admin
                    </p>
                    <br>

                    <div class="d-flex align-items-center justify-content-center ">
                        <i class="icon-user-check mr-3" style="color: grey"></i> 
                        <div class="wrap-input100 validate-input" data-validate = "Nama Depan yang valid terdiri dari satu kata maksimal 100 huruf">
                            <input id="first_name" class="input100 form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" autocomplete="first_name"  type="text" name="first_name">
                            <span class="focus-input100"></span>
                            <span id="namaDepanPlaceholder" class="label-input100 "> Nama Depan</span>

                            @error('first_name')
                                <span style="font-size: 1.3vh" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="separator d-flex align-items-center justify-content-center " style="height: 2vh">
                    </div>

                    <div class="d-flex align-items-center justify-content-center ">
                        <i class="icon-user-check mr-3" style="color: grey"></i> 
                        <div class="wrap-input100 validate-input" data-validate = "Nama Belakang yang valid terdiri dari satu kata maksimal 100 huruf">
                            <input id="last_name" class="input100 form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" autocomplete="last_name" type="text" name="last_name">
                            <span class="focus-input100"></span>
                            <span id="namaBelakangPlaceholder" class="label-input100 "> Nama Belakang</span>

                            @error('last_name')
                                <span style="font-size: 1.3vh" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="separator d-flex align-items-center justify-content-center " style="height: 2vh">
                    </div>

                    <div class="d-flex align-items-center justify-content-center ">
                        <i class="icon-envelop5 mr-3" style="color: grey"></i> 
                        <div class="wrap-input100 validate-input" data-validate = "Email yang valid berupa : emailvalid@inova.com">
                            <input id="email" class="input100 form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" type="email" name="email">
                            <span class="focus-input100"></span>
                            <span id="emailPlaceholder" class="label-input100 "> Email</span>

                            @error('email')
                                <span style="font-size: 1.3vh" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="separator d-flex align-items-center justify-content-center " style="height: 2vh">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <i class="icon-lock2 mr-3" style="color: grey"></i> 
                        <div class="wrap-input100 validate-input" data-validate="Masukkan password!">
                            <input id="password" class="input100 form-control @error('password') is-invalid @enderror" autocomplete="new-password" type="password" name="password">
                            <span class="focus-input100"></span>
                            <span id="passwordPlaceholder" class="label-input100">Password</span>

                            @error('password')
                                <span style="font-size: 1.3vh" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="separator d-flex align-items-center justify-content-center " style="height: 2vh">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <i class="icon-lock2 mr-3" style="color: grey"></i> 
                        <div class="wrap-input100 validate-input" data-validate="Masukkan password!">
                            <input id="password-confirm" class="input100" autocomplete="new-password" type="password" name="password_confirmation">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Konfirmasi Password</span>

                            @error('password')
                                <span style="font-size: 1.3vh" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="separator d-flex align-items-center justify-content-center " style="height: 2vh">
                    </div>

                    <br>
					<div class="d-flex align-items-center justify-content-center">
                        <p class="text-center margin">sudah punya akun? <a href="{{URL::to('/login')}}" class="d-inline-block text-warning">login di sini</a></p>
					</div>
			
                    <br>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="container-login100-form-btn">
                            <button style="font-size: 1.3vh" type="submit" class="login100-form-btn" style="min-width: 80px">
                                {{ __('Register') }}
                            </button>
					    </div>
                    </div>
					
				</form>

                <div class="login100-more" style="background-color:#2868e3;padding-top:13%">
                    <center>
                        <img src="{{ asset('loginRegister/images/register.png') }}" width="600"  alt="">
                        <div class="text-white" style=" max-width:30vw" >
                            <h5 class="text-center mb-0 font-weight-semibold py-2" >Berbagi. Teman Seide</h5>
                            <small class="text-center mb-0">“Agar otak mudah menjala ide, maka perlu membiasakan untuk berpikir, merenung serta membaca situasi dari fenomena apapun”
                                ―<b> Dian Nafi, socioteenpreneur</b>
                            </small>
                        </div>
                    </center>
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="{{ asset('template/loginRegister/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/loginRegister/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/loginRegister/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('template/loginRegister/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/loginRegister/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/loginRegister/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('template/loginRegister/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/loginRegister/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('template/loginRegister/js/main.js') }}"></script>
    
    <script>
        var firstName = document.getElementById('first_name');
        var lastName = document.getElementById('last_name');
        var email = document.getElementById('email');
        var password = document.getElementById('password');

        setInterval(() => {
            if(firstName.value){
                $("#namaDepanPlaceholder").hide();
                $(".separator").show();
            } else {
                $("#namaDepanPlaceholder").show();
            }

            if(lastName.value){
                $("#namaBelakangPlaceholder").hide();
                $(".separator").show();
            } else {
                $("#namaBelakangPlaceholder").show();
            }

            if(email.value){
                $("#emailPlaceholder").hide();
                $(".separator").show();
            } else {
                $("#emailPlaceholder").show();
            }

            if(password.value){
                $("#passwordPlacehodler").hide();
                $(".separator").show();
            } else {
                $("#passwordPlacehodler").show();
            }
        },200)

        

    </script>

</body>
</html>