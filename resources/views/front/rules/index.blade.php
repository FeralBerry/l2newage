@extends('front.layouts.layout')
@section('content')
    <!-- Main Content -->
    <div class="container" style="padding-top: 150px">
        <div class="row">
            <div class="col-md-12">
                {!! $rules->description !!}
            </div>
        </div>
    </div>
    <!-- Main Content -->
@endsection
