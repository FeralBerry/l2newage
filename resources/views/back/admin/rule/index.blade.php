@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <h2>Заголовок: {{ $rules->name }}</h2>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td style="width: 30px">id</td>
                    <td>Описание</td>
                </tr>
                </thead>
                <tbody>
                    <tr class="message-unread">
                        <td>{{ $rules->id }}</td>
                        <td id="rul_desc{{ $rules->id }}">{!! Str::limit(strip_tags($rules->description),200) !!}</td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-default" href="{{ route('admin-rules-index',$newId) }}" style="margin-bottom: 10px">Добавить новый документ</a>
            <input class="form-control" name="name" id="name_rule" value="{{ $rules->name }}" style="margin-bottom: 10px">
            <textarea id="rules">{{ $rules->description }}</textarea>
            <a onclick="rules_change({{ $rules->id }})" class="btn btn-default" style="margin-top: 10px">Изменить</a>
        </div>
    </div>
@endsection

