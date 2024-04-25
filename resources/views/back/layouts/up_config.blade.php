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
@if(
    Route::is('admin-rules-edit') || Route::is('admin-rules-index') ||
    Route::is('admin-news-edit-index') || Route::is('admin-news-add-index')
)
<script src="{{ asset('front/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init(
    {selector:'textarea'}
    );
</script>
@endif
