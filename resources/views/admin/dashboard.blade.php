@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{App\User::count()}}</h3>
                                            <span>New Clients</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-user success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card bg-info crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-white media-body text-left rounded-left">
                                        <h5 class="text-white">New Designer</h5>
                                        <h5 class="text-white text-bold-400 mb-0">{{App\Models\Designer::count()}}</h5>
                                    </div>
                                    <div class="p-2 text-center rounded-right">
                                        <i class="icon-user font-large-2 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-success bg-darken-2 rounded-left">
                                        <i class="icon-basket-loaded font-large-2 text-white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-success text-white media-body rounded-right">
                                        <h5 class="text-white">New Orders</h5>
                                        <h5 class="text-white text-bold-400 mb-0">{{App\Models\Order::count()}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Products</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">Total Products available: {{App\Models\Product::count()}}</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table
                                        class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th> المنتج</th>
                                            <th>صورة المنتج</th>
                                            <th>السعر</th>
                                            <th>القسم الرئيسي</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($products)
                                            @foreach($products as $product)

                                                <tr>
                                                    <td>{{$product -> name}}</td>
                                                    <td><img width="100px" height="100px" src="{{$product -> photo}}"></td>

                                                    <td>{{$product -> price}} $</td>

                                                    <td>{{$product ->category ->name}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('admin.product.edit',$product->id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <a href="{{route('admin.product.delete',$product->id)}}"
                                                               class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                            <a href="{{route('admin.product.unactive' , $product->id)}}"
                                                               class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">الغاء تفعيل</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endisset

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="card" style="height: auto">
                            <div class="card-header">
                                <h4 class="card-title">Local Manufactures</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">Total Local Manufactures available: {{App\Models\Local::count()}}</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table
                                        class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th> المنتج</th>
                                            <th>صورة القسم</th>
                                            <th>التفاصيل</th>
                                            <th>اللون</th>
                                            <th>رقم الجوال</th>
                                            <th>طول</th>
                                            <th>العرض</th>
                                            <th>نوع الخشب</th>
                                            <th>المستخدم</th>

                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($local)
                                            @foreach($local as $product)

                                                <tr>
                                                    <td>{{$product -> name}}</td>
                                                    <td><img width="100px" height="100px" src="{{$product -> photo}}"></td>
                                                    <td>{{$product -> details}}</td>
                                                    <td>{{$product -> color}}</td>
                                                    <td>{{$product -> phone}}</td>
                                                    <td>{{$product -> length}}</td>
                                                    <td>{{$product -> width}}</td>
                                                    <td>{{$product -> wood}}</td>
                                                    <td>{{$product -> user -> name}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('admin.local.delete',$product->id)}}"
                                                               class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                            <a href="{{route('admin.local.gallery',$product->id)}}"
                                                               class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">اظهار باقي الصور</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endisset

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
                <!-- Active Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Active Order</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <td>
                                        <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i> Cancel all</button>
                                    </td>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table
                                        class="table display nowrap table-striped table-bordered  scroll-horizontal">
                                        <thead>
                                        <tr>
                                            <th> المنتج</th>
                                            <th>صورة المنتج</th>
                                            <th>مجموع السعر</th>
                                            <th> الى</th>
                                            <th> طريقة الدفع</th>
                                            <th>العنوان</th>
                                            <th>الهاتف</th>

                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($orders)
                                            @foreach($orders as $order)

                                                <tr>
                                                    <td>{{$order -> item[0]->name}}</td>
                                                    <td><img width="100px" height="100px" src="{{$order -> item[0] -> photo}}"></td>
                                                    <td>{{$order -> total}}$</td>
                                                    <td>{{$order -> name}} </td>
                                                    <td>{{$order ->payment_method}}</td>
                                                    <td>{{$order -> address}} </td>
                                                    <td>{{$order -> phone}} </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">

                                                            <a href="{{route('admin.order.delete',$order->id)}}"
                                                               class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endisset

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->
            </div>
        </div>
    </div>
@endsection
