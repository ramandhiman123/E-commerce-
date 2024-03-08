<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Address;

// use App\Http\Requests\StripePayment;

class StripeController extends Controller
{
  public function stripe()
  {
    return view('payment');
  }
  /** 

   * success response method.
     *
   * @return \Illuminate\Http\Response

   */
  public function stripePost(Request $request, Address $address)
  {
    // echo "<pre>";
    // print_r($request);
    // die;
    // $validate = $stripepayment->validated();
    $validated = $address->validated();
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    \Stripe\Charge::create([

      "amount" => Session::get('ammount') * 60,

      "currency" => "usd",

      "source" => $request->stripeToken,
      "description" => "Test payment from tutsmake.com."

    ]);


    $address = new UserAddress;
    $address->user_id = Auth::user()->id;
    $address->fullname = $validated['fullname'];
    $address->phoneNo = $validated['number'];
    $address->pincode = $validated['pincode'];
    $address->houseNo = $validated['houseNo'];
    $address->city = $validated['city'];
    $address->state = $validated['state'];
    $address->save();

    $addressdetails = new Order;
    $addressdetails->user_id = Auth::user()->id;
    $addressdetails->total_bill = Session::get('ammount');
    $addressdetails->address_id = $address->id;
    $addressdetails->status = 'processing';
    $addressdetails->save();

    if ($addressdetails->save()) {
      $deletecart = Carts::where('user_id', Auth::user()->id)->get();
      foreach ($deletecart as $delete) {
        $product = Product::find($delete->product_id);
        $ordersItem = new OrderItem;
        $ordersItem->product_id = $delete->product_id;
        $ordersItem->quantity = $delete->quantity;
        $ordersItem->price = $product->product_price;
        $ordersItem->order_id = $addressdetails->id;
        $ordersItem->save();
        $delete->delete();
      }
    }

    Session::flash('success', 'Payment successful!');

    return redirect()->route('welcome')->with('success', 'Payment successful!');

  }

}

