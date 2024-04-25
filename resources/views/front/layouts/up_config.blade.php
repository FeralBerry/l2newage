<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@if(isset($seo))
    @foreach($seo as $item)
        @if(Route::current()->getName() == $item->route_name)
        <title>{{ $item->title ?? 'L2NewAge' }}</title>
        <meta name="description" content="{{ $item->description ?? '' }}">
        <meta name="keywords" content="{{ $item->keywords ?? '' }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @else
            <title>L2NewAge</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        @endif
    @endforeach
@endif
<link rel=canonical href="https://l2newage.ru/" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Icon -->
<link rel="icon" type="image/png" href="{{ asset('front/img/icon.png') }}">
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
<!-- FontAwesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/font-awesome.css') }}" />
<!-- Owl Carousel -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/bower_components/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
<!-- Youplay -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/youplay/css/youplay.min.css') }}" />
<!-- Custom Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/custom.css') }}" />
<!-- RTL (uncomment this to enable RTL support) -->
<!-- <link rel="stylesheet" type="text/css" href="../assets/youplay/css/youplay-rtl.css" /> -->
