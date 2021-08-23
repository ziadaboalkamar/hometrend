@extends('layouts.site')
@section('title', 'Contact')
@section('content')
    <div class="contact-us row-2-pd-30-product ">
        <div class="bg-contact100" style="background-image: url('{{asset('assets/img/bg-01.jpg') }}');">
            <div class="container-contact100">
                <div class="wrap-contact100">
                    <div class="contact100-pic js-tilt" data-tilt>
                        <img src="{{asset('assets/img/img-01.png')}}" alt="IMG">
                    </div>

                    <form class="contact100-form validate-form" action="{{ route('send.email') }}" method="POST">
                        @csrf
                        <div>
                        <span class="contact100-form-title">
                            Contact Form
                        </span>

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                                @endif
                            </div>
                        <div class="wrap-input100 validate-input" data-validate = "Name is required">
                            <input class="input100" type="text" name="name" placeholder="Name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                                <div class="wrap-input100 validate-input" data-validate = "Subject is required">
                                    <input class="input100" type="text" name="subject" placeholder="subject">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                                                </span>
                                    @error('subject')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "Message is required">
                            <textarea class="input100" name="content" placeholder="Message"></textarea>
                            <span class="focus-input100"></span>
                            @error('content')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="container-contact100-form-btn">
                            <button class="contact100-form-btn">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/site/vendor/tilt/tilt.jquery.min.js')}}"></script>

    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
@endsection
