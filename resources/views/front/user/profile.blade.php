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
                                    <p class="text-muted font-size-sm">
                                        @if($user->address == null) type address @else {{$user->address}}@endif
                                        </p>
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
                <div class="col-md-8">
                    @include('admin.includes.alerts.success')
                    @include('admin.includes.alerts.errors')
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  {{$user->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    @if($user->phone == null) type number @else {{$user->phone}}"@endif
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    @if($user->address == null) type address @else {{$user->address}}@endif

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank" href="{{route('user.edit.profile',$user->id)}}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>

                <div class="col-md-12">
                    @include('admin.includes.alerts.success')
                    @include('admin.includes.alerts.errors')
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table table-responsive-md table-responsive-sm">
                                <thead>
                                <tr>
                                    <th scope="col">photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">For</th>
                                    <th scope="col">Pay Method</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <th scope="row">
                                        <img src="{{$order->item[0]->photo}}" alt="" width="100px" height="100px">
                                    </th>
                                    <td>{{$order->item[0]->name}}</td>
                                    <td>{{$order->total}}$</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->payment_method}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>





                </div>
            </div>

        </div>
    </div>
    </div>
    <style>
        th,td{
            font-family:Sitka Small;
            text-decoration: none;
            color: #244748;
            font-size: 16px;
        }
    </style>
@endsection
