@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <a href="{{ route('admin-tags-add') }}" class="btn btn-success">Добавить</a>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td>Логин</td>
                    <td>Емаил</td>
                    <td>Имя персонажа</td>
                    <td>Уровень</td>
                    <td>ИДперсонажа</td>
                    <td>ПВП и ПК</td>
                    <td>Действия</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $item)
                        <tr class="message-unread">
                            <td>{{ $item->login }}</td>
                            <td>{{ $item->email }}</td>
                            <td><span @if($item->accessLevel == 100)style="color:red"@endif>{{ $item->char_name }}</span>@if($char->online == 1)<sup><span class="badge bg-success" style="color:#2BD964;padding: 0;font-size: 9px">1</span></sup>@else<sup><span class="badge bg-default" style="color:#d92b4c;padding: 0;font-size: 9px">1</span></sup>@endif</td>
                            <td>{{ $item->level }}</td>
                            <td>{{ $item->charId }}</td>
                            <td>ПВП:{{ $item->pvpkills }} ПК:{{ $item->pkkills }}</td>
                            <td>
                                <a href="{{ route('admin-character-index',$item->charId) }}" class="btn btn-success">Редактировтаь</a>
                                <a href="{{ route('admin-character-delete',$item->charId) }}" onclick="return confirm('Точно удалить этого персонажа?')" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($accounts->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $accounts->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$accounts->lastPage()+1;$i++)
                        <li @if($i == $accounts->currentPage())class="active"@endif><a href="{{ route('admin-accounts-index')."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $accounts->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
        </div>
    </div>
@endsection
