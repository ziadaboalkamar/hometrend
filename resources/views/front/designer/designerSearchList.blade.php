@extends('layouts.prof')
@section('title', 'Find Designer')
@section('content')
    <!-- start prof profile -->
    <div class="container">
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')
    </div>
    <!-- start prof-list -->
    <div class="prof-list">
        <div class="container">
            @foreach($users as $user)

            <div class="row row-2-pd-30-product row-pd-btm-30">
                <div class="col-md-4">
                    <div class="prof-img-cover" style="background-image: url('{{$user->designer->photo}}');"></div>
                </div>
                <div class="col-md-5">
                    <div class="">
                        <a href="{{route('designer.show.page',$user->id)}}">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 avatar-col">
                                <div class="user-img">
                                    <img src="{{$user->photo}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 name-col">
                                <h4 class="name-of-user">{{$user->name}}</h4>
                                <div class="rating-stars">
                                    <i class="fa fa-star star-on"></i>
                                    <i class="fa fa-star star-on"></i>
                                    <i class="fa fa-star star-on"></i>
                                    <i class="fa fa-star star-on"></i>
                                    <i class="fa fa-star star-on"></i>
                                </div>
                            </div>

                        </div>
                        </a>
                    </div>
                    <div class="discription-prof">
                        <p>{{$user->designer->about_us}}</p>
                        <h4 class="phone-prof"><i class="fa fa-phone"></i><span>{{$user->designer->phone}}</span></h4>
                        <h4 class="locate-prof"><i class="fa fa-map-marker-alt"></i><span>{{$user->designer->address}}</span></h4>
                    </div>
                </div>
                <div class="col-md-3 sending-message-prof">
                    <div class="text-center div-dir">

                        <button type="submit" class="btn  remove-to-basket text-center"> <a href=""><i class="far fa-comment-alt"></i> Sendig Massege</a></button>
                        <h2 class="love-product text-lg-center"><i class="far fa-heart"></i></h2>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end prof list -->

@endsection
