@extends('layouts.site')
@section('title', 'Profile')
@section('content')
    <div class="profile_style" style=" background-color: #e2e8f0;
        padding-top: 45px;
        padding-bottom: 45px;">
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img   @if($user->photo == null) src="https://bootdey.com/img/Content/avatar/avatar7.png" @else src="{{$user->photo}}" @endif style="border: 4px solid #184040;" alt="{{$user->name}}" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$user->name}}</h4>
                                    <p class="text-muted font-size-sm">type address</p>
                                    <button style="    background: #184040;border: #184040;" class="btn btn-primary">
                                        <a style="color: white;" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </button>
                                    <button class="btn btn-outline-primary"><a href="{{route('Favorite.show')}}">Favorite</a></button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    @include('admin.includes.alerts.success')
                    @include('admin.includes.alerts.errors')
                    <form action="{{route('user.update.profile',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control"@if($user->name == null) value="John Doe" @else value = "{{$user->name}}"@endif >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" class="form-control" @if($user->email == null) value="john@example.com" @else value = "{{$user->email}}"@endif >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone" class="form-control" @if($user->phone == null) value="(239) 816-9029" @else value = "{{$user->phone}}"@endif >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address" class="form-control" @if($user->address == null) value="Bay Area, San Francisco, CA" @else value = "{{$user->address}}"@endif>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Photo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="button">
                                    <button class="btn btn-primary px-4">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
