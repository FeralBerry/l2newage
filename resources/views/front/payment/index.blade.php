@extends('front.layouts.layout')
@section('content')
    <div class="container" style="padding-top: 200px">
        <form action="{{ route('payment-create') }}" method="post">
            @csrf
            <input type="number" name="amount">
        </form>
    </div>
@endsection
