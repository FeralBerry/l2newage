<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@if(isset($seo))
    @foreach($seo as $item)
        @if(Route::current()->getName() == $item->route_name)
        <title>{{ $item->title ?? 'L2NewAge' }}</title>
        <meta name="description" content="{{ $item->description ?? '' }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @else
            <title>L2NewAge</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        @endif
    @endforeach
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Icon -->
<link rel="icon" type="image/png" href="{{ asset('front/img/icon.png') }}">
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>


<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('front/vendor/bootstrap/dist/css/bootstrap.min.css') }}" />

<!-- Flickity -->
<link rel="stylesheet" href="{{ asset('front/vendor/flickity/dist/flickity.min.css') }}" />

<!-- Magnific Popup -->
<link rel="stylesheet" href="{{ asset('front/vendor/magnific-popup/dist/magnific-popup.css') }}" />

<!-- Revolution Slider -->
<link rel="stylesheet" href="{{ asset('front/vendor/slider-revolution/css/settings.css') }}">
<link rel="stylesheet" href="{{ asset('front/vendor/slider-revolution/css/layers.css') }}">
<link rel="stylesheet" href="{{ asset('front/vendor/slider-revolution/css/navigation.css') }}">

<!-- Bootstrap Sweetalert -->
<link rel="stylesheet" href="{{ asset('front/vendor/bootstrap-sweetalert/dist/sweetalert.css') }}" />

<!-- Social Likes -->
<link rel="stylesheet" href="{{ asset('front/vendor/social-likes/dist/social-likes_flat.css') }}" />

<!-- FontAwesome -->
<script defer src="{{ asset('front/vendor/font-awesome/svg-with-js/js/fontawesome-all.min.js') }}"></script>
<script defer src="{{ asset('front/vendor/font-awesome/svg-with-js/js/fa-v4-shims.min.js') }}"></script>

<!-- Youplay -->
<link rel="stylesheet" href="{{ asset('front/css/youplay.css') }}">

<!-- RTL (uncomment this to enable RTL support) -->
<!-- <link rel="stylesheet" href="{{ asset('front/css/youplay-rtl.min.css') }}" /> -->



<!-- END: Styles -->

<!-- jQuery -->
<script src="{{ asset('front/vendor/jquery/dist/jquery.min.js') }}"></script>



<!-- RTL (uncomment this to enable RTL support) -->
<!-- <link rel="stylesheet" type="text/css" href="../assets/youplay/css/youplay-rtl.css" /> -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: [
            '#rules',
            '#news',
            '#shop_product',

        ]
    });
</script>
