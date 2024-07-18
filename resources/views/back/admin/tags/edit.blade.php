@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <h2>Добавление нового новостного тега</h2>
        <div class="row">
            <form method="post" action="{{ route('admin-tags-edit',$id) }}">
                @csrf
                <label for="tag_name">Название тега</label>
                <input id="tag_name" name="tag_name" class="form-control" value="{{ $tag_name }}">
                <button class="btn btn-success" style="margin-top: 10px" type="submit">Изменить</button>
            </form>
        </div>
    </div>
@endsection
