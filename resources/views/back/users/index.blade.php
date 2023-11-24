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
                    <a href="#tab-all" aria-controls="tab-all" role="tab" data-toggle="tab" aria-expanded="true">Главная</a>
                </li>
                <li role="presentation">
                    <a href="#tab-highfive" aria-controls="tab-highfive" role="tab" data-toggle="tab" aria-expanded="true">HighFive</a>
                </li>
                <li role="presentation">
                    <a href="#tab-item" aria-controls="tab-item" role="tab" data-toggle="tab" aria-expanded="true">Аккаунты</a>
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
                    <div role="tabpanel" class="tab-pane active" id="tab-all">
                        <div class="col-sm-offset-2 col-sm-10">
                        <h3>Создание игрового аккаунта.</h3>
                        <p>Все игровые аккаунты будут привязаны к 1 аккаунту на сайте.</p>
                        <p>Аккаунты к разным серверам могут быть одинаковыми.</p>
                        </div>
                        <div class="youplay-matches-list">
                            <form>
                                @csrf
                                <div class="form-horizontal mt-30 mb-40">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="cur_password">Логин:</label>
                                        <div class="col-sm-10">
                                            <div class="youplay-input">
                                                <input class="input-en" type="text" id="login" name="login" placeholder="Логин:">
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
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5">
                                            <div class="youplay-radio">
                                                <input type="radio" id="higtfive" name="server" checked value="1">
                                                <label for="higtfive">Сервер HighFive</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="youplay-radio">
                                                <input type="radio" id="fafurion" name="server" value="2">
                                                <label for="fafurion">Сервер Fafurion</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <p>Нажав создать вы соглашаетесь с <a href="{{ route('site-rules-index') }}">правилами сайта</a> и <a href="{{ route('game-rules-index') }}">правилами игры</a></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a id="reg_account" class="btn btn-default">Создать</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-highfive">
                        <div class="youplay-matches-list">
                            <div class="col-lg-9">
                                <table class="youplay-messages table table-hover">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Изображение</td>
                                        <td class="message-description">Название и описание</td>
                                        <td>Действия</td>
                                    </tr>
                                    </thead>
                                    <tbody id="items_highfive">
                                    @php $i = 0; @endphp
                                    @foreach($paid_item as $item)
                                        @if($item->type == NULL || $item->type == 1)
                                            @php $i++; @endphp
                                        <tr class="message-unread" id="item_highfive{{$item->id}}">
                                            <td>{{ $i }}</td>
                                            <td class="message-from">
                                                <a href="#" class="angled-img">
                                                    <div class="img">
                                                        @if($item->img !== NULL)
                                                            <img src="{{ asset('front/img/item') }}/{{ $item->img }}" width="80" height="80" alt="">
                                                        @else
                                                            <img src="assets/images/avatar-user-1.png" width="80" height="80" alt="">
                                                        @endif
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="message-description">
                                                <a href="#" class="message-description-name" title="View Message">{{ $item->name }}</a>
                                                <br>
                                                <div class="message-excerpt">{{ $item->description }}</div>
                                                <div id="count_h{{$item->id}}" class="message-excerpt">Количество: {{ $item->count }}</div>
                                            </td>
                                            <td class="message-action">
                                                <div class="number">
                                                    <button class="number-minus" type="button" onclick="return minus_h({{$item->id}})">-</button>
                                                    <input id="num_h{{$item->id}}" type="number" readonly>
                                                    <button class="number-plus" type="button" onclick="return plus_h({{$item->id}})">+</button>
                                                </div>
                                                <a onclick="return character_highfive({{$item->id}},1)" style="margin-top: 10px" class="btn btn-sm">Перевести</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3">
                                <h4>Персонажи</h4>
                                @if(isset($highfive) && $highfive !== NULL)
                                    @php $i = 0; @endphp
                                    @foreach($highfive as $item)
                                        <div class="youplay-radio">
                                            <input type="radio" id="{{ $item->obj_Id }}" name="char_h" @if($i == 0) checked @endif value="{{ $item->obj_Id }}">
                                            <label for="{{ $item->obj_Id }}">{{ $item->char_name }}</label>
                                        </div>
                                        @php $i++ @endphp
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-item">
                        <div class="youplay-matches-list">
                            <div class="col-md-6">
                                <h3>Аккаунты Highfive</h3>
                                <table class="youplay-messages table table-hover">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Логин</td>
                                        <td class="message-description">Персонаж</td>
                                        <td>Онлайн</td>
                                    </tr>
                                    </thead>
                                    <tbody id="items_highfive">
                                    @php $i = 1; @endphp
                                    @foreach($account_hf as $account)
                                        @foreach($highfive_char as $char)
                                            @if($account->login == $char->account_name)
                                                <tr class="message-unread">
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                        {{ $account->login }}
                                                    </td>
                                                    <td>
                                                        {{ $char->char_name }}
                                                    </td>
                                                    <td>
                                                        @if($char->online == 1)<span style="color:greenyellow">online</span>@else<span style="color: red">offline</span>@endif
                                                    </td>
                                                </tr>
                                            @php $i++; @endphp
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
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
                    <a href="{{ config('global.client_high_five') }}">Полный клиент HighFive</a><br>
                    <a href="{{ config('global.patch_high_five') }}">Патч для игры HighFive</a><br>
                    <a href="{{ config('global.client_fafurion') }}">Полный клиент Fafurion</a><br>
                    <a href="{{ config('global.patch_fafurion') }}">Патч для игры Fafurion</a><br>
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
