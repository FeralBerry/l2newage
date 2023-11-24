<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @include("front.layouts.up_config")
</head>
<body>
<!-- Preloader -->
<div class="page-preloader preloader-wrapp">
    <img src="assets/images/logo.png" alt="">
    <div class="preloader"></div>
</div>
<!-- /Preloader -->
@include("front.layouts.header")
<!-- Main Content -->
<section class="content-wrap full youplay-login">
    <!-- Banner -->
    <div class="youplay-banner banner-top">
        <div class="image" style="background-image: url('{{ asset('front/img/bg/login.jpg') }}')"></div>

        <div class="info">
            <div>
                <div class="container align-center">
                    <div class="youplay-form">
                        <h1>Вход</h1>
                        <div class="btn-group social-list dib">
                            <a class="btn btn-default" href="#!" onclick="alert('Авторизация этим методом пока не доступна!')" title="Логин через VK"><i class="fa fa-vk"></i></a>
                            <a class="btn btn-default" href="#!" onclick="alert('Авторизация этим методом пока не доступна!')" title="Логин через Google"><i class="fa fa-google-plus"></i></a>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="youplay-input">
                                <input id="email" placeholder="E-mail" type="email" class="input-en @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="youplay-input">
                                <input id="password" placeholder="Пароль" type="password" class="input-en @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить') }}
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default db">Вход</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" style="margin-top: 20px" href="{{ route('password.request') }}">
                                    {{ __('Забыл пароль?') }}
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Main Content -->
<!-- Search Block -->
<div class="search-block">
    <a href="#!" class="search-toggle glyphicon glyphicon-remove"></a>
    <form action="http://html.nkdev.info/youplay/dark/search.html">
        <div class="youplay-input">
            <input type="text" name="search" placeholder="Search...">
        </div>
    </form>
</div>
<!-- /Search Block -->
@include("front.layouts.down_config")
</body>


<!-- Mirrored from html.nkdev.info/youplay/dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 May 2016 12:41:01 GMT -->
</html>
