@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <form method="post" action="{{ route('admin-items-add') }}" enctype="multipart/form-data">
                @csrf
                <label for="name">Название</label>
                <input id="name" name="name" class="form-control">
                <label for="id">Id предмета</label>
                <input id="id" name="id" type="number" class="form-control">
                <label for="count">Количество</label>
                <input id="count" type="number" name="count" class="form-control">
                <label for="img">Изображение</label>
                <input type="file" id="img" name="img">
                <div class="col-md-12">
                    @foreach($filter_name as $item)
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
                <label for="description">Описание</label>
                <textarea name="description" id="description"></textarea>
                <button class="btn btn-success" style="margin-top: 10px" type="submit">Добавить</button>
            </form>
        </div>
    </div>
@endsection
