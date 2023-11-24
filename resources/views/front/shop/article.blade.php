@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
        <div class="image" style="background-image: url({{ asset('front/img/bg/product.jpg') }})">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Описание товара - {{ $product_name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <div class="container youplay-news youplay-post">
        <div class="col-md-9 col-md-push-3">
            <!-- Post Info -->
            @foreach($product as $item)
                <article class="news-one">
                <!-- Post Text -->
                <div class="description">
                    <!-- Slider -->
                    @php
                        $img = explode('||',$item->img);
                    @endphp

                        <div class="youplay-slider gallery-popup pull-right">
                            @foreach($img as $i)
                                <div id="item">
                                    <a href="#" class="angled-img pull-left">
                                        <div class="img">
                                            <img src="{{ asset('front/img/shop') }}/{{ $i }}" alt="">
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                    </div>
                    <!-- /Slider -->
                    <h3>Описание товара:</h3>
                    @php
                        $item_id = explode(',',$item->item_id);
                    @endphp
                    @foreach($items as $i)
                        @foreach($item_id as $j)
                            @if($j == $i->id)
                                <h4>{!! $i->name !!}</h4>
                                <p>{!! $i->description !!}</p>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <!-- /Post Text -->
                @if(Auth::user())
                    <div class="col-xs-12">
                        <a id="add_cart" class="btn btn-default db">В корзину</a>
                    </div>
                @else
                    <div class="col-xs-12" style="color: red">
                        Покупка, комментирование и голосование за предмет доступно только авторизированым пользователям.
                    </div>
                @endif
                <!-- Post Share -->
                <div class="btn-group social-list social-likes" data-counters="no">
                </div>
                <!-- /Post Share -->
            </article>
            @endforeach
            <!-- /Post Info -->

            <!-- Post Comments -->
            <div class="comments-block">
                <h2>Comments <small>(0)</small></h2>

                <ul class="comments-list">
                    <li>No Comments ;(</li>
                </ul>

                <h2>Leave a Reply</h2>
                <!-- Comment Form -->
                <form action="#!" class="comment-form">
                    <div class="comment-cont clearfix">
                        <div class="youplay-input">
                            <input type="text" name="username" placeholder="Your Name *">
                        </div>
                        <div class="youplay-input">
                            <input type="email" name="email" placeholder="Your Email *">
                        </div>
                        <div class="youplay-textarea">
                            <textarea name="message" rows="5" placeholder="Your Comment..."></textarea>
                        </div>
                        <button class="btn btn-default pull-right">Submit</button>
                    </div>
                </form>
                <!-- /Comment Form -->
            </div>
            <!-- /Post Comments -->
        </div>

        <!-- Left Side -->
        <div class="col-md-3 col-md-pull-9">
            <!-- Side Popular News -->
            <div class="side-block">
                <h4 class="block-title">Купленные товары</h4>
                <div class="block-content p-0">
                    <!-- Single News Block -->
                    @foreach($orders as $order)
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
                                @endif
                                @endforeach
                                @endforeach
                                <!-- /Single News Block -->
                                </div>
                </div>
                <!-- /Side Popular News -->
            </div>
        <!-- /Left Side -->
        </div>
    </div>
@endsection
