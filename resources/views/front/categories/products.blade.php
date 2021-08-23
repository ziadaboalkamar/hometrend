@extends('layouts.site')
@section('title', $categories->name)
@section('content')
    <div class="category-product">
        <div class="title-saved title text-center">
            <h2>{{$categories -> name}}</h2>
        </div>
    </div>
    <div class="container">
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')
    </div>
    <div class="category-product-items">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="row">
                    <div class="col-lg-12 product-item product-item-cat">

                            <div class="img-product text-right" style="background-image: url('{{$product -> photo}}');">
                                <h2 class="love-product text-lg-center"><a href="{{route('Favorite.add',$product->id)}}"><i class="far fa-heart"></i></a></h2>
                            </div>
                        <a href="{{route('category.product.page' , $product->id)}}">
                            <p class="discription-item">{{$product->name}}</p>
                            <p class="text-right mony-item">{{$product->price}}$</p>
                        </a>
                            <div class="color-picker  text-md-left text-sm-center">
                                <span class="btn vue-green btn-type-radius" data-bg-color="#42b883" data-color="#35495e">&nbsp;<i class="fa fa-line"></i></span>
                                <span class="btn fb-blue btn-type-radius" data-bg-color="#3b5998" data-color="#8b9dc3">&nbsp;<i class="fa fa-line"></i></span>
                                <span class="btn tw-blue btn-type-radius" data-bg-color="#0084b4" data-color="#00aced">&nbsp;<i class="fa fa-line"></i></span>
                            </div>

                    </div>
                </div>
            </div>
            @endforeach
    </div>
    </div>
@endsection
