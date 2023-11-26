@extends('front.layouts.layout')
@section('content')
    <!-- Main Content -->
    <div class="container" style="padding-top: 50px">
        <div class="row">
            <div class="col-md-12">
                @if($rules->id == 2)
                    {{ $rules->description }}
                @endif
            </div>
        </div>
    </div>
    <!-- Main Content -->
@endsection
