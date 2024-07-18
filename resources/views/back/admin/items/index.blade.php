@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <a href="{{ route('admin-items-add') }}" class="btn btn-success">Добавить</a>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td>Название и изображение</td>
                    <td style="width: 40%">Описание</td>
                    <td>Id</td>
                    <td>Кол-во</td>
                    <td>Действия</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr class="message-unread">
                            @php $img = explode('||',$item->img) @endphp
                            <td>{{ $item->name }} @if($item->closed_sale == 1) <br><span style="color:red">
                                    Закрыто для покупки </span>@endif
                                <br>
                                <img src="{{ asset("front/img/shop") }}/{{ $img[0] }}" alt="{{ $item->name }}">
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->item_game_id }}</td>
                            <td>{{ $item->count }}</td>
                            <td>
                                <a href="{{ route('admin-items-edit',$item->id) }}" class="btn btn-success">Редактировать</a>
                                <a href="{{ route('admin-items-delete',$item->id) }}" onclick="return confirm('Точно удалить этот предмет из магазина?')" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($items->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $items->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$items->lastPage()+1;$i++)
                        <li @if($i == $items->currentPage())class="active"@endif><a href="{{ route('admin-items-index')."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $items->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
        </div>
    </div>
@endsection
