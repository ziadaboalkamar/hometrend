@extends('layouts.site')
@section('title', $product->name)
@section('content')
    <!-- start product page -->
    <div class="container">
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')
    </div>

    <div class="product-page">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div
                        style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper-container mySwiper2"
                    >
                        <div class="swiper-wrapper">
                            @foreach($images as $item)
                            <div class="swiper-slide">
                                <img src="{{URL::to($item)}}" />
                            </div>
                            @endforeach



                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($images as $item)
                                <div class="swiper-slide">
                                    <img src="{{URL::to($item)}}" />
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="product-title">
                        <div class="title-saved title text-left product-title-pd-23">
                            <h2 class="product-title-font-size-sm">{{$product->name}}</h2>
                        </div>
                        <p class="discription-product">{{$product->description}}</p>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="saer-product">{{$product->price}}$</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h2 class="avilable-product"><i class="fa fa-check"></i> {{$product ->getStatus()}}</h2>
                            </div>
                        </div>

                        <div class="row row-2-pd-30-product">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="size-product">Size</h2>
                                <p class="size-number">{{$product->size}} cm</p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h2 class="color-product">Color</h2>
                                <h2 class="avilable-product"> <div class="color-picker  text-md-left ">
                                        <span class="btn vue-green btn-type-radius" data-bg-color="#42b883" data-color="#35495e">&nbsp;<i class="fa fa-line"></i></span>
                                        <span class="btn fb-blue btn-type-radius" data-bg-color="#3b5998" data-color="#8b9dc3">&nbsp;<i class="fa fa-line"></i></span>
                                        <span class="btn tw-blue btn-type-radius" data-bg-color="#0084b4" data-color="#00aced">&nbsp;<i class="fa fa-line"></i></span>
                                    </div></h2>
                            </div>
                        </div>
                        <div class="row row-2-pd-30-product">
                            <div class="col-md-6 col-sm-12">
                                <div class="text-center">
                                    <a href="{{route('cart.add',$product->id)}}"><button type="submit" class="btn btn-primary add-to-bag text-center">Add To Bag</button></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h2 class="love-product text-lg-center"><a href="{{route('Favorite.add',$product->id)}}"><i class="far fa-heart"></i></a></h2>
                            </div>
                        </div>
                        <div class="row  row-2-pd-5-product">
                            <div class="col-md-12 details-product">
                                <h4>Details</h4>
                                <p>material:polyester</p>
                                <p>size: {{$product->size}} cm</p>
                                <h4>Rating :</h4>
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row row-2-pd-30-product">
                <div class="col-md-4">
                    <h2 class="coustomer-review">
                        Customer Reviews
                    </h2>
                </div>
                <div class="col-md-8">
                    <ul class=" row customer-rating">
                        <li class="col-md-1 col-sm-3 number-of-rate">4.7</li>
                        <li class="col-md-4 col-sm-6">
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            </fieldset><br>
                            <p class="number-of-review">{{$comments->count()}} review</p>
                        </li>
                    </ul>
                </div>
            </div>
            @foreach($comments as $comment)
            <div class="row row-2-pd-30-product">
                <div class="col-md-4 comment-about-product">
                    <div class="">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 avatar-col">
                                <div class="user-img">
                                    <img src="{{$comment->user->photo}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 name-col">
                                <h4 class="name-of-user">{{$comment->user->name}}</h4>
                                <div class="rating-stars">
                                    <i class="fa fa-star star-on"></i>
                                    <i class="fa fa-star star-on"></i>
                                    <i class="fa fa-star star-on"></i>
                                    <i class="fa fa-star star-on"></i>
                                    <i class="fa fa-star star-on"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <p class="comment">{{$comment->message}}</p>
                </div>
            </div>
            @endforeach
            <form action="{{route('comment.add',$product->id)}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->id()}}">
            <div class="row row-2-pd-30-product">
                <div class="col-md-7">
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Add A New Comment"></textarea>
                    </div>
                </div>
                <div class="col-md-4 comment-button">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary add-a-comment text-center"><i class="fa fa-plus"></i>  Add A Comment</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- end product page -->
@endsection
