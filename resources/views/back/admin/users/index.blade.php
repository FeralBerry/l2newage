@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <a href="{{ route('admin-users-add') }}" class="btn btn-success">Добавить</a>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td>Имя</td>
                    <td>Email</td>
                    <td>Действия</td>
                    <td>Имя</td>
                    <td>Email</td>
                    <td>Действия</td>
                </tr>
                </thead>
                <tbody id="items_highfive">
                    @php $i = 1; @endphp
                    @foreach($users as $item)
                        @if($i % 2 == 1)
                            <tr class="message-unread">
                        @endif
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td @if($i % 2 == 1)
                                        style="border-right: 3px solid #ffffff"
                                    @endif>
                                    <a href="{{ route('admin-users-edit',$item->id) }}" class="btn btn-success">Редактировать</a>
                                    <a href="{{ route('admin-users-delete',$item->id) }}" onclick="return confirm('Точно удальть данного пользователя?')" class="btn btn-danger">Удалить</a>
                                </td>
                        @if($i % 2 == 0)
                            </tr>
                        @endif
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            @if($users->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $users->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$users->lastPage()+1;$i++)
                        <li @if($i == $users->currentPage())class="active"@endif><a href="{{ route('admin-users-index')."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $users->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
        </div>
    </div>
@endsection
