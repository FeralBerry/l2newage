@extends("front.layouts.layout")
@section('content')
<!-- Banner -->
<div class="youplay-banner banner-top youplay-banner-parallax small">
    <div class="image" style="background-image: url('{{ asset('front/img/bg/news.jpg') }}')">
    </div>
    <div class="info">
        <div>
            <div class="container">
                <h1>Новости</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Banner -->
<div class="container youplay-news">
    <!-- News List -->
    <div class="col-md-9">
        @if(!empty($search))<h2>Результат поиска по запросу: {{ $search }}</h2>@endif
        <!-- Single News Block -->
        @foreach($news as $new)
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
                            <i class="fa fa-tags"></i>
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
                            {!! Str::limit(strip_tags($new->description,'<img>'),150) !!}
                        </div>
                        <a href="{{ route('news-article',$new->id) }}" class="btn read-more pull-left">Читать подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- /Single News Block -->
        <!-- Pagination -->
        @if($news->hasPages())
            <ul class="pagination">
                <li>
                    <a href="{{ $news->previousPageUrl() }}">
                        Назад
                    </a>
                </li>
                @for($i=1;$i<$news->lastPage()+1;$i++)
                    <li @if($i == $news->currentPage())class="active"@endif><a href="{{ route('news-index')."?page=".$i }}"><span>{{ $i }}</span></a></li>
                @endfor
                <li><a href="{{ $news->nextPageUrl() }}">Вперед</a></li>
            </ul>
        @endif
        <!-- /Pagination -->
    </div>
    <!-- /News List -->
    <!-- Right Side -->
    <div class="col-md-3">
        <!-- Side Search -->
        <div class="side-block">
            <p>Поиск по новостям</p>
            <form method="get" action="{{ route('news-search') }}">
                @csrf
                <div class="youplay-input">
                    <input type="text" name="search" placeholder="по названию новости">
                </div>
            </form>
        </div>
        <!-- /Side Search -->
        <!-- Side Categories -->
        <div class="side-block">
            <h4 class="block-title">Категории</h4>
            <ul class="block-content">
                <li><a href="{{ route('news-index') }}">Все</a>
                </li>
                @foreach($tag_name as $tn)
                <li><a href="{{ route('news-search-tag',$tn->id) }}">{{ $tn->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- Side Categories -->
        <!-- Side Popular News -->
        <div class="side-block">
            <h4 class="block-title">Последние новости</h4>
            <div class="block-content p-0">
                <!-- Single News Block -->
                @foreach($latest_news as $news)
                    @php $img = explode(';',$news->img); @endphp
                    <div class="row youplay-side-news">
                        <div class="col-xs-3 col-md-4">
                            <a href="{{ route('news-article',$news->id) }}" class="angled-img">
                                @php $i = 0; @endphp
                                @foreach($img as $item)
                                    @if($i == 0)
                                        <div class="img">
                                            <img src="{{ asset('front/img/news') }}/{{ $item }}" alt="{{ $news->name }}">
                                        </div>
                                        @php $i++; @endphp
                                    @endif
                                @endforeach
                            </a>
                        </div>
                        <div class="col-xs-9 col-md-8">
                            <h4 class="ellipsis"><a href="{{ route('news-article',$news->id) }}" title="{{ $news->name }}">{{ $news->name }}</a></h4>
                            <span class="date"><i class="fa fa-calendar"></i> {{ $news->created_at }}</span>
                        </div>
                    </div>
            @endforeach
                <!-- /Single News Block -->
            </div>
        </div>
        <!-- /Side Popular News -->
        {{--<!-- Our Twitter -->
        <div class="side-block">
            <h4 class="block-title">Our Twitter</h4>
            <div class="block-content">
                <div class="youplay-twitter" data-twitter-users-name="nkdevv" data-twitter-count="3" data-twitter-hide-replies="false"></div>
            </div>
        </div>
        <!-- /Our Twitter -->--}}
    </div>
    <!-- /Right Side -->
</div>
@endsection
