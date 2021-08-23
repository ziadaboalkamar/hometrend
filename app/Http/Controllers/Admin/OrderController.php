<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function index(){
       $orders = Order::selection()->orderBy('created_at')->get();
       return view('admin.order.index',compact('orders'));
   }
   public function destroy($id){
       try {
           $orders = Order::find($id);
           if (!$orders){
               return redirect()->route('admin.order' , $id)->with(["error" => "هذا المنتج غير موجودو"]);
           }
           $orders ->delete();



           return redirect()->route('admin.order')->with(["success" => "تم حذف المنتج بنجاح"]);
       }catch (\Exception $ex){
           return redirect()->route('admin.order')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

       }
   }

}
