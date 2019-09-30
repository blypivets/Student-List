@extends('layouts.app')

@section('component_css')

    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
        
    <div class="content flex-center flex-column fill-height  col-md-9">
        <div class="title m-b-md">
            {{ config('app.name', 'Laravel') }}
        </div>
        @guest
        <a id='signInButton' href="{{ route('login') }}" class="btn btn-lg btn-outline-primary ">Sign in</a>
        @else
        <h1 class="h1">Welcome</h1>
        @endguest
    </div>
@endsection