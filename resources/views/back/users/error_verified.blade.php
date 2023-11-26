@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
        <div class="image" style="background-image: url('{{ asset('front/img/bg/forum.jpg') }}')">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Ошибка проверки кода доступа</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <div class="container youplay-content">
        <div class="col-md-12">
            <div class="container align-center">
                <div class="youplay-form">
                    <h1>Регистрация</h1>
                    <div class="btn-group social-list dib">
                        <a class="btn btn-default" href="#!" onclick="alert('Авторизация этим методом пока не доступна!')" title="Логин через VK"><i class="fa fa-vk"></i></a>
                        <a class="btn btn-default" href="#!" onclick="alert('Авторизация этим методом пока не доступна!')" title="Логин через Google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="youplay-input">
                            <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="youplay-input">
                            <input id="email" type="email" placeholder="E-mail" class="input-en form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="youplay-input">
                            <input id="password" placeholder="Пароль" pattern="[^А-Яа-яЁё\s]+$" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <a href="#" id="password_control" class="password-control" onclick="return show_hide_password(this);"><i class="fa fa-eye-slash"></i></a>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="youplay-input">
                            <input id="password-confirm" placeholder="Подтверждение пароля" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <a href="#" id="password_confirm_control" class="password-control" onclick="return show_hide_password_confirm(this);"><i class="fa fa-eye-slash"></i></a>
                        </div>
                        <div class="row mb-0">
                            <button type="submit" class="btn btn-link">
                                {{ __('Зарегистрироваться') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
