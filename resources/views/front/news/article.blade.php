@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
        <div class="image" style="background-image: url({{ asset('front/img/bg/news.jpg') }})">
        </div>
        <div class="info">
            <div>
                <div class="container">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banner -->
    <div class="container youplay-news youplay-post">
        @foreach($news as $new)
        <div class="col-md-9">
            <!-- Post Info -->
            <article class="news-one">
                <!-- Post Text -->
                <div class="description">
                    @php $img = explode(';',$new->img); @endphp
                    <div class="youplay-slider gallery-popup pull-right">
                    @foreach($img as $item)
                        <!-- Slider -->
                        <a href="{{ asset('front/img/news') }}/{{ $item }}" class="angled-img pull-left">
                            <div class="img">
                                <img src="{{ asset('front/img/news') }}/{{ $item }}" alt="">
                            </div>
                        </a>
                    @endforeach
                    </div>
                    <!-- /Slider -->
                    {!! $new->description !!}
                </div>
                <!-- /Post Text -->
                <!-- Post Tags -->
                <div class="tags">
                    <i class="fa fa-tags"></i>
                    @php $tags = explode(',',$new->tag_id); @endphp
                    @foreach($tag_name as $item)
                        @foreach($tags as $tag)
                            @if($item->id == $tag)
                                  <a href="#">{{ $item->name }}</a>,
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <!-- /Post Tags -->
                <!-- Post Meta -->
                <div class="meta">
                    <div class="item">
                        <i class="fa fa-calendar meta-icon"></i>
                        Создана <a href="#!">{{ $new->created_at }}</a>
                    </div>
                    <div class="item">
                        <i class="fa fa-eye meta-icon"></i>
                        Просмотров 384
                    </div>
                    <div class="item">
                        <a href="#"><i class="fa fa-heart"></i> {{ $new->likes }}</a>
                    </div>
                </div>
                <!-- /Post Meta -->
            </article>
            <!-- /Post Info -->

            <!-- Post Comments -->
            <div class="comments-block">
                <h2>Comments <small>({{ $count_comments }})</small></h2>
                @if($count_comments == 0)
                <ul class="comments-list">
                    <li>No Comments ;(</li>
                </ul>
                @else
                    <ul class="youplay-forum mr-10">
                        <li class="body">
                            @foreach($forum_posts as $post)
                                @php $forum_id = $post->forum_id; @endphp
                                <div>
                                    <div class="top">
                                        <a class="author h5 pull-left" href="#!">@foreach($users as $user) @if($user->id == $post->user_id) {{ $user->name }} @endif @endforeach</a>
                                        <div class="date pull-right"><i class="fa fa-calendar"></i> {{ $post->created_at }}</div>
                                    </div>
                                    @foreach($users as $user)
                                        @if($user->id == $post->user_id)
                                            @if($user->avatar !== NULL)
                                                <div class="avatar pull-left">
                                                    <img src="{{ asset('back/users/img/avatar') }}/{{ $user->avatar }}" alt="{{ $user->name }}">
                                                </div>
                                            @else
                                                <div class="avatar pull-left">
                                                    <img src="{{ asset('back/users/img/avatar/no-img.png') }}" alt="{{ $user->name }}">
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                    <div class="reply clearfix">
                                        <div class="text">
                                            {!! $post->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                    </ul>
                @endif
                <h2>Оставить комментарий</h2>
                @if(Auth::user())
                <!-- Comment Form -->
                <form action="#!" method="post" class="comment-form">
                    @csrf
                    <div class="comment-cont clearfix">
                        <div class="youplay-textarea">
                            <textarea name="message" rows="5" placeholder="Оставить коментарий"></textarea>
                        </div>
                        <button class="btn btn-default pull-right">Написать</button>
                    </div>
                </form>
                <!-- /Comment Form -->
                @else
                    <p>Оставлять комментарии могут только зарегистрированые пользователи!</p>
                @endif
            </div>
            <!-- /Post Comments -->
            @endforeach
        </div>
        <!-- Left Side -->
        <div class="col-md-3">
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
        </div>
        <!-- /Left Side -->
    </div>
@endsection
