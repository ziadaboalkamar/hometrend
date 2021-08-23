@extends('layouts.site')
@section('title','Favorite')
@section('content')

    <div class="Saved-product">
        <div class="title-saved title text-center">
            <h2>Favorite</h2>
        </div>
        <div class="container">
            @include('admin.includes.alerts.success')
            @include('admin.includes.alerts.errors')
        </div>
        <div class="lovely-product">
            <div class="row">
                @foreach($favorites as $favorite)
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-lg-12 product-item">
                            <a href="#">
                                <div class="img-product text-right" style="background-image: url('{{$favorite->product->photo}}');"><span class="icon ion-ios-heart text-right"></span></div>
                                <p class="discription-item">{{$favorite->product->name}}</p>
                                <p class="text-right mony-item">{{$favorite->product->price}}$</p>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary remove-to-basket text-center"><a href="{{route('Favorite.delete',$favorite->id)}}">Add to Basket</a> </button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
