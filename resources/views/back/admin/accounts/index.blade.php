@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <a href="{{ route('admin-tags-add') }}" class="btn btn-success">Добавить</a>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td style="width: 60%">Тег</td>
                    <td>Действия</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($tags as $item)
                        <tr class="message-unread">
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('admin-tags-edit',$item->id) }}" class="btn btn-success">Редактировать</a>
                                <a href="{{ route('admin-tags-delete',$item->id) }}" onclick="return confirm('Точно удалить данный тег в новостях и на форуме?')" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($tags->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $tags->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$tags->lastPage()+1;$i++)
                        <li @if($i == $tags->currentPage())class="active"@endif><a href="{{ route('admin-tags-index')."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $tags->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
        </div>
    </div>
@endsection
