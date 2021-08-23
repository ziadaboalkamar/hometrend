@extends('layouts.site')
@section('title', 'Cart')
@section('content')
<!-- start ads img -->
<div class="container">

    @include('admin.includes.alerts.success')
    @include('admin.includes.alerts.errors')
</div>

<div class="cart-page">
    <div class="title-saved title text-center">
        <h2>Cart</h2>
    </div>


    <div class="cart-tabel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-responsive-md table-responsive-sm">
                        <thead>
                        <tr class="header-tabel">
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col"></th>
                            <th scope="col">Discount</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        @foreach($cartItems as $item)

                        <tbody>
                        <tr>
                            <td style="    vertical-align: middle;">
                                <label class="checkbox-wrap checkbox-primary">
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>
                                <div class="img" style="background-image: url({{$item->associatedModel->photo}});"></div>
                            </td>
                            <td>
                                <div class="email">
                                    <span class="name-product-cart">{{$item -> name}}</span>
                                    <span><p>Color:camel </p><p>Size:100*100 cm</p></span>
                                </div>
                            </td>
                            <td>0.00%</td>
                            <td>${{$item -> price}}
                            </td>
                            <td class="quantity">
                                <form action="{{route('cart.update',$item->id)}}">
                                    <div class="input-group">
                                    <i class="fa fa-angle-left" id="minus" onclick="decrementValue()"></i>
                                        <input type="text" name="quantity" class="quantity form-control input-number text-center" id="number-of-product" value="{{$item -> quantity}}" min="1" max="100">
                                 <i class="fa fa-angle-right" id="plus" onclick="incrementValue()"></i>
                                    </div>
                                    <input type="submit" value="save">
                                </form>

                            </td>
                            <td>${{ \Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                            </td>
                            <td>

                                    <button type="button" class="close" >
                                        <span aria-hidden="true"> <a href="{{route('cart.destroy',$item->id)}}"><i class="fa fa-close"></i></a></span>
                                    </button>

                            </td>
                        </tr>

                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row row-2-pd-30-product row-pd-btm-30">
                <div class="col-md-4 caupon-discount">
                    <h3>Caupon Discount</h3>
                    <form action="">
                        <input type="text" placeholder="Enter your caupon if you have one.">
                        <div class="row-2-pd-30-product ">
                            <button type="submit" class="btn btn-primary add-a-caupon text-center">Apply Caupon</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 calculate-order">
                    <h3>Calculate order</h3>
                    <form action="{{route('cart.checkout')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Enter your Full Name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <input type="text" name="address" placeholder="Enter your Address">
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <input type="text" name="mobile" placeholder="Enter your Mobile">
                        @error('mobile')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="row-2-pd-30-product text-center ">
                            <div class="row-2-pd-30-product text-center ">
                                <button type="submit" class="btn btn-primary checkout text-center">Processed to checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 the-last-total">
                    <div class="box-total">
                        <ul>
                            <li class="sub-total-info ">SubTotal:</li>
                            <li class="result-of-total">${{ \Cart::session(auth()->id())->getTotal()}}</li>
                        </ul>
                        <ul>
                            <li class="sub-total-info ">Order:</li>
                            @foreach($cartItems as $item)
                            <li class="result-of-total d-block">{{$item->name}}</li>
                            @endforeach
                        </ul>
                        <ul>
                            <li class="sub-total-info ">SubTotal:</li>
                            <li class="result-of-total">${{ \Cart::session(auth()->id())->getTotal()}}</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-12 row-2-pd-30-product text-center row-pd-btm-30 ">
                    <button type="submit" class="btn btn-primary continue-shopping text-center"><a href="{{route('home')}}"><i class="fa fa-arrow-left"></i>           Continue Shopping</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- end Cart page -->


<!-- light box -->

<div class="popup-all">
    <div class="popup-content">
        <div class="popup-add-project text-center row-2-pd-30-product">
            <div class="container">
                <div class="lightbox-close text-right33">&times;</div>
                <div class="title-saved title text-center row-2-pd-30-product ">
                    <h2>Payment Method</h2>
                </div>
                <form action="{{route('cart.checkout')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddress">Number</label>
                        <input type="text" name="card-number" class="form-control" id="inputAddress" >
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Expire Date</label>
                            <input type="text" name="expire" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">CVV</label>
                            <input type="text" name="cvv" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Card Holder</label>
                        <input type="text" name="cardName" class="form-control" id="inputAddress" >
                    </div>

                    <button type="submit" class="btn btn-primary text-center">Pay by Credit Card</button><br>
                </form>
                    <form action="{{route('cart.checkout')}}" method="POST" >
                        @csrf
                        <input type="hidden" name="cash" value="cash">
                        <div id="header">
                            <h3 class="pay-or">OR</h3>
                        </div>
                        <button type="submit" class="btn btn-primary text-center">Pay Cash</button>
                    </form>

            </div>
        </div>
    </div>
</div>


<!-- light box end -->
@endsection
