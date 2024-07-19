@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <form method="post" action="{{ route('admin-items-edit',$id) }}" enctype="multipart/form-data">
                @csrf
                @foreach($items as $item)
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Название</label>
                            <input id="name" name="name" class="form-control" value="{{ $item->name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="item_game_id">Id предмета</label>
                            <input id="item_game_id" name="item_game_id" type="number" class="form-control" value="{{ $item->item_game_id }}">
                        </div>
                        <div class="col-md-6">
                            @if($item->img !== null)
                                <img src="{{ asset("front/img/item") }}/{{ $item->type }}/{{ $item->img }}" alt="{{ $item->name }}">
                            @endif
                            <label for="img">Изображение</label>
                            <input type="file" id="img" name="img">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Оружие
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="type" value="Оружие"
                                            @if($item->type == "Оружие") checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Броня
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="type" value="Броня"
                                            @if($item->type == "Броня") checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Аксесуар
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="type" value="Аксесуар"
                                            @if($item->type == "Аксесуар") checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Расходник
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="type" value="Расходник"
                                            @if($item->type == "Расходник") checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Сундук
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="type" value="Сундук"
                                            @if($item->type == "Сундук") checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Квестовый предмет
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="type" value="Квестовый предмет"
                                            @if($item->type == "Квестовый предмет") checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Ресурс
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="type" value="Ресурс"
                                            @if($item->type == "Ресурс") checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Материалы для создания
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="type" value="Материалы для создания"
                                            @if($item->type == "Материалы для создания") checked @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="recipe_id">Id рецепта для создания</label>
                            <input id="recipe_id" name="recipe_id" type="number" class="form-control" value="{{ $item->recipe_number }}">
                        </div>
                        <div class="col-md-6">
                            <label for="fallout_id">Id списка выпадающих предметов</label>
                            <input id="fallout_id" name="fallout_id" type="number" class="form-control" value="{{ $item->fallout_number }}">
                        </div>
                        <div class="col-md-6">
                            <label for="specifications_id">Id характеристик</label>
                            <input id="specifications_id" name="specifications_id" type="number" class="form-control" value="{{ $item->specifications_id }}">
                        </div>
                        <div class="col-md-6">
                            <label for="game_price">Игровая цена</label>
                            <input id="game_price" name="game_price" type="number" class="form-control" value="{{ $item->game_price }}">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            Не временный предмет
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="0"
                                                   @if($item->temporary == 0) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            1 час
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="1"
                                                   @if($item->temporary == 1) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            3 часа
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="3"
                                                   @if($item->temporary == 3) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            5 часов
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="5"
                                                   @if($item->temporary == 5) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            10 часов
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="10"
                                                   @if($item->temporary == 10) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            1 день
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="24"
                                                   @if($item->temporary == 24) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            3 дня
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="72"
                                                   @if($item->temporary == 72) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            7 дней
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="168"
                                                   @if($item->temporary == 168) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            30 дней
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="temporary" value="720"
                                                   @if($item->temporary == 720) checked @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="description">Описание</label>
                            <textarea name="description" id="description">{{ $item->description }}</textarea>
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-success" style="margin-top: 10px" type="submit">Изменить</button>
            </form>
        </div>
    </div>
@endsection
