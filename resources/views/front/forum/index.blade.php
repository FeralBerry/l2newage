@extends('front.layouts.layout')
@section('content')
<!-- Banner -->
<div class="youplay-banner banner-top youplay-banner-parallax xsmall">
    <div class="image" style="background-image: url('{{ asset('front/img/bg/forum.jpg') }}')">
    </div>

    <div class="info">
        <div>
            <div class="container">
                <h1>Форум</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Banner -->
<div class="container youplay-content">
    <div class="col-md-9">
        <!-- Breadcrumb -->
        <div class="mt-10 pull-left">
            <a href="{{ route('front-index') }}">Главная</a>
            <span class="fa fa-angle-right"></span>
            @if(!empty($search))
                <a href="{{ route('forum-index') }}">Форум</a>
                <span class="fa fa-angle-right"></span>
                <span>{{ $search }}</span>
            @else
                <span>Форум</span>
            @endif
        </div>
        <!-- /Breadcrumb -->
        <div class="clearfix"></div>
        @if(!empty($search))
            <h2>Результат поиска по форому на запрос: {{ $search }}</h2>
        @endif
        <!-- Forums List -->
        <ul class="youplay-forum mr-10">
            <li class="header">
                <ul>
                    <li class="cell-icon"></li>
                    <li class="cell-info">Заголовок</li>
                    <li class="cell-reply-count">Ответов</li>
                    <li class="cell-freshness">Автор</li>
                </ul>
            </li>
            <li class="body">
                @foreach($forum as $item)
                <ul>

                    <li class="cell-icon">
                        <i class="fa fa-folder-open-o"></i>
                    </li>
                    <li class="cell-info">
                        <a href="{{ route('forum-article',$item->id) }}" class="title h4">{{ $item->title }}</a>
                        <div class="description">{!! Str::limit(strip_tags($item->description,'<img>'),100) !!}</div>
                        <ul class="forums-list">
                            @php $tag_id = explode(',',$item->tag_name_id); @endphp
                            @foreach($tag_id as $t_id)
                                @foreach($tag_name as $tn)
                                    @if($tn->id == $t_id)
                                        <li><a href="#!"><i class="fa fa-folder-open-o"></i> {{ $tn->name }}</a> </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                    @php $i = 0; @endphp
                    <li class="cell-reply-count">@foreach($forum_posts as $post) @if($item->id == $post->forum_id) @php $i++; @endphp @endif @endforeach{{ $i }}</li>
                    <li class="cell-freshness">
                        <a href="#!">{{ $item->created_at }}</a>
                        <p>
                            @foreach($users as $user)
                                @if($user->id == $item->user_id)
                                    @if($user->avatar !== NULL && $user->avatar !== '')
                                        <a href="#!">
                                            <img alt="{{ $user->name }}" src="{{ asset('back/users/img/avatar') }}/{{ $user->avatar }}" height="25" width="25">{{ $user->name }}
                                        </a>
                                    @else
                                        <a href="#!">
                                            <img alt="{{ $user->name }}" src="{{ asset('back/users/img/avatar/no-img.png') }}" height="25" width="25">{{ $user->name }}
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </p>
                    </li>

                </ul>
                @endforeach
            </li>
        </ul>
        <!-- /Forums List -->
        <div class="clearfix"></div>
    </div>

    <!-- Right Side -->
    <div class="col-md-3">
        <!-- Side Search -->
        <div class="side-block">
            <p>Поиск по форуму:</p>
            <form action="{{ route('forum-search') }}" method="get">
                @csrf
                <div class="youplay-input">
                    <input type="text" name="search" placeholder="поиск по форуму">
                </div>
            </form>
        </div>
        <!-- /Side Search -->
        <!-- Side Categories -->
        <div class="side-block">
            <h4 class="block-title">Категории</h4>
            <ul class="block-content">
                <li><a href="{{ route('forum-index') }}">Все</a>
                </li>
                @foreach($tag_name as $tn)
                    <li><a href="{{ route('forum-search-tag',$tn->id) }}">{{ $tn->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- /Side Categories -->

        <!-- Side Popular News -->
        <div class="side-block">
            <h4 class="block-title">Последние ответы</h4>
            <div class="block-content p-0">
                <!-- Single News Block -->
                @foreach($latest_forum as $last)
                <div class="row youplay-side-news">
                    <div class="col-xs-12 col-md-12">
                        @php $i = 0; @endphp
                        <h4 class="ellipsis"><a href="{{ route('forum-article',$last->id) }}" title="{{ $last->title }}">{{ $last->title }}</a></h4>
                        <span class="price">Ответов: @foreach($forum_posts as $post) @if($last->id == $post->forum_id) @php $i++; @endphp @endif @endforeach{{ $i }}</span>
                    </div>
                </div>
                @endforeach
                <!-- /Single News Block -->
            </div>
        </div>
        <!-- /Side Popular News -->
        {{--<!-- Instagram -->
        <div class="side-block">
            <h4 class="block-title">Instagram</h4>
            <div class="youplay-instagram row small-gap" data-instagram-users-id="2133360819"></div>
        </div>
        <!-- /Instagram -->--}}
    </div>
    <!-- /Right Side -->
    @if(Auth::user())
    <div class="col-md-12">
        <form action="{{ route('forum-add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="youplay-input form-group">
                        <input type="text" name="title" placeholder="Заголовок" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    @foreach($tag_name as $tn)
                        <div class="form-group">
                            <div class="youplay-checkbox">
                                <input type="checkbox" id="{{ $tn->id }}" name="tag[]" value="{{ $tn->id }}">
                                <label for="{{ $tn->id }}">{{ $tn->name }}</label>
                                <br>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="youplay-textarea form-group">
                <textarea name="message" placeholder="Message" rows="5" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-default">Написать</button>
        </form>
    </div>
    @endif
</div>
@endsection
