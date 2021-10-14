<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Local;
use App\Models\Order;
use App\Models\PaymentGateway;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){
       $orders = PaymentGateway::selection()->orderBy('created_at')->get();
       $products =  Product::selection()->paginate(10);
       $local =  Local::selection()->get();
       return view('admin.dashboard',compact('orders','products','local'));
   }
   public function save(){
       $admin = new App\Models\Admin();
       $admin -> name = "Ziad Abo Alkamar";
       $admin -> email = "Ziadaboalkamar@gmail.com";
       $admin -> password = bcrypt("123456");
       $admin -> save();

   }
}


