@extends('front.layouts.layout')
@section('content')
<!-- Banner -->
<div class="youplay-banner youplay-banner-parallax banner-top small">
    <div class="image" style="background-image: url({{ asset('front/img/bg/users.jpg') }});">
    </div>
    <div class="youplay-user-navigation">
        <div class="container" role="tabpanel">
            <ul class="nav nav-tabs mt-50" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab-reg" aria-controls="tab-all" role="tab" data-toggle="tab" aria-expanded="true">Главная</a>
                </li>
                <li role="presentation">
                    <a href="#tab-accounts" aria-controls="tab-accounts" role="tab" data-toggle="tab" aria-expanded="true">Аккаунты</a>
                </li>
                <li role="presentation">
                    <a href="#tab-settings" aria-controls="tab-settings" role="tab" data-toggle="tab" aria-expanded="true">Настройки</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="info">
        <div>
            <div class="container">
                <h1>Кабинет пользователя: {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Banner -->
<div class="container youplay-content">
    <div class="row">
        <div class="col-md-9">
            <div role="tabpanel">
                <div class="tab-content">
                    <!-- All Matches -->
                    <div role="tabpanel" class="tab-pane active" id="tab-reg">
                        @if(Auth::user()->email_verified_at !== NULL)
                        <div class="col-sm-offset-2 col-sm-10">
                        <h3>Создание игрового аккаунта.</h3>
                        <p>Все игровые аккаунты будут привязаны к 1 аккаунту на сайте.</p>
                        <p>Создавать дополнительные аккаунты на сайте не обязательно.
                            На 1 аккаунте на сайте можно зарегистрировать много аккаунтов игровых.</p>
                        </div>
                        <div class="youplay-matches-list">
                            <form method="post">
                                @csrf
                                <div class="form-horizontal mt-30 mb-40">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="cur_password">Логин:</label>
                                        <div class="col-sm-10">
                                            <div class="youplay-input">
                                                <input class="input-en" maxlength="29"  minlength="4" type="text" id="login" name="login" placeholder="Логин:">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="error_cur_password"></div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="new_password">Пароль:</label>
                                        <div class="col-sm-10">
                                            <div class="youplay-input">
                                                <input class="input-en" type="password" id="pass" name="pass" placeholder="Пароль:">
                                                <a href="#" id="password_control" class="password-control" onclick="return show_hide_password(this);"><i class="fa fa-eye-slash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <p>Нажав создать вы соглашаетесь с <a href="{{ route('rules-index',1) }}">правилами сайта</a> и <a href="{{ route('rules-index',2) }}">правилами игры</a></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="button" id="reg_account" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                                Создать
                                            </button>
                                            <div class="modal fade" id="myModal" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                                        </div>
                                                        <div class="modal-body" id="modal_ger_body">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else
                            <div class="col-sm-offset-2 col-sm-10">
                                <p>Для получения возможности создавать игровые аккаунты, нужно пройти проверку почты из письма,
                                    высланного на адрес указаный при регистрации.</p>
                                <p>Создавать дополнительные аккаунты на сайте не обязательно.
                                    На 1 аккаунте на сайте можно зарегистрировать много аккаунтов игровых.</p>
                            </div>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-accounts">
                        <div class="youplay-matches-list">
                            <div class="col-md-6">
                                <h3>Персонажи</h3>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class='modal fade' id='newPasswordModal' style='display: none'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                                    <h4 class='modal-title' id='newPasswordLabel'></h4>
                                                </div>
                                                <div class='modal-body' id='newPasswordBody'>

                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($accounts as $account)
                                    <a onclick="accountEdit('{{ $account->login }}')" data-toggle='modal' data-target='#newPasswordModal' style="position: absolute;z-index: 100;"><i class="fa fa-pencil"></i></a>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{ $account->login }}">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $account->login }}" aria-expanded="false" aria-controls="collapse{{ $account->login }}" class="collapsed">
                                                    {{ $account->login }} <span class="icon-plus"></span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{ $account->login }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $account->login }}" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <div class="row">
                                                    @foreach($chars as $char)
                                                    <div class="col-md-9">
                                                        {{ $char->char_name }}@if($char->online == 1)<sup><span class="badge bg-success" style="color:#2BD964;padding: 0;font-size: 9px">1</span></sup>@else<sup><span class="badge bg-default" style="color:#d92b4c;padding: 0;font-size: 9px">1</span></sup>@endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input class="form-check-input char" type="radio" name="char" value="{{ $char->char_name }}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Предметы</h3>
                                <div class="row">
                                @foreach($paid_item as $item)
                                    <div class="form-group">
                                        <div class="youplay-checkbox">
                                            <input class="item" type="checkbox" id="{{ $item->id }}" name="item[]" value="{{ $item->id }}">
                                            <label for="{{ $item->id }}">{{ $item->name }}</label>
                                            <input class="form-check-input" style="width: 50px" type="number" name="count" min="1" max="{{ $item->count }}" id="item_count{{ $item->id }}" value="{{ $item->count }}">
                                            <br>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                <a class="btn btn-default" id="move_character">Перевести на персонажа</a>
                            </div>
                        </div>
                    </div>
                    <!-- /All Matches -->
                    <!-- CS Matches -->
                    <div role="tabpanel" class="tab-pane" id="tab-settings">
                        <form>
                            @csrf
                            <div class="form-horizontal mt-30 mb-40">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="cur_password">Текущий пароль:</label>
                                    <div class="col-sm-10">
                                        <div class="youplay-input">
                                            <input type="text" id="cur_password" name="cur_password" placeholder="Текущий пароль:">
                                        </div>
                                    </div>
                                </div>
                                <div id="error_cur_password"></div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="new_password">Новый пароль:</label>
                                    <div class="col-sm-10">
                                        <div class="youplay-input">
                                            <input type="password" id="new_password" name="new_password" placeholder="Новый пароль:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a id="new_password_button" class="btn btn-default">Изменить</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form>
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="phone">Номер телефона:</label>
                                <div class="col-sm-10">
                                    <div class="youplay-input">
                                        <input type="tel" id="phone" name="phone" placeholder="Номер телефона:" value="{{ Auth::user()->tel }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal mt-30 mb-40">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a id="tel" class="btn btn-default">Изменить</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /CS Matches -->
                </div>
            </div>
{{--
            <ul class="pagination dib">
                <li class="active">
                    <span class='page-numbers current'>1</span>
                </li>
                <li>
                    <a href='#'>2</a>
                </li>
                <li>
                    <a href="#">Next</a>
                </li>
            </ul>--}}
        </div>
        <!-- Right Side -->
        <div class="col-md-3">
            <div class="side-block">
                <h4 class="block-title">Файлы игры</h4>
                <div class="block-content p-0">
                    <a href="{{ config('global.client_high_five') }}">Полный клиент</a><br>
                    <a href="{{ config('global.patch_high_five') }}">Патч для игры</a><br>
                </div>
            </div>
            <div class="side-block">
                <h4 class="block-title">Купленные товары</h4>
                <div class="block-content p-0">
                    <!-- Single News Block -->
                    @foreach($orders as $order)
                        @foreach($shop as $item)
                            @if($order->shop_id == $item->id)
                                <div class="row youplay-side-news">
                                    <div class="col-xs-3 col-md-4">
                                        <a href="{{ route('shop-product',$item->id) }}" class="angled-img">
                                            @if($item->img == NULL)
                                                <div class="img">
                                                    <img src="{{ asset('front/img/shop/no-img.png') }}" alt="">
                                                </div>
                                            @else
                                                @php
                                                    $img = explode('||',$item->img);
                                                @endphp
                                                <div class="img">
                                                    <img src="{{ asset('front/img/shop') }}/{{ $img[0] }}" alt="{{ $item->title }}">
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-xs-9 col-md-8">
                                        <h4 class="ellipsis"><a href="{{ route('shop-product',$item->id) }}" title="$item->title">{{$item->title}}</a></h4>
                                        @php $new_price = $item->price - ($item->price * $item->percent  / 100); @endphp
                                        <div class="price">&#8381;{{ $new_price }} <sup><del>&#8381;{{ $item->price }}</del></sup><span class="badge pull-right bg-warning">{{ $order->count }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    <!-- /Single News Block -->
                    </div>
                </div>
        </div>
        <!-- Right Side -->
    </div>
</div>
@endsection
