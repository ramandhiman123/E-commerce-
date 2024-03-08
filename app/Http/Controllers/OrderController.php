<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

use App\Models\User;

class OrderController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:all-orders'], ['only' => 'allorders']);
  }
  
  public function vender_orders()
  {
    // $orderproducts = Order::select('orders.*', 'order_items.*', 'products.*', 'user_addresses.*')
    //   ->join('user_addresses', 'user_addresses.id', '=', 'orders.address_id')
    //   ->Join('order_items', 'orders.id', '=', 'order_items.order_id')
    //   ->Join('products', 'products.id', '=', 'order_items.product_id')
    //   ->where('products.user_id', Auth::user()->id)->groupBy('orders.id')->get();
    // dd($orderproducts->toArray());

    $orderproducts = OrderItem::with(['product', 'order'])
      ->whereHas('product', function ($query) {
        $query->where('user_id', Auth::user()->id);
      })
      ->groupBy('order_id')
      ->get();

    $all = [];
    foreach ($orderproducts as $orderproduct) {
      $all[] = $orderproduct->order->address_id;
    }
    $users = UserAddress::whereIn('id', $all)->get();
    return view('VenderProductOrderDetails')->with(compact('orderproducts', 'users'));

  }

  public function order_history()
  {
    $orderhistory = Order::where('user_id', Auth::user()->id)->with(['orderItem', 'product', 'address'])
      ->get();

    return view('userorderhistory')->with(compact('orderhistory'));
  }

  public function user_orders($oid)
  {
    $orderitems = OrderItem::where('order_id', $oid)->with('product')->get();
    return view('userorderproducts', compact('orderitems'));
  }

  public function vendor_products_orders($id)
  {
    $vendor_products = OrderItem::where('order_id', $id)->with('product')
      ->whereHas('product', function ($q) {
        $q->where('user_id', Auth::user()->id);
      })
      ->get();

    return view('vendorproductsorders', compact('vendor_products'));
  }


  public function vendor_status_update(Request $request, $id)
  {
    $update_status = Order::find($id);
    $update_status->status = $request->input('status');
    $update_status->save();
    return redirect()->back();
  }

  public function allorders()
  {
    $allorders = Order::whereHas('orderItem')->with('orderItem.product', 'address')
      ->get();
    // dd( $allorders->toArray());
    return view('adminallorders', compact('allorders'));
  }
}
