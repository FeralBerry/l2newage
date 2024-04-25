@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
        <div class="image" style="background-image: url({{ asset('front/img/bg/cart.jpg') }})">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Корзина</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <div class="container youplay-content">
        <div class="col-md-9">
            @if(isset($header_price) && $header_price > 0)
            <div id="cart-main">
                @foreach($cart as $item)
                    @foreach($shop as $s)
                        @if($s->id == $item->shop_id)
                            <div class="item angled-bg" id="product-main{{$item->shop_id}}">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-xs-4">
                                        <div class="angled-img">
                                            <div class="img">
                                                @php
                                                    $img = explode('||',$s->img);
                                                @endphp
                                                <img src="{{ asset('front/img/shop') }}/{{ $img[0] }}" alt="{{ $s->title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-8 col-xs-8">
                                        <div class="row">
                                            <div class="col-xs-6 col-md-8">
                                                <h4>{{ $s->title }}</h4>
                                            </div>
                                            <div class="col-xs-6 col-md-4 align-right">
                                                <div class="price">
                                                    <div class="number">
                                                        <button class="number-minus" type="button" onclick="this.nextElementSibling.stepDown(); this.nextElementSibling.onchange();">-</button>
                                                        <input id="num{{ $item->shop_id }}" type="number" min="1" onchange="new_price({{$item->shop_id}})" value="{{ $item->count }}" readonly>
                                                        <button class="number-plus" type="button" onclick="this.previousElementSibling.stepUp(); this.previousElementSibling.onchange();">+</button>
                                                    </div>
                                                    <br>
                                                    <span class="quantity" id="price{{ $item->shop_id }}"><span class="amount">&#8381;{{ $item->count * ($s->price - ($s->price * $s->percent / 100)) }}</span><sup><del> &#8381;{{ $s->price * $item->count }}</del></sup></span>
                                                </div>
                                                <a href="#" onclick="cartDelete({{ $item->shop_id }})" style="text-decoration: none; font-size: 20px" class="pull-right mr-10"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                <div class="align-right h3 mr-20 mb-20" id="price-main">
                    Всего: <strong>&#8381;{{ $header_price }}</strong>
                </div>
                <div class="align-right">
                    <a href="{{ route('payment-create') }}" class="btn btn-lg">Оформить покупку</a>
                </div>
            </div>
            @else
            <div id="cart-main">
                <h3>В корзине пока ничего нет</h3>
            </div>
            @endif
        </div>
        <!-- Right Side -->
        <div class="col-md-3">
            <!-- Side Popular News -->
            <div class="side-block">
                <h4 class="block-title">Купленные товары</h4>
                <div class="block-content p-0">
                    <!-- Single News Block -->
                    @foreach($ordersAll as $order)
                        @foreach($shop as $item)
                            @if($order->shop_id == $item->id)
                                <div class="row youplay-side-news">
                                    <div class="col-xs-3 col-md-4">
                                        <a href="{{ route('shop-product',$item->id) }}" class="angled-img">
                                            @if($item->img == NULL)
                                                <div class="img">
                                                    <img src="{{ asset('front/img/shop/no-img.png') }}" alt="">
                                                </div>
                                            @else
                                                @php
                                                    $img = explode('||',$item->img);
                                                @endphp
                                                <div class="img">
                                                    <img src="{{ asset('front/img/shop') }}/{{ $img[0] }}" alt="{{ $item->title }}">
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-xs-9 col-md-8">
                                        <h4 class="ellipsis"><a href="{{ route('shop-product',$item->id) }}" title="$item->title">{{$item->title}}</a></h4>
                                        @php $new_price = $item->price - ($item->price * $item->percent  / 100); @endphp
                                        <div class="price">&#8381;{{ $new_price }} <sup><del>&#8381;{{ $item->price }}</del></sup><span class="badge pull-right bg-warning">{{ $order->count }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    <!-- /Single News Block -->
                    </div>
                </div>
            <!-- /Side Popular News -->
        </div>
        <!-- /Right Side -->
    </div>
@endsection
