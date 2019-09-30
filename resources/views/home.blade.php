@extends('layouts.app')

@section('component_js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
@endsection

@section('component_css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container content col-md-9">
    <div class="card col p-0 text-center">
        <div class="card-header">
            <h2 class="h2 mb-0">{{__('List of students')}}</h2>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div id="userInfoBlock">
                @include('partials.student_table') 
            </div>         
        </div>
    </div>
</div>
@include('partials.student_add')
@include('partials.student_edit')
@include('partials.student_remove')
@endsection
