@extends('layouts.registerprof')
@section('title', 'Designer Sign Up')
@section('content')
    <div class="interior-designer">
        <div class="row">
            <div class="col-lg-4 img-interior-col">
                <div class="img-interior" style="background-image: url('{{asset('assets/img/مهندس\ دسكور.jpg')}}');"></div>
            </div>
            <div class="col-lg-8">
                @include('admin.includes.alerts.success')
                @include('admin.includes.alerts.errors')
                <form method="POST" action="{{route('designer.store.register')}}"  enctype="multipart/form-data">
                    @csrf
                  <span class="interior-form-title ">
                    Sign Up
                  </span>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4"  placeholder="name@example.com">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Address</label>
                            <input type="text" name="address" class="form-control" id="inputAddress"  placeholder="1234 Main St">
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="*****************">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirm Password</label>
                            <input type="password" name="password_confirm" class="form-control"  id="inputPassword4" placeholder="*****************">
                            @error('password_confirm')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" name="name" class="form-control" id="inputEmail4">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="inputAddress"  placeholder="+972564821894">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">About Us</label>
                        <textarea class="form-control" name="about_us" id="exampleFormControlTextarea1" rows="3" placeholder="Write a Discription about you ..........."></textarea>
                        @error('about_us')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Website</label>
                            <input type="url" name="website" class="form-control" id="inputEmail4">
                            @error('website')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Price per Hour</label>
                            <input type="text" name="price" class="form-control" id="inputAddress"  placeholder="50$">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Graduated Frome</label>
                            <input type="text" name="graduated" class="form-control" id="inputEmail4">
                            @error('graduated')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput2"> Category </label>
                                <select name="category_id[]"  multiple="multiple" class="form-control js-example-basic-multiple" style="height: 50px">
                                        @if($categories && $categories -> count() > 0)
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category -> id }}">{{$category -> name}}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('category_id')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <label for="exampleFormControlFile1">logo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        @error('logo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <label for="exampleFormControlFile1">Cover Photo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="cover" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        @error('cover')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary freelance-submit text-center">Sign up</button>
                    </div>

                    <div class="return-login text-center">
                        <a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30 text-center" dir="ltr">
                            do you have an <STROng>account</STROng> Sign in
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
