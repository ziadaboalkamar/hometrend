@extends('layouts.prof')
@section('title', 'Profile')
@section('content')
    <!-- start prof profile -->
    @include('admin.includes.alerts.success')
    @include('admin.includes.alerts.errors')
    <div class="prof-profile">
        <div class="row row-2-pd-30-product row-pd-btm-30">
            <div class="col-md-6 profile-discription-prof">
                <div class="row">
                    <div class="col-md-4 logo-prof text-center">
                        <img src="{{$user->photo}}" alt="logo page">
                    </div>
                    <div class="col-md-8">
                        <h4 class="name-of-user">{{$user->name}}</h4>
                        <div class="rating-stars">
                            <i class="fa fa-star star-on"></i>
                            <i class="fa fa-star star-on"></i>
                            <i class="fa fa-star star-on"></i>
                            <i class="fa fa-star star-on"></i>
                            <i class="fa fa-star star-on"></i>
                        </div>
                        <div class="discription-prof">
                            <h4 class="phone-prof"><i class="fa fa-phone"></i><span>{{$designer->phone}}</span></h4>
                            <h4 class="locate-prof"><i class="fa fa-map-marker-alt"></i><span>{{$designer->address}}</span></h4>
                            <h4 class="locate-prof"><i class="fas fa-user-graduate"></i><span>{{$designer->graduated}}</span></h4>
                            <h4 class="locate-prof"><i class="far fa-credit-card"></i><span>{{$designer->price_hour}} per hour</span></h4>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-6">
                <div class="social text-center">
                    <button type="submit" class="btn  whatsapp-button text-center"> <a href=""><i class="fab fa-whatsapp"></i> Whatsapp</a></button>
                    <button type="submit" class="btn  contact-button text-center"> <a href=""><i class="far fa-envelope"></i> Contact</a></button>
                    <button type="submit" class="btn  Share-button text-center"> <a href="{{$designer->website}}"><i class="fas fa-share-alt"></i> Website</a></button>
                    <button type="submit" class="btn  contact-button text-center"> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>
            </div>

        </div>

        <hr>

        <div class="row row-2-pd-30-product row-pd-btm-30">

                   <div class="col-md-12">
                       <div class="projects-title title-saved title text-center">
                           <h2>About Me</h2>
                       </div>
                           <p class="about-us-prof">
                             {{$designer->about_us}}
                           </p>





            </div>


        </div>
        <hr>
        <div class="projects-prof ">
            <div class="projects-title title-saved title text-center">
                <h2 >Projects</h2>
            </div>
            <div class="container text-center">
                <ul class="list-unstyed row">
                    <li data-class="all" class="active col-md"> All</li>

                        @foreach(json_decode($categories->category_prof_id) as $category)
                                <li data-class="all" class=" col-md"> {{get_category_designer($category)}}</li>
                    @endforeach



                </ul>
            </div>
            <div class="shuffel-images">
                <div class="container">
                    <div class="row ">
                        @foreach($projects as $project)
                        <div class="col-md-6 col-sm-12 text-center">
                            <div class="card" style="width: 80%;">

                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{$project->photo}}" alt="First slide">
                                        </div>
                                        @foreach(explode('|', $project->filename) as $img)
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{URL::to($img)}}" alt="Second slide">

                                            </div>
                                        @endforeach


                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <a href="">
                                    <div class="card-body text-left">
                                        <p class="card-text text-left">{{$project->name}} </p>
                                        <h4 class="locate-prof"><i class="fa fa-map-marker-alt"></i><span>{{$project->address}}</span></h4>

                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- pop up icon -->
        <div class="add-new-project text-center row-2-pd-30-product">
            <button type="submit" class="btn  add-project-button text-center" onclick="toggleLightbox()"><i class="fa fa-plus"></i> Add New Project</button>
        </div>
        <div class="comment-for-product container">
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
                            <p class="number-of-review">{{$commentsCount}} review</p>
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
                    <p class="comment"> {{$comment->message}}</p>
                </div>
            </div>
            @endforeach
            <form action="{{route('comment.add.designer',$user->id)}}" method="POST" >
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->id()}}">
            <div class="row row-2-pd-30-product">
                <div class="col-md-7">
                    <div class="form-group">
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add A New Comment"></textarea>
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
    <!-- end prof profile -->

    <!-- light box -->

    <div class="popup-all">
        <div class="popup-content">
            <div class="popup-add-project text-center row-2-pd-30-product">
                <div class="container">
                    <div class="lightbox-close text-right33">&times;</div>
                    <div class="title-saved title text-center row-2-pd-30-product ">
                        <h2>Upload Project</h2>
                    </div>
                    <form method="POST" action="{{route('designer.add.project')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Title</label>
                                <input name="title" type="text" class="form-control" id="inputEmail4">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Date</label>
                                <input name="date" type="date" class="form-control" id="inputPassword4">
                                @error('date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-left" style="padding-bottom: 30px">
                            <label for="inputAddress">Cover Photo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo"  id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                @error('photo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-left" style="padding-bottom: 30px">
                            <label for="inputAddress">Gallery Photo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image[]" multiple id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>






                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Add a Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary text-center">Add Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- light box end -->
@endsection
