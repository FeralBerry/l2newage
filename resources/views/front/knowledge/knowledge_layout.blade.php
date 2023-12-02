@extends("front.layouts.layout")
@section("content")
    @include('front.knowledge.menu_knowledge')
    @yield('knowledge_content')
@endsection
