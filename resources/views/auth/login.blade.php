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
                <div class="row contact-icon">
                    <div class="col-md-12 text-center dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30 text-center">Or use Social Sign IN</div>
                    <div class="col-md-6 icon-social-media text-md-right text-sm-center">
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 112.196 112.196" style="enable-background:new 0 0 112.196 112.196;" xml:space="preserve" width="52px">
<g>
    <circle style="fill:#3B5998;" cx="56.098" cy="56.098" r="56.098"/>
    <path style="fill:#FFFFFF;" d="M70.201,58.294h-10.01v36.672H45.025V58.294h-7.213V45.406h7.213v-8.34
		c0-5.964,2.833-15.303,15.301-15.303L71.56,21.81v12.51h-8.151c-1.337,0-3.217,0.668-3.217,3.513v7.585h11.334L70.201,58.294z"/>
</g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
</svg>

                    </div>
                    <div class="col-md-6  icon-social-media ">
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="52px">
<rect x="64" y="64" style="fill:#ECEFF1;" width="384" height="384"/>
                            <polygon style="fill:#CFD8DC;" points="256,296.384 448,448 448,148.672 "/>
                            <path style="fill:#F44336;" d="M464,64h-16L256,215.616L64,64H48C21.504,64,0,85.504,0,112v288c0,26.496,21.504,48,48,48h16V148.672
	l192,147.68L448,148.64V448h16c26.496,0,48-21.504,48-48V112C512,85.504,490.496,64,464,64z"/>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
</svg>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
