<header  class="nav-bar">
    <div class="container-nav">
        <nav class="row">

            <ul class="nav-list">
                <li class="col-lg-1 logo-list">
                    <div class="logo">
                        <img src="{{asset('assets/img/logo.png')}}" width="137px" height="100px" alt="">
                    </div>
                </li>
                <li class="col-lg-8 list-pages">
                    <ul>
                        <li class="list-pages-1 "><a href="{{route('home')}}" class="active">Shop</a> </li>
                        <li class="list-pages-1"><a href="{{route('designer.search')}}">Find Professional</a> </li>
                        <li class="list-pages-1"><a href="{{route('user.about.us')}}">About</a> </li>

                        <li class="list-pages-4">
                            <form action="{{route('user.search')}}" method="GET">
                            <div><i class="fa fa-search"></i>

                                    @csrf
                                <input name="search" type="search" placeholder="Search for product">
                            </div>
                                </form>
                             </li>
                        
                    </ul>
                </li>
                <li class="col-lg-2 icon-list">
                    <ul>
                        <li><a href="{{route('user.show.profile')}}"> <i class="fa fa-user"></i></a></li>
                        <li><a href="{{route('Favorite.show')}}"> <i class="fa fa-heart"></i></a></li>
                        <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"><span class="span-cart-number">
                                        @auth
                                            {{Cart::session(auth()->id())->getContent()->count()}}
                                        @else
                                            0
                                        @endauth</span></i></a></li>
                    </ul>

                </li>

            </ul>
@php
    $categories=App\Models\Category::selection()->get();
@endphp
            <ul class="sub-list-navbar col-lg-12">
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
        </nav>
    </div>
</header>
