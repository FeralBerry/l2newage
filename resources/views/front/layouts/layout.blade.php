<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @include("front.layouts.up_config")
</head>
<body>
<!-- Preloader -->
<div class="main-preloader preloader-wrapp">
    <img src="{{ asset('front/img/logo.png') }}" alt="L2NewAge">
    <div class="preloader"></div>
</div>
@if(Auth::user() && Auth::user()->role_id == 1)
    <meta http-equiv="refresh" content="0; url={{ route('admin-index') }}">
@endif
<!-- /Preloader -->
@include("front.layouts.header")
<!-- Main Content -->
<section class="content-wrap">
    @yield("content")
    @include("front.layouts.footer")
</section>
<!-- /Main Content -->

@include("front.layouts.down_config")
</body>
</html>
