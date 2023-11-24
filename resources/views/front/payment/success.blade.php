@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
        <div class="image" style="background-image: url('assets/images/banner-blog-bg.jpg')">
        </div>
        <div class="info">
            <div>
                <div class="container">
                    <h1>Подтверждение платежа</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <div class="container youplay-content">
        <div class="col-md-12">
            <div id="cart-main">
                <h3>Платеж успешно подтвержден! Все купленые вещи начислены на аккаунт, для перевода в игру на персонажа перейдите в соответствующий раздел.</h3>
            </div>
        </div>
        <!-- Right Side -->
        <div class="col-md-3">
            <!-- Side Search -->
            <div class="side-block">
                <p>Search by Games:</p>
                <form action="http://html.nkdev.info/youplay/dark/search.html">
                    <div class="youplay-input">
                        <input type="text" name="search" placeholder="enter search term">
                    </div>
                </form>
            </div>
            <!-- /Side Search -->
            <!-- Side Categories -->
            <div class="side-block">
                <h4 class="block-title">Categories</h4>
                <ul class="block-content">
                    <li><a href="#!">All</a>
                    </li>
                    <li><a href="#!">Action</a>
                    </li>
                    <li><a href="#!">Adventure</a>
                    </li>
                    <li><a href="#!">Casual</a>
                    </li>
                    <li><a href="#!">Indie</a>
                    </li>
                    <li><a href="#!">Racing</a>
                    </li>
                    <li><a href="#!">RPG</a>
                    </li>
                    <li><a href="#!">Simulation</a>
                    </li>
                    <li><a href="#!">Strategy</a>
                    </li>
                </ul>
            </div>
            <!-- /Side Categories -->

            <!-- Side Popular News -->
            <div class="side-block">
                <h4 class="block-title">Popular Games</h4>
                <div class="block-content p-0">
                    <!-- Single News Block -->
                    <div class="row youplay-side-news">
                        <div class="col-xs-3 col-md-4">
                            <a href="store-product-1.html" class="angled-img">
                                <div class="img">
                                    <img src="assets/images/game-bloodborne-500x375.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-9 col-md-8">
                            <h4 class="ellipsis"><a href="store-product-1.html" title="Bloodborne">Bloodborne</a></h4>
                            <span class="price">$50.00</span>
                        </div>
                    </div>
                    <!-- /Single News Block -->

                    <!-- Single News Block -->
                    <div class="row youplay-side-news">
                        <div class="col-xs-3 col-md-4">
                            <a href="#!" class="angled-img">
                                <div class="img">
                                    <img src="assets/images/game-dark-souls-ii-500x375.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-9 col-md-8">
                            <h4 class="ellipsis"><a href="#!" title="Dark Souls II">Dark Souls II</a></h4>
                            <span class="price">$39.99 <sup><del>$49.99</del></sup></span>
                        </div>
                    </div>
                    <!-- /Single News Block -->

                    <!-- Single News Block -->
                    <div class="row youplay-side-news">
                        <div class="col-xs-3 col-md-4">
                            <a href="#!" class="angled-img">
                                <div class="img">
                                    <img src="assets/images/game-kingdoms-of-amalur-reckoning-500x375.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-9 col-md-8">
                            <h4 class="ellipsis"><a href="#!" title="Kingdoms of Amalur">Kingdoms of Amalur</a></h4>
                            <span class="price">$20.00</span>
                        </div>
                    </div>
                    <!-- /Single News Block -->

                    <!-- Single News Block -->
                    <div class="row youplay-side-news">
                        <div class="col-xs-3 col-md-4">
                            <a href="#!" class="angled-img">
                                <div class="img">
                                    <img src="assets/images/game-diablo-iii-500x375.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-9 col-md-8">
                            <h4 class="ellipsis"><a href="#!" title="Let's Grind Diablo III">Diablo III</a></h4>
                            <span class="price">$10.00</span>
                        </div>
                    </div>
                    <!-- /Single News Block -->
                </div>
            </div>
            <!-- /Side Popular News -->

            <!-- Instagram -->
            <div class="side-block">
                <h4 class="block-title">Instagram</h4>
                <div class="youplay-instagram row small-gap" data-instagram-user-id="2133360819"></div>
            </div>
            <!-- /Instagram -->

        </div>
        <!-- /Right Side -->

    </div>
@endsection

