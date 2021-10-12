@extends('layouts.site')
@section('title', 'About us')

@section('content')
    <div class="about-us">
        <!-- start ads img -->
        <div class="ads-img">
            <div class="row">
                <div class="col-lg-12 about_us_padding">
                    <img src="assets/img/about_us.png" alt="">
                </div>
            </div>
        </div>
        <!-- end ads img -->
        <div class="container">
            <div class="row about_us_paragraph">
                <div class="col-md-6">
                    <img src="assets/img/Group 342.png" width="100%" alt="">
                </div>
                <div class="col-md-6">
                    <div class="middle">
                        <h1 class="about_us_title">About Us</h1>
                        <p class="about_us_description">“This company did a great to accomplish everything we needed done.
                            They were able to bring in all the craftsmen necessary to complete t-
                            he entire job”</p>
                        <div class="row">
                            <div class="timeline-box padd-15">
                                <div class="timeline shadow-dark">
                                    <!-- time line item -->
                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h4 class="timeline-title">Great Design perfetion  </h4>
                                        <p class="timeline-text">“This company did a great to accomplish everything we needed done.
                                            They were able to bring in all the craftsmen necessary to complete t-
                                            he entire job”</p>
                                    </div>
                                    <!-- item line item end -->
                                    <!-- time line item -->
                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h4 class="timeline-title">Great Design perfetion  </h4>
                                        <p class="timeline-text">“This company did a great to accomplish everything we needed done.
                                            They were able to bring in all the craftsmen necessary to complete t-
                                            he entire job”
                                        </p>
                                    </div>
                                    <!-- item line item end -->

                                </div>
                            </div>
                        </div>
                        <button class="see_more"><a href="">See more</a></button>
                    </div>
                </div>
            </div>
            <div class="row about_us_paragraph" dir="rtl">
                <div class="col-md-7">
                    <img src="assets/img/Group 343.png" width="100%" alt="">
                </div>
                <div class="col-md-5">
                    <div class="provide">
                        <h2 class="provide_title">We Provide Professional
                            Design For you</h2>
                        <p class="provide_paragraph">
                            “This company did a great to accomplish everything we needed done.
                            They were able to bring in all the craftsmen necessary to complete t-
                            he entire job”
                        </p>
                        <div class="row provide_number" dir="ltr">
                            <div class="col-md-4 text-center">
                                <span>10</span> <br>
                                <p>   Year
                                    Experience</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <span>15</span> <br>
                                <p>     Award
                                    Achievement</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <span>20</span> <br>
                                <p>   Project
                                    Complete</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-team">

            <div
                style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                class="swiper mySwiper"
            >
                <div
                    class="parallax-bg"
                    style="
          background-image: url('assets/img/Group\ 344.png');
        "
                    data-swiper-parallax="-23%"
                ></div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row" style="width: 100%;padding-top: 100px;">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{asset('assets/img/A3BFVksOtFwWo66OTjzAU3IgdUlhcVtAsU76fMDm.jpg')}}" class="rounded-circle" width="100px" height="100px" alt="">

                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="team-name">Ziad Abo Alkamar </h4>
                                            <p class="team-job">Full Stack Developer</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="team-description">I am a Technology Disputes Associate in the Litigation
                                                team at White & Case. I have advised leading tech co
                                                mpanies on privacy, copyright and electoral ad disputes.</p></div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{asset('assets/img/pp.jfif')}}" class="rounded-circle" width="100px" height="100px" alt="">

                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="team-name">Basel Muhaisen </h4>
                                            <p class="team-job">Back End Developer</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="team-description">I am a Technology Disputes Associate in the Litigation
                                                team at White & Case. I have advised leading tech co
                                                mpanies on privacy, copyright and electoral ad disputes.</p></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row" style="width: 100%;padding-top: 100px;">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{asset('assets/img/WhatsApp Image 2021-08-24 at 10.36.56 PM.jpeg')}}" class="rounded-circle" width="100px" height="100px" alt="">

                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="team-name">Mohammed Almadani </h4>
                                            <p class="team-job">Flutter Developer</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="team-description">I am a Technology Disputes Associate in the Litigation
                                                team at White & Case. I have advised leading tech co
                                                mpanies on privacy, copyright and electoral ad disputes.</p></div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="assets/img/avatar_male.png" class="rounded-circle" width="100px" height="100px" alt="">

                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="team-name">Neda Ahmed </h4>
                                            <p class="team-job">Analysis</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="team-description">I am a Technology Disputes Associate in the Litigation
                                                team at White & Case. I have advised leading tech co
                                                mpanies on privacy, copyright and electoral ad disputes.</p></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row" style="width: 100%;padding-top: 100px;">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="assets/img/avatar_male.png" class="rounded-circle" width="100px" height="100px" alt="">

                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="team-name">Abeer</h4>
                                            <p class="team-job">Designer</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="team-description">I am a Technology Disputes Associate in the Litigation
                                                team at White & Case. I have advised leading tech co
                                                mpanies on privacy, copyright and electoral ad disputes.</p></div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="assets/img/avatar_male.png" class="rounded-circle" width="100px" height="100px" alt="">

                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="team-name">Saja Radwan </h4>
                                            <p class="team-job">Designer</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="team-description">I am a Technology Disputes Associate in the Litigation
                                                team at White & Case. I have advised leading tech co
                                                mpanies on privacy, copyright and electoral ad disputes.</p></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/site/css/about.css')}}">
@endsection
@section('script')
    <script>
        var swiper = new Swiper(".mySwiper", {
            speed: 600,
            parallax: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
