@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <div class="image" style="background-image: url('{{ asset('front/img/bg/news.jpg') }}')">
        </div>
        <div class="info">
            <div>
                <div class="container">
                    <h1>404 страница не найдена</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <div class="container" style="text-align: center; padding-top: 50px;padding-bottom: 50px">
        <a class="btn btn-primary" style="font-size: 28px;" href="{{ route('front-index') }}">Попробуйте перейти на Главную</a>
    </div>
@endsection
