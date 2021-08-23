@extends('layouts.prof')
@section('title', 'Find Designer')
@section('content')
    <!-- start prof profile -->
    @include('admin.includes.alerts.success')
    @include('admin.includes.alerts.errors')

    <!-- start find prof -->

    <div class="find-prof">
        <div class="background-img-search" style="background-image: url('{{asset('assets/img/find-prof.jpg')}}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 details-interior text-center">
                        <h3>Find the right pro for your project</h3>
                        <form action="{{route('designer.find.page')}}"  method="GET">
                            @csrf
                            <div class="search-prof">

                                <input type="search" name="find" placeholder="What service do you need?"> <i class="fa fa-search" ></i>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="prof-card-cat row-2-pd-30-product row-pd-btm-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Home Design & Remodeling</h3>
                    </div>
                </div>
                <div class="row ow-2-pd-30-product row-pd-btm-30 ">
                    @isset($categories)
                    @foreach($categories as $category)
                    <div class="col-lg-3 col-md-6 col-sm-12 text-sm-center row-pd-btm-30">
                        <div class="card" style="width: 14rem;">
                            <a href="{{route('designer.list')}}">
                                <img class="card-img-top" src="{{$category->photo}}" height="200px" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text text-center ">{{$category->name}} </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>

            </div>
        </div>
    </div>
    <!-- end find prof -->
@endsection
