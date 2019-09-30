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
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row justify-content-center">
                    <label for="email" class="col-md-4 col-form-label text-md-right sr-only">{{ __('E-Mail Address') }}</label>

                    <div class="col">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="E-Mail Address" autofocus>

                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="password" class="col-md-4 col-form-label text-md-right sr-only">{{ __('Password') }}</label>

                    <div class="col">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row ">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right sr-only">{{ __('Confirm Password') }}</label>

                    <div class="col">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group row mb-0 justify-content-center">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button> 
                    </div>
                </div>
            </form>        
        </div>
    </div>
</div>
@endsection
