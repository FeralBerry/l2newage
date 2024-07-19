@extends('back.layouts.layout')
@section('content')
    <div class="container youplay-content" style="margin-top: 100px">
        <div class="row">
            <form method="post" action="{{ route('admin-item-characteristic-edit',$id) }}">
                @csrf
                @foreach($specifications as $item)
                    <div class="row">
                        <div class="col-md-6">
                            <label for="p_atk">Физ атаки</label>
                            <input id="p_atk" name="p_atk" type="number" class="form-control" value="{{ $item->p_atk }}">
                        </div>
                        <div class="col-md-6">
                            <label for="p_def">Физ защиты</label>
                            <input id="p_def" name="p_def" type="number" class="form-control" value="{{ $item->p_def }}">
                        </div>
                        <div class="col-md-6">
                            <label for="m_atk">Маг атаки</label>
                            <input id="m_atk" name="m_atk" type="number" class="form-control" value="{{ $item->m_atk }}">
                        </div>
                        <div class="col-md-6">
                            <label for="m_def">Маг защиты</label>
                            <input id="m_def" name="m_def" type="number" class="form-control" value="{{ $item->m_def }}">
                        </div>
                        <div class="col-md-6">
                            <label for="weight">Вес</label>
                            <input id="weight" name="weight" type="number" class="form-control" value="{{ $item->weight }}">
                        </div>
                        <div class="col-md-6">
                            <label for="ss">Использование зарядов физ</label>
                            <input id="ss" name="ss" type="number" class="form-control" value="{{ $item->ss }}">
                        </div>
                        <div class="col-md-6">
                            <label for="bss">Использование зарядов маг</label>
                            <input id="bss" name="bss" type="number" class="form-control" value="{{ $item->bss }}">
                        </div>
                        <div class="col-md-6">
                            <label for="quest">Является квестовым итемом 1/ не является 0</label>
                            <input id="quest" name="quest" type="number" class="form-control" value="{{ $item->quest }}">
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-success" style="margin-top: 10px" type="submit">Изменить</button>
            </form>
        </div>
    </div>
@endsection
