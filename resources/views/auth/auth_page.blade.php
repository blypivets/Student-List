@extends('layouts.app')

@section('component_js')
    <script src="{{ asset('js/auth.js') }}" defer></script>
@endsection

@section('component_css')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container content col-md-9">

  <div class="container tabs-container text-center">
	    <ul class="nav nav-tabs nav-justified" role="tablist">
	      <li class="nav-item"><a class="nav-link {{$signin_active ?? ''}}" href="#signin" role="tab" data-toggle="tab">{{ __('Sign in') }}</a></li>
	      <li class="nav-item"><a class="nav-link {{$register_active ?? ''}}" href="#register" role="tab" data-toggle="tab">{{ __('Register') }}</a></li>
	    </ul>

	    <div class="tab-content">

	      <div class="tab-pane {{$signin_active ?? ''}} fade {{$signin_show ?? ''}}" id="signin" role="tabpanel">
		        <form class="form-sigin" action="{{ route('login') }}" method="post">
		        	@csrf

			        <h3 class="h3">Please sign in</h3>
			        <div class="input-group">
			            <label for="username" class="sr-only">{{ __('Username') }}</label>
			            <input type="text" id="username" name="username" class="form-control  @error('username') is-invalid @enderror" value="{{ old('username') }}" autocomplete="username" placeholder="Username" required autofocus>
			            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
			        </div>
			        <div class="input-group">
				        <label for="password" class="sr-only">{{ __('Password') }}</label>
				        <input type="password" id="password" name="password" class="form-control float-left @error('password') is-invalid @enderror" placeholder="Password" required>
				        <button class="btn float-right" id="view_button1" type="button">
				           	<i class="fas fa-eye"></i>
				        </button>
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
			        </div>
		            <div class="input-group">
		            	<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
		                <button type="submit" class="btn btn-lg btn-primary btn-block" >
		                	{{ __('Sign in') }}
		                </button>

		                @if (Route::has('password.request'))
		                    <a class="btn btn-link row" id="forgot-text" href="{{ route('password.request') }}">
		                        {{ __('Forgot Your Password?') }}
		                    </a>
		                @endif
		            </div>          
		        </form>
	        </div>

	        <div class="tab-pane {{$register_active ?? ''}} fade {{$register_show ?? ''}}" id="register" role="tabpanel">
		        <form class="form-sigin" action="{{ route('register') }}" method="post">
		        	@csrf
			        <h3 class="h3 mb-3">{{ __('Create an account')}}</h3>
			        <div class="input-group">
				        <label for="registerUsername" class="sr-only">{{ __('Username')}}</label>
				        <input type="text" id="registerUsername" name="registerUsername" class="form-control @error('registerUsername') is-invalid @enderror" placeholder="Username" required autofocus>

				        @error('registerUsername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
			          </div>
		          <div class="input-group">
			            <label for="registerEmail" class="sr-only">{{ __('E-Mail Address')}}</label>
			            <input type="email" id="registerEmail" class="form-control @error('registerEmail') is-invalid @enderror" name="registerEmail" value="{{ old('registerEmail') }}" required autocomplete="registerEmail" placeholder="E-Mail Address" required>

			            @error('registerEmail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		          </div>
		          <div class="input-group">
			            <label for="registerPassword" class="sr-only">{{ __('Password')}}</label>
			            <input type="password" id="registerPassword" name="registerPassword" class="form-control float-left @error('registerPassword') is-invalid @enderror" autocomplete="new-password" placeholder="Password" required>
			            <button class="btn float-right" id="view_button2" type="button">
			            	<i class="fas fa-eye"></i>
			            </button>

			            @error('registerPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		          </div>
		          <div class="input-group">
			            <label for="registerConfirmPassword" class="sr-only">{{ __('Confirm Password')}}</label>
			            <input type="password" id="registerConfirmPassword" name="registerConfirmPassword" class="form-control float-left" autocomplete="new-password" placeholder="Confirm Password" required>
			            <button class="btn float-right" id="view_button2" type="button">
			            	<i class="fas fa-eye"></i>
			            </button>
		          </div>
		          <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Register') }}</button>
		        </form>
	        </div>
	    </div>

	    <p class="text-muted">&copy; {{ now()->year }} {{ config('app.name', 'Laravel') }}</p>
    </div>
</div>
@endsection