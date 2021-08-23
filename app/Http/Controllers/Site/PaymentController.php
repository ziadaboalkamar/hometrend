<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PayMethod;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        return view('front.cart.paymentmethod');
    }
    public function store(Request $request){

       if ($request->has('cash')){
PayMethod::create([
    'order_id' => $request->order,
    'paymethod'=>$request->cash
]);
       }else{
           PayMethod::create([
               'order_id' => $request->order,
               'paymethod'=>$request->paypal,
               'card_number'=>$request->card_number,
               'expire_date'=>$request->expire_date,
               'cvv'=>$request->cvv,
               'card_holder' => $request->cardName

           ]);

       }
        return redirect()->route('cart')->with(['success' => 'Order Completed,Thank you for order']);

    }
}
