<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add( Product $product){
    //add to cart


        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'description'=> $product->description,
            'price' => $product->price,
            'quantity' => 1,
            'photo' =>  $product->photo,
            'attributes' => array(),
            'associatedModel' => $product
        ));

return redirect()->back()->with(['success' => 'The Product add to cart successfully']);
      //  return redirect()->route('cart');
    }

    public function index(){
      $cartItems =   \Cart::session(auth() ->id())->getContent();
        return view('front.cart.index',compact('cartItems'));
    }
    public function destroy($itemId){
          \Cart::session(auth()->id())->remove($itemId);
        return back()->with(['success' => 'The Product delete successfully']);;
    }
    public function update($rowId){
        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => [
                'relative' => false,
                'value' => request('quantity')
            ]
        ]);
        return back();
    }
    public function checkout(Request $request){

        $cartItems =   \Cart::session(auth() ->id())->getContent()->count();
      if ($cartItems == 0){
          return back()->with(['error' => ' you should add a product to checkout']);
      }else{
          $order_id =Order::insertGetId([
          'name' => $request->name,
          'address' => $request->address,
          'phone' => $request->mobile,
          'user_id' => auth()->id(),
          'total' => \Cart::session(auth()->id())->getTotal(),
          'item_count' =>  $cartItems
      ]);

      $cartproduct = \Cart::session(auth() ->id())->getContent();
      foreach ($cartproduct as $item){
          $items_id =   OrderItem::insertGetId([
             'order_id' =>  $order_id,
             'product_id' => $item->id,
             'price' => $item->price,
             'quantity' => \Cart::session(auth() ->id())->getTotalQuantity()
            ]);

      }

          \Cart::session(auth()->id())->clear();

          return view('front.cart.paymentmethod' ,compact('order_id'));
      }

    }
}
