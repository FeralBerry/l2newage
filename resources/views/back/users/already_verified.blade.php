@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
        <div class="image" style="background-image: url('{{ asset('front/img/bg/forum.jpg') }}')">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Ваш аккаунт уже прошел проверку ранее</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <div class="container youplay-content">
        <div class="col-md-12">
            <div class="container align-center">
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
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Забыл пароль?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
