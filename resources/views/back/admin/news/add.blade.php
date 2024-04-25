@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <form method="post" action="{{ route('admin-news-add') }}" enctype="multipart/form-data">
                @csrf
                <label for="title">Заголовок</label>
                <input id="title" name="title" class="form-control">
                <label for="img">Изображение</label>
                <input type="file" id="img" name="img">
                <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px">
                    @foreach($tag_name as $item)
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-9">
                                    {{ $item->name }}
                                </div>
                                <div class="col-md-3">
                                    <input class="form-check-input" type="radio" name="tag" value="{{ $item->id }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <label for="news">Описание</label>
                <textarea name="description" id="news"></textarea>
                <button class="btn btn-success" style="margin-top: 10px" type="submit">Добавить</button>
            </form>
        </div>
    </div>
@endsection
