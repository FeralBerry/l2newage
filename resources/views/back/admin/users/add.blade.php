@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <h2>Добавление нового пользователя на сайт</h2>
        <div class="row">
            <form method="post" action="{{ route('admin-users-add') }}">
                @csrf
                <label for="name">Имя для сайта</label>
                <input id="name" name="name" class="form-control">
                <label for="email">Email</label>
                <input id="email" name="email" class="form-control">
                <label for="password">Пароль</label>
                <input id="password" name="password" class="form-control">
                <button class="btn btn-success" style="margin-top: 10px" type="submit">Добавить</button>
            </form>
        </div>
    </div>
@endsection
