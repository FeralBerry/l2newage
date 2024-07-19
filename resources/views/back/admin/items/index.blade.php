@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <a href="{{ route('admin-items-add') }}" class="btn btn-success">Добавить</a>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td>Название и изображение и тип предмета, является ли временным</td>
                    <td style="width: 40%">Описание</td>
                    <td>Игровой id / цена</td>
                    <td>Наличие / Отсутствие (рецепта, выпадающих предметов)</td>
                    <td>Характеристики</td>
                    <td>Действия</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr class="message-unread">
                            @php $img = explode('||',$item->img) @endphp
                            <td>
                                {{ $item->name }}
                                <br>
                                <img src="{{ asset("front/img/item") }}/{{ $item->type }}/{{ $img[0] }}" alt="{{ $item->name }}">
                                <br>
                                {{ $item->type }}
                                <br>
                                @if($item->temporary == null)
                                    Не является временным предметом
                                @else
                                    {{ $item->temporary }}
                                @endif
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->item_game_id }} / {{ $item->game_price }}</td>
                            <td>
                                @if($item->recipe_number !== null)
                                    Есть рецепт с id {{ $item->recipe_number }}
                                @else
                                    Отсутствует рецепт
                                @endif
                                 /
                                @if($item->fallout_number !== null)
                                    Есть выпадающие предметы с id {{ $item->fallout_number }}
                                @else
                                    Отсутствуют выпадающие предметы
                                @endif
                            </td>
                            <td>
                                @if($item->specifications_id !== null)
                                    <a href="{{ route('admin-item-characteristic-index',$item->specifications_id) }}">Есть характеристики у предмета id {{ $item->specifications_id }}</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin-items-edit',$item->id) }}" class="btn btn-success">Редактировать</a>
                                <a href="{{ route('admin-items-delete',$item->id) }}" onclick="return confirm('Точно удалить этот предмет?')" class="btn btn-danger">Удалить</a>
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
