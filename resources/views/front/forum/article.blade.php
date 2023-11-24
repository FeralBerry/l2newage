@extends('front.layouts.layout')
@section('content')
    <!-- Banner -->
    <div class="youplay-banner banner-top youplay-banner-parallax xsmall">
        <div class="image" style="background-image: url({{ asset('front/img/bg/forum.jpg') }}) ">
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
    <div class="container youplay-content">
        <div class="col-md-12">
            <!-- Breadcrumb -->
            <div class="mt-10 mb-20 pull-left">
                <a href="{{ route('front-index') }}">Главная</a>
                <span class="fa fa-angle-right"></span>
                <a href="{{ route('forum-index') }}">Форум</a>
                <span class="fa fa-angle-right"></span>
                <span>{{ $title }}</span>
            </div>
            <!-- /Breadcrumb -->
            <div class="clearfix"></div>
            <!-- Pagination -->
            @if($forum_posts->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $forum_posts->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$forum_posts->lastPage()+1;$i++)
                        <li @if($i == $forum_posts->currentPage())class="active"@endif><a href="{{ route('forum-posts-index',$id)."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $forum_posts->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
            <!-- /Pagination -->
            <!-- Forums List -->
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
            <!-- /Forums List -->
            <div class="clearfix"></div>
            <!-- Pagination -->
            @if($forum_posts->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $forum_posts->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$forum_posts->lastPage()+1;$i++)
                        <li @if($i == $forum_posts->currentPage())class="active"@endif><a href="{{ route('forum-posts-index',$id)."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $forum_posts->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
            <!-- /Pagination -->
            @if(Auth::user())
            <form action="{{ route('forum-post-add',[$id,$forum_id]) }}" method="POST">
                @csrf
                <div class="youplay-textarea form-group">
                    <textarea name="message" placeholder="Message" rows="5" required=""></textarea>
                </div>
                <button type="submit" class="btn btn-default">Написать</button>
            </form>
            @endif
        </div>
    </div>
@endsection
