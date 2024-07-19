@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <form method="post" action="{{ route('admin-items-add') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Название</label>
                        <input id="name" name="name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="item_game_id">Id предмета</label>
                        <input id="item_game_id" name="item_game_id" type="number" class="form-control">
                    </div>
                    <div class="col-md-6">
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
                                        <input class="form-check-input" type="radio" name="type" value="Оружие">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        Броня
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="type" value="Броня">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        Аксесуар
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="type" value="Аксесуар">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        Расходник
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="type" value="Расходник">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        Сундук
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="type" value="Сундук">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        Квестовый предмет
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="type" value="Квестовый предмет">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        Ресурс
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="type" value="Ресурс">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        Материалы для создания
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="type" value="Материалы для создания">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="recipe_id">Id рецепта для создания</label>
                        <input id="recipe_id" name="recipe_number" type="number" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="fallout_id">Id списка выпадающих предметов</label>
                        <input id="fallout_id" name="fallout_number" type="number" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="specifications_id">Id характеристик</label>
                        <input id="specifications_id" name="specifications_id" type="number" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="game_price">Игровая цена</label>
                        <input id="game_price" name="game_price" type="number" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        Не временный предмет
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        1 час
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        3 часа
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        5 часов
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        10 часов
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="10">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        1 день
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="24">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        3 дня
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="72">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        7 дней
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="168">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        30 дней
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-check-input" type="radio" name="temporary" value="720">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="description">Описание</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                </div>
                <button class="btn btn-success" style="margin-top: 10px" type="submit">Добавить</button>
            </form>
        </div>
    </div>
@endsection
