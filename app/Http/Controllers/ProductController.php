<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Carts;
use App\Models\User;
use App\Models\Permission;
use App\Models\ParentCategory;
use App\Models\UserAddress;
use App\Models\Roles;
use App\Models\Sub_category;

use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\Loginform;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
  public function productdisplay()
  {
    $parent_category = ParentCategory::with('sub_category')->get();
    // dd($parent_category->toArray());
    $displayproducts = Product::get();
    return view('welcome')->with(compact('displayproducts', 'parent_category'));
  }

  public function singleProduct($id)
  {
    $products = Product::find($id);
    return view('admin.products', compact('products'));
  }

  public function addtocart(Request $req)
  {
    if (Auth::check()) {
      $carts = new Carts;
      $carts->product_id = $req['id'];
      $carts->quantity = $req['quantity'];
      $carts->user_id = Auth::user()->id;
      $carts->save();
      return redirect()->route('welcome')->with('Items', 'Item added successfully!');
    }
    return redirect('login')->with('error', 'Info! please login to system');
  }

  public function shoppcart()
  {
    if (Auth::check()) {
      $cartsitem = Carts::where('user_id', Auth::user()->id)->with('product')->get();
      return view('admin.shoppcart', compact('cartsitem'));
    }
    return view('admin.shoppcart');
  }

  public function up()
  {
    $sum = Carts::where('user_id', Auth::user()->id)->first();
    $all = $sum->quantity + 1;
    $sum->update([
      'quantity' => $all,
    ]);
    return redirect()->back()->with('update-item','Your item updated successfully!');
  }

  public function down()
  {
    $sum = Carts::where('user_id', Auth::user()->id)->first();
    $all = $sum->quantity - 1;
    $sum->update([
      'quantity' => $all,
    ]);
    return redirect()->back()->with('update-item','Your item updated successfully!');
  }

  public function deleteproduct($id)
  {
    Carts::destroy($id);
    return redirect()->back();
  }

  public function userview()
  {
    return view('admin.user');
  }

  public function loginform()
  {
   
    return view('admin.login');
  }

  public function loginmatch(Loginform $logindata){
  

    $credentials = $logindata->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $logindata->session()->regenerate();
      return redirect()->intended($logindata->prevUrl)->with('Success2', 'You are successfully logged In!');
    } else {
      return redirect()->back()->with('Error', 'Email/Password is Incorrect!');
    }
  }

  public function addressform()
  {
    if (Auth::check()) {
      $totalitems = Carts::where('user_id', Auth::user()->id)->with('product')->get();
      // dd($totalitems->toArray());
      return view('address', compact('totalitems'));
    }
  }
  public function userRegistration()
  {
    return view('userregistration');
  }


  public function storeuser(UserRegistrationRequest $data)
  {
    $validated = $data->validated();

    $users = new User;
    $users->name = $validated['name'];
    $users->email = $validated['email'];
    $users->password = Hash::make($validated['password']);
    $users->assignRole('User');
    $users->save();
    return redirect()->route('login_form')->with('Success', 'Your Account is Created Successfully!');
  }



}
