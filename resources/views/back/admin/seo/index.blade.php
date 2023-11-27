@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-12 form-group">
                <form id="seo_form_add" method="post" action="{{ route('admin-seo-add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="route_name">Имя роутера</label>
                            <input id="route_name" name="route_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="title">Заголовок</label>
                            <input id="title" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="description">Описание</label>
                            <textarea id="description" name="description" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="keywords">Ключевые слова</label>
                            <textarea id="keywords" name="keywords" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <label for="img">Изображение</label>
                    <input type="file" id="img" name="img">
                    <button type="submit">Добавить</button>
                </form>
            </div>
            <table class="youplay-messages table table-hover">
                <thead>
                <tr>
                    <td style="width: 30%">Имя роутера и Заголовок</td>
                    <td style="width: 40%">Описание и Ключевые слова</td>
                    <td style="width: 15%">Изображение</td>
                    <td>Действия</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($seo as $item)
                        <tr class="message-unread">
                            <td>
                                <input id="route_name{{ $item->id }}" name="route_name" class="form-control" value="{{ $item->route_name }}">
                                <input style="margin-top: 10px" id="title{{ $item->id }}" name="title" class="form-control" value="{{ $item->title }}">
                            </td>
                            <td>
                                <div class="row">
                                    <textarea id="description{{ $item->id }}" name="description" rows="5" class="form-control">{{ $item->description }}</textarea>
                                </div>
                                <div class="row"  style="margin-top: 10px">
                                    <textarea id="keywords{{ $item->id }}" name="keywords" rows="5" class="form-control">{{ $item->keywords }}</textarea>
                                </div>
                            </td>
                            <td>
                                <img width="100px" src="{{ asset('back\seo\img') }}\{{ $item->img }}" alt="">
                                <input style="width:100px" type="file" id="img{{ $item->id }}" name="img">
                                <input style="width:100px" type="hidden" id="old_img{{ $item->id }}" name="img">
                            </td>
                            <td>
                                <a href="#" onclick="seoEdit({{ $item->id }})" class="btn btn-success">Редактировать</a>
                                <a href="#" onclick="seoDelete({{ $item->id }})" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($seo->hasPages())
                <ul class="pagination">
                    <li>
                        <a href="{{ $seo->previousPageUrl() }}">
                            Назад
                        </a>
                    </li>
                    @for($i=1;$i<$seo->lastPage()+1;$i++)
                        <li @if($i == $seo->currentPage())class="active"@endif><a href="{{ route('admin-seo-index')."?page=".$i }}"><span>{{ $i }}</span></a></li>
                    @endfor
                    <li><a href="{{ $seo->nextPageUrl() }}">Вперед</a></li>
                </ul>
            @endif
        </div>
    </div>
@endsection
