<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @include("back.layouts.up_config")
</head>
<body>
<!-- Preloader -->
<div class="page-preloader preloader-wrapp">
    <img src="{{ asset('front/img/logo.png') }}" alt="L2NewAge">
    <div class="preloader"></div>
</div>
<!-- /Preloader -->
@include("back.layouts.header")
<!-- Main Content -->
<section class="content-wrap">
    @yield("content")
    @include("back.layouts.footer")
</section>
<!-- /Main Content -->

@include("back.layouts.down_config")
</body>
</html>
