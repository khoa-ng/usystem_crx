 
@extends('layouts.app-template')
@section("title", "Users")
@section('content')
<section class="content">
    <div class="container-fluid">
        {{--<div class="block-header">--}}
            {{--<h2>--}}
              {{--User Mangement--}}
            {{--</h2>--}}
        {{--</div> --}}
        @yield('action-content') 
    </div>
</section>
@endsection