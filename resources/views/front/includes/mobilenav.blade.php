<!-- start nav mobile -->
<div class="mobile-menu">
    <div class="menu-navbar">
        <nav class="mobile-navbar row">
            <div class="col-md-4 col-sm-4  mobile-bars text-center">

                <div onclick="toggleSidebar()">
                    <i class="fa fa-bars"></i>

                </div>

                <div id="sidebar">
                    <div class="upper-nav">
                        <div class="container">

                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <div onclick="toggleSidebar()">
                                        <svg  width="100pt" height="100pt" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m50 10c-22.109 0-40 17.883-40 40 0 22.109 17.891 40 40 40 22.117 0 40-17.891 40-40 0-22.121-17.879-40-40-40zm-15.25 23c0.074219-0.003906 0.14453-0.003906 0.21875 0 0.53906-0.003906 1.0586 0.20703 1.4375 0.59375l13.594 13.562 13.562-13.562c0.36328-0.37109 0.85547-0.58203 1.375-0.59375 0.82812-0.035156 1.5938 0.44922 1.918 1.2109 0.32812 0.76562 0.14844 1.6484-0.44922 2.2266l-13.594 13.594 13.594 13.562c0.37891 0.375 0.58984 0.88672 0.58984 1.4219 0 0.53125-0.21094 1.043-0.58984 1.4219-0.375 0.375-0.88672 0.58984-1.4219 0.58984s-1.043-0.21484-1.4219-0.58984l-13.562-13.594-13.594 13.594c-0.78516 0.78516-2.0586 0.78516-2.8438 0s-0.78516-2.0586 0-2.8438l13.562-13.562-13.562-13.594c-0.56641-0.54297-0.76562-1.3633-0.50781-2.1016 0.25391-0.73828 0.91797-1.2617 1.6953-1.3359z" fill-rule="evenodd"></path>
                                        </svg>

                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <img src="{{asset('assets/img/avatar_male.png')}}" class="rounded-circle user-pic " alt="">
                                    <button class="tasgel-login"><a href="{{route('user.show.profile')}}"> login</a> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <ul class="content text-left" dir="ltr">
                            <li class="active"><a href="{{route('home')}}" class="active">Shop</a></li>
                            <li class="active"><a href="{{route('designer.search')}}" class="">Prof</a></li>
                            <li class="active"><a href="{{route('user.about.us')}}" class="">About</a></li>
                        </ul>
                        @php
                            $categories=App\Models\Category::selection()->get();
                        @endphp

                        <ul class="shop-content">
                            @isset($categories)
                                @foreach($categories as $category)
                                    @if($category -> name == 'Local Manufacture')
                                        <li><a href="{{route('local.show')}}">{{$category -> name}}</a> </li>

                                    @else
                                        <li><a href="{{route('category.show.product',$category->id)}}">{{$category -> name}}</a> </li>
                                    @endif
                                @endforeach
                            @endisset

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-4 text-center mobile-logo"><a href=""><h2>Home Trend</h2></a></div>
            <div class="col-md-4  col-sm-4 text-center mobile-icon ">
                <ul class="">
                    <li><a href="{{route('Favorite.show')}}"> <i class="fa fa-heart"></i></a></li>
                    <li> <a href="{{route('cart')}}"><i class="fa fa-shopping-cart">
                                <span class="span-cart-number">
                                    @auth
                                    {{Cart::session(auth()->id())->getContent()->count()}}
                                    @else
                                        0
                                    @endauth


                                </span></i></a></li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12 col-sm-12 search-box">
                <form action="{{route('user.search')}}" method="GET">
                    @csrf
                <div class="search"><i class="fa fa-search"></i><input name="search" type="search" placeholder="Search for product"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end nav mobile -->
