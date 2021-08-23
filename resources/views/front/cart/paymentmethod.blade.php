@extends('layouts.site')
@section('title' , 'Payment')
@section('content')
    <div class="local-manufacture">
        <div class="title-saved title text-center row-2-pd-30-product">
            <h2>Payment Method</h2>
        </div>
        <div class="container">
<div class="payment-method">
                <form action="{{route('cart.checkout.payment')}}" method="POST">
                    @csrf
                    <input type="hidden" name="order" value="{{$order_id}}">
                    <input type="hidden" name="paypal" value="paypal">


                    <div class="form-group">
                        <label for="inputAddress">Number</label>
                        <input type="text" name="card_number" class="form-control" id="inputAddress" >
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Expire Date</label>
                            <input type="text" name="expire_date" class="form-control" id="inputEmail4">
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
<div class="text-center">
    <button type="submit" class="btn btn-primary text-center">Pay by Credit Card</button><br>

</div>
                </form>
                <form action="{{route('cart.checkout.payment')}}" method="POST" >
                    @csrf
                    <input type="hidden" name="order" value="{{$order_id}}">
                    <input type="hidden" name="cash" value="cash">
                    <div id="header">
                        <h3 class="pay-or">OR</h3>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary text-center">Pay Cash</button>

                    </div>
                </form>
</div>

        </div>
    </div>
@endsection
