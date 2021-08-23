<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>




            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الرئيسيه </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Category::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.categories')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.categories.create')}}" data-i18n="nav.dash.crypto">أضافة
                            قسم جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام مهندسين  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\DesignerCategory::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.prof.categories')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.prof.categories.create')}}" data-i18n="nav.dash.crypto">أضافة
                            قسم جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.products')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل النتجات </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.product.create')}}" data-i18n="nav.dash.crypto">أضافة
                            منتج جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المستخدمين  </span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\User::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.users')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل المستحخدمين </a>
                    </li>

                </ul>
            </li>



            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المهندسين  </span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Designer::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.designers')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل المهندسين </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-wrench"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">التصنيع المحلي</span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Local::count()}}</span>

                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.local')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل المنتجات المطلوبة </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-wrench"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الطلبات</span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Order::count()}}</span>

                    <ul class="menu-content">
                        <li class="active"><a class="menu-item" href="{{route('admin.order')}}"
                                              data-i18n="nav.dash.ecommerce"> عرض كل الطلبات </a>
                        </li>

                    </ul>
            </li>
        </ul>
    </div>
</div>
