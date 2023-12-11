@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <a href="{{ route('admin-news-add') }}" class="btn btn-success">Добавить</a>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td>Название</td>
                    <td>Краткое описание</td>
                    <td>Изображения и теги</td>
                    <td style="width: 20%">Действия</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                        <tr class="message-unread">
                            <td>{{ $item->name }}</td>
                            <td>{{ Str::limit(strip_tags($item->description),200) }}</td>
                            <td>
                                @php
                                    $img = explode(';',$item->img);
                                @endphp
                                <div class="youplay-carousel youplay-carousel-size-1 youplay-slider gallery-popup pull-right" data-stage-padding="0" data-dots="true" data-arrows="false"
                                     style="width: 100%">
                                    @foreach($img as $i)
                                        <div style="width: 100%">
                                            <a href="{{ asset('front/img/news') }}/{{ $i }}" class="angled-img" >
                                                <div class="img">
                                                    <img src="{{ asset('front/img/news') }}/{{ $i }}" alt="">
                                                </div>
                                                <!--                                        <i class="fa fa-search-plus icon"></i>-->
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin-news-edit',$item->id) }}" class="btn btn-success">Редактировать</a>
                                <a href="{{ route('admin-news-delete',$item->id) }}" onclick="return confirm('Точно удалить эту новость?')" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($news->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $news->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$news->lastPage()+1;$i++)
                        <li @if($i == $news->currentPage())class="active"@endif><a href="{{ route('admin-news-index')."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $news->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
        </div>
    </div>
@endsection
