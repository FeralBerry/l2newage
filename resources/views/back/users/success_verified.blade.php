@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
        <div class="image" style="background-image: url('{{ asset('front/img/bg/forum.jpg') }}')">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Успешная проверка Email скоро будете перенаправлены в личный кабинет</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <div class="container youplay-content">
        <div class="col-md-12">
            <div class="container align-center">
                <meta http-equiv="refresh" content="5; url={{ route('home') }}" />
            </div>
        </div>
    </div>
@endsection
