@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <h2>Редактирование пользователя с id {{ $id }}</h2>
        <div class="row">
            <form method="post" action="{{ route('admin-users-edit',$id) }}">
                @csrf
                @foreach($user as $item)
                    <label for="name">Имя на сайте</label>
                    <input id="name" name="name" class="form-control" value="{{ $item->name }}">
                    <label for="email">Email</label>
                    <input id="email" name="email" class="form-control" value="{{ $item->email }}">
                    <label for="password">Новый пароль</label>
                    <input id="password" name="password" class="form-control">
                    <button class="btn btn-success" style="margin-top: 10px" type="submit">Изменить</button>
                @endforeach
            </form>
        </div>
    </div>
@endsection
