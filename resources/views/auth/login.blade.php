@extends('layouts.loginsite')
@section('title' , 'Sign in')
@section('content')
    <div class="limiter text-left">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url('{{asset('assets/img/pexels-houzlook-com-3356416.jpg')}}');"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                @include('admin.includes.alerts.success')
                @include('admin.includes.alerts.errors')
                <form class="login100-form validate-form login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-59">
						Sign in
					</span>


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <span class="label-input100">Email</span>
                        <input class="input100 input-login-form @error('email') is-invalid @enderror" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email addess...">
                        <span class="focus-input100"></span>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100 input-login-form @error('password') is-invalid @enderror" type="password"  name="password" required autocomplete="current-password" placeholder="*************">
                        <span class="focus-input100"></span>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group row">
                        <div class="col-md-12 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">


                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="container-login100-form-btn login-form-button">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Sign in
                            </button>
                        </div>

                        <a href="{{ route('register') }}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                            Sign Up
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                        </a>
                    </div>
                    <div class="interior">
                        <a href="{{route('designer.show.register')}}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30 text-center" dir="ltr">
                            if you are a <STROng>Interior Engineer</STROng> Sign Up
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
