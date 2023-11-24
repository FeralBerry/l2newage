@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-6 col-md-9">
                            <h4 class="ml-20"><i class="fa fa-user"></i> Пользователей</h4>
                        </div>
                        <div class="col-xs-6 col-md-3 align-right">
                            <div class="price">
                                @if(isset($count_users))
                                    {{ $count_users }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-users-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-6 col-md-9">
                            <h4 class="ml-20"><i class="fa fa-id-card-o"></i> Аккаунтов Highfive</h4>
                        </div>
                        <div class="col-xs-6 col-md-3 align-right">
                            <div class="price">
                                @if(isset($count_hf_accounts))
                                    {{ $count_hf_accounts }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-hf-accounts-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-6 col-md-9">
                            <h4 class="ml-20"><i class="fa fa-id-card-o"></i> Аккаунтов Fafurion</h4>
                        </div>
                        <div class="col-xs-6 col-md-3 align-right">
                            <div class="price">
                                @if(isset($count_fr_accounts))
                                    {{ $count_fr_accounts }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-fr-accounts-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-6 col-md-9">
                            <h4 class="ml-20"><i class="fa fa-user"></i> Ордеров</h4>
                        </div>
                        <div class="col-xs-6 col-md-3 align-right">
                            <div class="price">
                                @if(isset($count_orders))
                                    {{ $count_orders }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-orders-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-6 col-md-9">
                            <h4 class="ml-20"><i class="fa fa-id-card-o"></i> Вещей на продаже</h4>
                        </div>
                        <div class="col-xs-6 col-md-3 align-right">
                            <div class="price">
                                @if(isset($count_items))
                                    {{ $count_items }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-items-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-6 col-md-9">
                            <h4 class="ml-20"><i class="fa fa-id-card-o"></i> Вещей на аккаунтах</h4>
                        </div>
                        <div class="col-xs-6 col-md-3 align-right">
                            <div class="price">
                                @if(isset($count_paid_items))
                                    {{ $count_paid_items }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-paid-items-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-6 col-md-9">
                            <h4 class="ml-20"><i class="fa fa-id-card-o"></i> Новости</h4>
                        </div>
                        <div class="col-xs-6 col-md-3 align-right">
                            <div class="price">
                                @if(isset($count_news))
                                    {{ $count_news }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-news-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-6 col-md-9">
                            <h4 class="ml-20"><i class="fa fa-id-card-o"></i> Новостные теги</h4>
                        </div>
                        <div class="col-xs-6 col-md-3 align-right">
                            <div class="price">
                                @if(isset($count_tags))
                                    {{ $count_tags }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-tags-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item angled-bg" style="min-height: 100px">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h4 class="ml-20"><i class="fa fa-id-card-o"></i> Подарки</h4>
                        </div>
                        <div class="align-right">
                            <a href="{{ route('admin-gifts-index') }}" class="btn btn-xs" style="margin-right: 30px;margin-bottom: 10px">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
