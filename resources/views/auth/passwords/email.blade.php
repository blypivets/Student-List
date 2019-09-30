@extends('layouts.app')

@section('component_js')
    <script src="{{ asset('js/auth.js') }}" defer></script>
@endsection

@section('component_css')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container content col-md-9">
    <div class="card col-md-4 p-0">
        <div class="card-header">
            <span>{{ __('Reset Password') }}</span>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
             @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row justify-content-center">
                    <label for="email" class="col-md-4 col-form-label text-md-right sr-only">{{ __('E-Mail Address') }}</label>

                    <div class="col">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 justify-content-center">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>       
        </div>
    </div>
</div>
@endsection
