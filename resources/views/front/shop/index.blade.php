@extends('front.layouts.layout')
@section('content')
<!-- Main Content -->
<div class="container youplay-store store-grid" style="padding-top: 50px">
    <!-- Games List -->
    <div class="col-md-9 isotope">
        @if(isset($search))
        <h2>Результат поиска по запросу: {{ $search }}</h2>
        @endif
        <!-- Sort Categories -->
        <ul class="pagination isotope-options">
            <li data-filter="all" class="active"><span>All</span></li>
            @foreach($filter_name as $item)
                <li data-filter="{{ $item->id }}"><span>{{ $item->name }}</span></li>
            @endforeach
        </ul>
        <!-- /Sort Categories -->
        <div class="isotope-list row vertical-gutter">
            <!-- Single Product Block -->
            @foreach($shop as $item)
                <div id="item{{ $item->id }}" class="item col-lg-4 col-md-6 col-xs-12" data-filters="{{ $item->filter_id }}">
                    <a href="{{ route('shop-product',$item->id) }}" class="angled-img">
                    <div class="img img-offset">
                        @php
                            $img = explode('||',$item->img);
                        @endphp
                        <img src="{{ asset('front/img/shop') }}/{{ $img[0] }}" alt="{{ $item->title }}">
                        @if($item->percent !== NULL)<div class="badge show bg-default">-{{ $item->percent }}%</div>@endif
                        @if($item->new == 1)<div class="badge show bg-success" style="right:0;left:auto">NEW</div>@endif
                    </div>
                    <div class="bottom-info">
                        <h4>{{ $item->title }}</h4>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="rating" id="rating{{ $item->id }}">
                                    @php
                                        $voice = 0;
                                        $rating = 0;
                                        if(($item->rate_1 + $item->rate_2 + $item->rate_3 + $item->rate_4 + $item->rate_5) !== 0){
                                            $rating = ($item->rate_1 * 1 + $item->rate_2 * 2 + $item->rate_3 * 3 + $item->rate_4 * 4 + $item->rate_5 * 5) / ($item->rate_1 + $item->rate_2 + $item->rate_3 + $item->rate_4 + $item->rate_5);
                                        }
                                        if(Auth::user()){
                                            if(Auth::user()->rate_shop !== NULL){
                                                $rate_shop = explode(',',Auth::user()->rate_shop);
                                                foreach ($rate_shop as $rate => $value){
                                                    if($value == $item->id){
                                                        $voice = 1;
                                                    }
                                                }
                                            }
                                        }
                                    @endphp
                                    @if($rating < 0.5)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(0.5 <= $rating && $rating < 1)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star-half-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(1 <= $rating && $rating < 1.5)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(1.5 <= $rating && $rating < 2)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star-half-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(2 <= $rating && $rating < 2.5)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(2.5 <= $rating && $rating < 3)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star-half-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(3 <= $rating && $rating < 3.5)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(3.5 <= $rating && $rating < 4)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star-half-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(4 <= $rating && $rating < 4.5)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif(4.5 <= $rating && $rating < 5)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star-half-o"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @elseif($rating == 5)
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate1(1,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate2(2,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate3(3,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate4(4,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                        @if(Auth::user() && $voice == 0)<a href="#" onclick="rate5(5,{{ $item->id }})">@endif<i class="fa fa-star"></i>@if(Auth::user() && $voice == 0)</a>@endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="price">
                                    @php
                                        if($item->percent !== NULL){
                                            $new_price = $item->price - ($item->price * $item->percent  / 100);
                                        } else {
                                            $new_price = $item->price;
                                        }
                                    @endphp
                                    <div class="price">
                                        @if($item->percent == 100)
                                            <span class="text-success">Бесплатно</span>
                                        @else
                                            &#8381;{{ $new_price }}
                                        @endif
                                        @if($new_price !== $item->price )
                                            <sup>
                                                <del>&#8381;{{ $item->price }}</del>
                                            </sup>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user())
                                <div class="col-xs-12">
                                    <a id="cart{{ $item->id }}" class="btn btn-default db">В корзину</a>
                                </div>
                            @else
                                <div class="col-xs-12">
                                    <a onclick="alert('Для наполения корзина нужно автоизоваться!')" class="btn btn-default db">В корзину</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
            <!-- /Single Product Block -->
        </div>
    @if($shop->hasPages())
        <ul class="pagination">
            <li>
                <a href="{{ $shop->previousPageUrl() }}">
                    Назад
                </a>
            </li>
            @for($i=1;$i<$shop->lastPage()+1;$i++)
                <li @if($i == $shop->currentPage())class="active"@endif>
                    <a href="{{ route('shop-index')."?page=".$i }}"><span>{{ $i }}</span></a>
                </li>
            @endfor
            <li><a href="{{ $shop->nextPageUrl() }}">Вперед</a></li>
        </ul>
    @endif
    </div>
    <!-- /Games List -->
    <!-- Right Side -->
    <div class="col-md-3">
        <!-- Side Search -->
        <div class="side-block">
            <p>Поиск по товарам:</p>
            <form action="{{ route('shop-search') }}">
                <div class="youplay-input">
                    <input type="text" name="search" placeholder="Название или часть">
                </div>
            </form>
        </div>
        <!-- /Side Search -->
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
    <!-- /Right Side -->
</div>
@endsection
