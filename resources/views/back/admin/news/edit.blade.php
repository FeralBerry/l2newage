@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            @foreach($news as $item)
            <form method="post" action="{{ route('admin-news-edit',$item->id) }}" enctype="multipart/form-data">
                @csrf
                <label for="title">Заголовок</label>
                <input id="title" name="title" class="form-control" value="{{ $item->name }}">
                <label for="img">Изображение</label>
                <input type="file" id="img" name="img">
                <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px">
                    @foreach($tag_name as $tag)
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-9">
                                    {{ $tag->name }}
                                </div>
                                <div class="col-md-3">
                                    <input class="form-check-input" type="radio" name="tag" @if($tag->id == $item->tag_id) selected @endif value="{{ $tag->id }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <label for="news">Описание</label>
                <textarea id="news">{{ $item->description }}</textarea>
                <button class="btn btn-success" style="margin-top: 10px" type="submit">Добавить</button>
            </form>
            @endforeach
        </div>
    </div>
@endsection
