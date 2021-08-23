@extends('layouts.loginsite')
@section('title' , 'Sign in')
@section('content')
    <div class="limiter text-left">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url('{{asset('assets/img/pexels-houzlook-com-3356416.jpg')}}');"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                @include('admin.includes.alerts.success')
                @include('admin.includes.alerts.errors')
                <form class="login100-form validate-form login-form" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <span class="login100-form-title p-b-59">
						{{ __('Reset Password') }}
					</span>
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <span class="label-input100">Email</span>
                        <input class="input100 input-login-form @error('email') is-invalid @enderror" type="email" id="email"  name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email addess...">
                        <span class="focus-input100"></span>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input id="password" type="password"  name="password"  class="input100 input-login-form  @error('password') is-invalid @enderror"  required autocomplete="new-password" placeholder="*************">
                        <span class="focus-input100"></span>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <span class="label-input100">{{ __('Confirm Password') }}</span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                    </div>





                    <div class="container-login100-form-btn login-form-button">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                {{ __('Reset Password') }}
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
