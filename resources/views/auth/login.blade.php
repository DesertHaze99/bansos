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
		<div class="container-login100">
			<div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="text-center mb-0 font-weight-bold" >
                        Selamat Datang
                    </h5>
					<p class="text-center text-muted py-3">
						Masuk kontrol panel admin
                    </p>
                    <br>


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

                    <div id="separator" class="d-flex align-items-center justify-content-center " style="height: 3vh">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <i class="icon-lock2 mr-3" style="color: grey"></i> 
                        <div class="wrap-input100 validate-input" data-validate="Masukkan password!">
                            <input id="password" class="input100 form-control @error('password') is-invalid @enderror" autocomplete="current-password" type="password" name="password">
                            <span class="focus-input100"></span>
                            <span id="passwodPlaceholder" class="label-input100">Password</span>

                            @error('password')
                                <span style="font-size: 1.3vh" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>
					<div class="d-flex align-items-center justify-content-center">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="ckb1">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
					</div>
			
                    <br>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="container-login100-form-btn">
                            <button id="submit" type="submit" class="login100-form-btn" style="min-width: 60px">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div><br>
                    {{-- <p class="text-center margin">atau register <a href="{{URL::to('/register')}}" class="d-inline-block text-warning">di sini</a></p> --}}
					
				</form>

                <div class="login100-more" style="background-color:#2868e3;padding-top:13%">
                    <center>
                        <img src="{{ asset('loginRegister/images/login.png') }}" width="500" style="margin-top: -12vh"  alt="">
                        <div class="text-white" style="margin-top: -9vh; max-width:30vw" >
                            <h5 class="text-center mb-0 font-weight-semibold py-2" >Kolaborasi. Teman Seide</h5>
                            <small class="text-center mb-0">“Ada dua jenis kekuatan besar yang bisa mengguncangkan dunia: gempa dahsyat dan ide-ide besar.”
                                ―<b> Mehmet Murat ildan</b>
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
        var email = document.getElementById('email');
        var password = document.getElementById('password');

        setInterval(() => {
            if(email.value){
                $("#emailPlaceholder").hide();
                $("#separator").show();
            } else {
                $("#emailPlaceholder").show();
            }

            if(password.value){
                $("#passwodPlaceholder").hide();
            }

            $(':input[type="submit"]').prop('dissabled', true);
            $('input[type="password"]').keyup(function(){
                if($(this).val() != ''){
                    $(':input[type="submit"]').prop('dissabled', false);
                }
            }); 
        },200);

        

    </script>

</body>
</html>