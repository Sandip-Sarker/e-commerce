<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Noa -Laravel Bootstrap 5 Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
          content="laravel admin template, bootstrap admin template, admin dashboard template, admin dashboard, admin template, admin, bootstrap 5, laravel admin, laravel admin dashboard template, laravel ui template, laravel admin panel, admin panel, laravel admin dashboard, laravel template, admin ui dashboard">

    <!-- TITLE -->
    <title> Admin Login | Page</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}assets/images/brand/favicon.ico"/>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('')}}assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- STYLE CSS -->
    <link href="{{asset('')}}assets/css/style.css" rel="stylesheet"/>
    <link href="{{asset('')}}assets/css/skin-modes.css" rel="stylesheet"/>


    <!--- FONT-ICONS CSS -->
    <link href="{{asset('')}}assets/plugins/icons/icons.css" rel="stylesheet"/>

    <!-- INTERNAL Switcher css -->
    <link href="{{asset('')}}assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{asset('')}}assets/switcher/demo.css" rel="stylesheet">

</head>


<body class="ltr login-img">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{asset('')}}assets/images/loader.svg" class="loader-img" alt="Loader">
</div>


<!-- PAGE -->
<div class="page">
    <div>
        <!-- CONTAINER OPEN -->
        <div class="col col-login mx-auto text-center">
            <a href="index.html" class="text-center">
                <img src="{{asset('')}}assets/images/brand/logo.png" class="header-brand-img" alt="">
            </a>
        </div>
        <div class="container-login100">
            <div class="wrap-login100 p-0">
                <div class="card-body">
                    <form action="{{route('login')}}" method="POST" class="login100-form validate-form">
                        @csrf <span class="login100-form-title">
										Login
									</span>
                        <div class="wrap-input100 validate-input"
                             data-bs-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-bs-validate="Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
                        </div>
                        <div class="text-end pt-1">
                            <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot
                                    Password?</a></p>
                        </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn btn-primary">
                                Login
                            </button>
                        </div>
                        <div class="text-center pt-3">
                            <p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ms-1">Create
                                    an Account</a></p>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center my-3">
                        <a href="javascript:void(0)" class="social-login  text-center me-4">
                            <i class="fa fa-google"></i>
                        </a>
                        <a href="javascript:void(0)" class="social-login  text-center me-4">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="javascript:void(0)" class="social-login  text-center">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
<!-- End PAGE -->


<!-- JQUERY JS -->
<script src="{{asset('')}}assets/plugins/jquery/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('')}}assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('')}}assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('')}}assets/plugins/p-scroll/perfect-scrollbar.js"></script>

<!-- STICKY JS -->
<script src="{{asset('')}}assets/js/sticky.js"></script>


<!-- COLOR THEME JS -->
<script src="{{asset('')}}assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('')}}assets/js/custom.js"></script>

<!-- SWITCHER JS -->
<script src="{{asset('')}}assets/switcher/js/switcher.js"></script>

</body>


<!-- Mirrored from laravel8.spruko.com/noa/login by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 May 2023 13:11:49 GMT -->
</html>


{{--<x-guest-layout>--}}
{{--    <x-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-validation-errors class="mb-4" />--}}

{{--        @session('status')--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ $value }}--}}
{{--            </div>--}}
{{--        @endsession--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <x-checkbox id="remember_me" name="remember" />--}}
{{--                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ms-4">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-authentication-card>--}}
{{--</x-guest-layout>--}}

