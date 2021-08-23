@extends('layouts.admin')

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
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>Dollar</h4>
                                            <h6 class="text-muted">Dollar</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$9,980</h4>
                                            <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>Denar</h4>
                                            <h6 class="text-muted">Denar</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$944</h4>
                                            <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>Shakel</h4>
                                            <h6 class="text-muted">Balance</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$1.2</h4>
                                            <h6 class="danger">20% <i class="la la-arrow-down"></i></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
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
