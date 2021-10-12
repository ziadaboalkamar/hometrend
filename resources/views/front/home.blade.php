@extends('layouts.site')
@section('title', 'Home')
@section('content')
<!-- start ads img -->
<div class="ads-img">
    <div class="row">
        <div class="col-lg-12">
            <img src="{{asset('assets/img/Group 304.png')}}" alt="">
        </div>
    </div>
</div>
<!-- end ads img -->


<!-- start Categories -->
<div class="category-home">
    <div class="category-title text-center">
        <h2 >Categories</h2>
    </div>

    <!-- start img  -->
    <div class="shuffel-images">
        <div class="row">
            <div class="col-lg-12 col-xl col-sm word-inner text-center">
                <div><a href="category.html"><h4>Chair <br> <span>Shop Sale</span></h4> </a></div>
                <div class="overlay"></div>
                <img class="website" src="{{asset('assets/img/pexels-maria-gloss-4197693.jpg')}}" alt="">
            </div>
            <div class=" col-lg-12 col-xl col-sm word-inner text-center">
                <div><h4>living room <br> <span>Shop Sale</span></h4> </div>
                <div class="overlay"></div>
                <img class="website" src="{{asset('assets/img/pexels-houzlook-com-3797991.jpg')}}" alt="">
            </div>
            <div class=" col-lg-12 col-xl col-sm word-inner text-center">
                <div><h4>Sofas<br> <span>Shop Sale</span></h4> </div>
                <div class="overlay"></div>
                <img  class="marketing" src="{{asset('assets/img/pexels-charlotte-may-5825567.jpg')}}" alt="">
            </div>
            <div class="col-lg-12 col-xl  col-sm word-inner text-center">
                <div><h4>Bed room <br> <span>Shop Sale</span></h4> </div>
                <div class="overlay"></div>
                <img  class="graphic" src="{{asset('assets/img/pexels-max-vakhtbovych-6492390.jpg')}}" alt="">
            </div>

        </div>
        <div class="row ">

            <div class="col-lg-12 col-xl  col-sm word-inner text-center">
                <div><h4>Garden<br> <span>Shop Sale</span></h4> </div>
                <div class="overlay"></div>
                <img class="logo" src="{{asset('assets/img/pexels-daria-shevtsova-709784.jpg')}}" alt="">
            </div>
            <div class=" col-lg-12 col-xl col-sm word-inner text-center">
                <div><h4>Tables<br> <span>Shop Sale</span></h4> </div>
                <div class="overlay"></div>
                <img class="video" src="{{asset('assets/img/mid-century-dining-table-chairs-set-by-umberto-mascagni-1950s-set-of-5-1.jpg')}}" alt="">
            </div>
            <div class="col-lg-12 col-xl col-sm word-inner text-center">
                <div><h4>Accessories <br> <span>Shop Sale</span></h4> </div>
                <div class="overlay"></div>
                <img class="website" src="{{asset('assets/img/pexels-rachel-claire-4857780.jpg')}}" alt="">
            </div>
            <div class="col-lg-12 col-xl col-sm word-inner text-center">
                <div><h4>Lighting <br> <span>Shop Sale</span></h4> </div>
                <div class="overlay"></div>
                <img class="logo" src="{{asset('assets/img/The-Top-Interior-Lighting-Design-Trends-Of-2019.jpg')}}" alt="">
            </div>


        </div>
    </div>




    <!-- end img -->
</div>

<!-- end Categories -->


<!-- start New Arrival -->

<div class="New-Arrival">
    <div class="title text-center">
        <h2 class="title-home-swipre" >New Arrival</h2>
    </div>

    <div class="owl-carousel owl-theme">
        @foreach($products as $product)
        <div class="item">
            <div class="row">
                <div class="col-lg-12 slider-item">
                    <a href="{{route('category.product.page',$product->id)}}">
                        <img src="{{$product->photo}}" alt="">
                        <p class="discription-item">{{$product->name}}</p>
                        <p class="text-right mony-item">{{$product->price}}$</p></a>

                </div>
            </div>
        </div>
        @endforeach





    </div>
</div>


<!-- end New Arrival -->


<!-- start trending -->

<div class="Trending">
    <div class="title text-center">
        <h2 class="title-home-swipre">Trinding</h2>
    </div>

    <div class="owl-carousel owl-theme">
        @foreach($trending as $trend)
            <div class="item">
                <div class="row">
                    <div class="col-lg-12 slider-item">
                        <a href="{{route('category.product.page',$trend->id)}}">
                            <img src="{{$trend->photo}}" alt="">
                            <p class="discription-item">{{$trend->name}}</p>
                            <p class="text-right mony-item">{{$trend->price}}$</p></a>

                    </div>
                </div>
            </div>
        @endforeach





    </div>
</div>
<!-- end trending -->
@endsection
