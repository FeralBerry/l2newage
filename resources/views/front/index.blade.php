@extends("front.layouts.layout")
@section("content")
    <!-- Banner -->
    <section class="youplay-banner banner-top youplay-banner-parallax">
        <div class="image">
            <video width="100%" src="{{ asset('front/video/bg.mp4') }}" autoplay muted loop>

            </video>
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>L2NewAge <br>Сервер на долгое время</h1>
                    <em>"Живите в своем мире, отдыхайте в нашем!"</em>
                    <br>
                    <br>
                    <br>
                    <a class="btn btn-lg" href="{{ route('register') }}">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Banner -->
    <!-- Images With Text -->
    <div class="youplay-carousel" data-autoplay="5000">
        @foreach($shop_purchased as $item)
            @php $img = explode('||',$item->img) @endphp
            <a class="angled-img" href="{{ route('shop-product',$item->id) }}">
                <div class="img">
                    <img src="{{ asset("front/img/shop") }}/{{ $img[0] }}" alt="{{ $item->title }}">
                </div>
                <div class="over-info">
                    <div>
                        <div>
                            <h4>{{ $item->title }}</h4>
                            <div class="rating" id="rating{{ $item->id }}">
                                @php
                                    $rating = 0;
                                    if(($item->rate_1 + $item->rate_2 + $item->rate_3 + $item->rate_4 + $item->rate_5) !== 0){
                                        $rating = ($item->rate_1 * 1 + $item->rate_2 * 2 + $item->rate_3 * 3 + $item->rate_4 * 4 + $item->rate_5 * 5) / ($item->rate_1 + $item->rate_2 + $item->rate_3 + $item->rate_4 + $item->rate_5);
                                    }
                                @endphp
                                @if($rating < 0.5)
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(0.5 <= $rating && $rating < 1)
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(1 <= $rating && $rating < 1.5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(1.5 <= $rating && $rating < 2)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(2 <= $rating && $rating < 2.5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(2.5 <= $rating && $rating < 3)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(3 <= $rating && $rating < 3.5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(3.5 <= $rating && $rating < 4)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(4 <= $rating && $rating < 4.5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(4.5 <= $rating && $rating < 5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                @elseif($rating == 5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <!-- /Images With Text -->
    <!-- Preorder -->
    <div class="h2"></div>
    <section class="youplay-banner youplay-banner-parallax small">
        <div class="image" style="background-image: url('{{ asset("front/images/banner-witcher-3.jpg") }}');">
        </div>

        <div class="info container align-center">
            <div>
                <h2>Распродажа<br> Ценных вещей</h2>

                <!-- See countdown init in bottom of the page -->
                <div class="countdown h2" data-end="2022/12/01"></div>

                <br>
                <br>
                <a class="btn btn-lg" href="#!">Посмотреть</a>
            </div>
        </div>
    </section>
    <!-- /Preorder -->
    <!-- Specials -->
    <h2 class="container h1">Специальное предложение <a href="#!" class="btn pull-right">Посмотреть</a></h2>
    <div class="youplay-carousel">
        @foreach($shop_sales as $item)
            @php $img = explode('||',$item->img); @endphp
            <a class="angled-img" href="{{ route('shop-product',$item->id) }}">
                <div class="img img-offset">
                    <img src="{{ asset("front/img/shop") }}/{{ $img[0] }}" alt="{{ $item->title }}">
                    @if($item->percent !== 0)
                    <div class="badge bg-default">
                        -{{ $item->percent }}%
                    </div>
                    @endif
                    @if($item->new == 1)<div class="badge show bg-success" style="right:0;left:auto">NEW</div>@endif
                </div>
                <div class="bottom-info">
                    <h4>{{ $item->title }}</h4>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="rating" id="rating{{ $item->id }}">
                                @php
                                    $rating = 0;
                                    if(($item->rate_1 + $item->rate_2 + $item->rate_3 + $item->rate_4 + $item->rate_5) !== 0){
                                        $rating = ($item->rate_1 * 1 + $item->rate_2 * 2 + $item->rate_3 * 3 + $item->rate_4 * 4 + $item->rate_5 * 5) / ($item->rate_1 + $item->rate_2 + $item->rate_3 + $item->rate_4 + $item->rate_5);
                                    }
                                @endphp
                                @if($rating < 0.5)
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(0.5 <= $rating && $rating < 1)
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(1 <= $rating && $rating < 1.5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(1.5 <= $rating && $rating < 2)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(2 <= $rating && $rating < 2.5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(2.5 <= $rating && $rating < 3)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(3 <= $rating && $rating < 3.5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(3.5 <= $rating && $rating < 4)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(4 <= $rating && $rating < 4.5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                @elseif(4.5 <= $rating && $rating < 5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                @elseif($rating == 5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-6">
                            @php $new_price = $item->price - ($item->price * $item->percent  / 100); @endphp
                            <div class="price">&#8381;{{ $new_price }} @if($item->percent !== 0)<sup><del>&#8381;{{ $item->price }}</del></sup>@endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <!-- /Specials -->
    <!-- Latest News -->
    <h2 class="container h1">Последние новости</h2>
    <section class="youplay-news container">
        @foreach($latest_news as $new)
            @php $img = explode(';',$new->img); @endphp
        <div class="news-one">
            <div class="row vertical-gutter">
                <div class="col-md-4">
                    <a href="{{ route('news-article',$new->id) }}" class="angled-img">
                        @php $i = 0; @endphp
                        @foreach($img as $item)
                            @if($i == 0)
                                <div class="img">
                                    <img src="{{ asset('front/img/news') }}/{{ $item }}" alt="{{ $new->name }}">
                                </div>
                                @php $i++; @endphp
                            @endif
                        @endforeach
                        {{--<div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="9.1 out of 10"><span>9.1</span>
                        </div>--}}
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="clearfix">
                        <h3 class="h2 pull-left m-0"><a href="{{ route('news-article',$new->id) }}">{{ $new->name }}</a></h3>
                        <span class="date pull-right"><i class="fa fa-calendar"></i> {{ $new->created_at }}</span>
                    </div>
                    <div class="tags">
                        @php $tag_id = explode(',',$new->tag_id); @endphp
                        @foreach($tag_name as $tn)
                            @foreach($tag_id as $t_id)
                                @if($t_id == $tn->id)
                                    <a href="{{ route('news-search-tag',$tn->id) }}">{{ $tn->name }}</a>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="description">
                        {!! Str::limit(strip_tags($new->description),150) !!}
                    </div>
                    <a href="{{ route('news-article',$new->id) }}" class="btn read-more pull-left">Читать подробнее</a>
                </div>
            </div>
        </div>
        @endforeach
    </section>
    <!-- /Latest News -->
    <!-- Partners -->
    <section class="youplay-banner youplay-banner-parallax small mt-80">
        <div class="image" style="background-image: url('{{ asset("front/img/bg/partner.jpg") }}');">
        </div>
        <div class="info align-center">
            <div>
                <h2 class="mb-40">Партнеры</h2>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="owl-carousel" data-autoplay="6000">
                            @foreach($partner as $item)
                            <div class="item">
                                {!! $item->kod !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Partners -->
@endsection
