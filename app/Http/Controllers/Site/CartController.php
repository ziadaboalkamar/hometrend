<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Services\FatooraService;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentGateway;
use App\Models\PayMethod;
use App\Models\Product;
use App\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $fatoorahService;
    private  $email;
    public function __construct(FatooraService $fatoorahService )
    {
        $this->fatoorahService = $fatoorahService;
    }


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

//          $order_id =Order::insertGetId([
//          'name' => $request->name,
//          'address' => $request->address,
//          'phone' => $request->mobile,
//          'user_id' => auth()->id(),
//          'total' => \Cart::session(auth()->id())->getTotal(),
//          'item_count' =>  $cartItems,
          $user_email = User::select('email')->where('id', '=' , auth()->id())->get();
//          return array_values($user_email)[0];

          foreach ($user_email as $emails){
            $this->email  = $emails ;
          }
          $total = \Cart::session(auth()->id())->getTotal();
          $cartproduct = \Cart::session(auth() ->id())->getContent();
          $item_price = [];
          foreach ($cartproduct as $item) {
              $invoiceItems[] = [
                  'ItemId' => $item->id,
                  'ItemName' => $item->name, //ISBAN, or SKU
                  'Quantity' => $item -> quantity, //Item's quantity
                  'UnitPrice' =>  $item->price, //Price per item
              ];


          }


$order = [
        "CustomerName" => $request->name,
        "NotificationOption" => "Lnk",
        "MobileCountryCode" => "970",
        "CustomerMobile" => "$request->mobile",
        "CustomerEmail" => $this->email['email'],
        "InvoiceValue" => $total,
        "DisplayCurrencyIso" => "kwd",
        "CallBackUrl" => env('success_url'),
        "ErrorUrl" => env('error_url'),
        "Language" => "en",
        "InvoiceItems" => $invoiceItems,

];

   //   ]);

//      $cartproduct = \Cart::session(auth() ->id())->getContent();
//      foreach ($cartproduct as $item){
//          $items_id =   OrderItem::insertGetId([
//             'order_id' =>  $order_id,
//             'product_id' => $item->id,
//             'price' => $item->price,
//             'quantity' => \Cart::session(auth() ->id())->getTotalQuantity()
//            ]);

      }

    \Cart::session(auth()->id())->clear();

         $paymentData=$this->fatoorahService->sendPayment($order);
        $payment_Url =   $paymentData['Data']['InvoiceURL'];
        return redirect($payment_Url) ;

    }
    public function paymentCallback(Request $request)
    {
        $data = [];
        $data['key'] = $request->paymentId;
        $data['keyType'] = 'paymentId';
       $paymentData = $this->fatoorahService->getPaymentStatus($data);
       $product_item =  $paymentData['Data']['InvoiceItems'];

        $InvoiceTransactions = $paymentData['Data']['InvoiceTransactions'];
        $trans = '';
        $id = Auth::user()->id;
        foreach ($InvoiceTransactions as $transaction) {
            $trans = $transaction;
        }

        $payment = PaymentGateway::insertGetId([
            'costumer_name' => $paymentData['Data']['CustomerName'],
            'coustumer_email' => $paymentData['Data']['CustomerEmail'],
            'coustomer_phone' => $paymentData['Data']['CustomerMobile'],
            'payment_gateway' => $trans['PaymentGateway'],
            'payments_id' => $trans['PaymentId'],
            'status' => $trans['TransactionStatus'],
            'value' => $trans['PaidCurrencyValue'],
            'cuurency' => $trans['PaidCurrency'],
            'card_no' => $trans['CardNumber'],
            'expire_date' => $paymentData['Data']['ExpiryDate'],
            'expire_time' => $paymentData['Data']['ExpiryTime'],
            'user_id' => $id,


        ]);

        foreach ($product_item as $item){
            $product_id =  Product::select('id')->where('name' , '=' ,$item['ItemName'] )->get();

            foreach ($product_id as $id){





            $items_id =   OrderItem::insertGetId([
                'order_id' =>  $payment,
                'product_id' => $id['id'],
                'price' => $item['UnitPrice'],
                'quantity' => $item['Quantity']
            ]);
        }

        }
        return redirect()->route('cart')->with(['success' => 'Order Completed,Thank you for order']);

        //  return    $payment_Url =   $paymentData['Data']['CreatedDate'];
        //search where invoice id = $paymentData['Data']['InvoiceId']

    }

}
