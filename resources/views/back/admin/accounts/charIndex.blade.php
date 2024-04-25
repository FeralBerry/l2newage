@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            @foreach($character as $char)
                <form method="post" action="{{ route('admin-character-edit',$char->charId) }}">
                    @csrf
                    <div class="col-md-6">
                        <div class="youplay-input">
                            <input type="text" name="account_name" placeholder="Логин">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="youplay-input">
                            <input type="text" name="char_name" placeholder="Имя персонажа">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="youplay-input">
                            <label for="level">
                                Уровень
                            </label>
                            <input type="number" min="1" max="130" id="level" name="level">
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
