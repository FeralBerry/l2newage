@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            @if(isset($msg) && $msg !== '')
                {{ $msg }}
            @endif
            <form method="post" action="{{ route('admin-orders-search') }}">
                @csrf
                <div class="youplay-input">
                    <input type="text" name="search" placeholder="Название или часть">
                </div>
            </form>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td>Имя и емаил</td>
                    <td>Название купленого итема</td>
                    <td>Кол-во и Цена</td>
                    <td>Заказ№</td>
                    <td>Ид заказа</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                        <tr class="message-unread">
                            <td>
                                {{ $item->name }}<br>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->title }}
                            </td>
                            <td>
                                Кол-во: {{ $item->count }}<br>
                                Цена: {{ $item->amount }}
                            </td>
                            <td>
                                {{ $item->description }}
                            </td>
                            <td>
                                {{ $item->payment_id }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($orders->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $orders->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$orders->lastPage()+1;$i++)
                        <li @if($i == $orders->currentPage())class="active"@endif><a href="{{ route('admin-orders-index')."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $orders->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
        </div>
    </div>
@endsection
