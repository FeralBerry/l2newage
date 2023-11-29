@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
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
            <textarea id="rules"></textarea>
            <a onclick="rules_change({{ $rules->id }})" class="btn btn-default">Изменить</a>
        </div>
    </div>
@endsection

