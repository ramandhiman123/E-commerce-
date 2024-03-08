<?php

namespace App\Http\Controllers;

use App\Models\Vender;
use App\Models\Product;
use App\Models\Sub_category;
use App\Models\ParentCategory;
use App\Models\User;
use Spatie\Permission\Models\Roles;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Requests\VenderRegister;
use App\Http\Requests\ProductAdd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;

class VenderController extends Controller
{

  public function __construct()
  {
    $this->middleware(['permission:vendor-product-list'], ['only' => 'vendershow']);
    $this->middleware(['permission:vendor-product-add'], ['only' => ['productadd', 'Add_product',]]);
    $this->middleware(['permission:vendor-product-delete'], ['only' => 'delete_vender_products']);
    $this->middleware(['permission:vendor-product-edit|vendor-product-update'], ['only' => ['Update_item', 'Edit_products']]);
  }

  public function productadd(ProductAdd $productadd)
  {

    // $validated = $productadd->validate();

    $original_pic = $productadd->file('image');

    $file_extension = $original_pic->getClientOriginalExtension();
    $filename = time() . '.' . $file_extension;
    Storage::put('public/ArticlesImages/' . $filename, (string) file_get_contents($original_pic), 'public');

    $products = new Product;
    $products->product_title = $productadd['title'];
    $products->product_price = $productadd['pprice'];
    $products->product_description = $productadd['pdescription'];
    $products->stock_quantity = $productadd['quantity'];
    $products->product_brand = $productadd['brand'];
    $products->sub_category_id = $productadd['category'];
    $products->product_image_URLs = $filename;
    $products->user_id = Auth::user()->id;
    $products->save();
    return redirect('productadd');
  }

  public function Add_product()
  {
    // $parent = ParentCategory::get();
    $category = Sub_category::get();
    return view('admin.addproducts')->with(compact('category'));
  }

  public function vendershow()
  {
    if (Auth::check()) {
      $sellerproducts = Product::where('user_id', Auth::user()->id)->get();
      return view('admin.Vender')->with(compact('sellerproducts'));
    }
  }

  public function venderstore(VenderRegister $register)
  {

    $validated = $register->validate();

    $users = new User;
    $users->name = $register['name'];
    $users->email = $register['email'];
    $users->password = Hash::make($register['password']);
    $users->assignRole('Vendor');
    $users->save();
    return redirect()->route('login_form')->with('Success', 'Your Account is Created Successfully!');
  }

  public function newvender()
  {
    return view('admin.sellerform');
  }

  public function seller_dashboard()
  {
    return view('admin.sellerdashboard');
  }

  public function delete_vender_products($id)
  {
    Product::destroy($id);
    return redirect()->back();
  }

  public function Update_item($id)
  {
    $UpdateProduct = Product::find($id);
    $category = Sub_category::get();
    return view('admin.updateproduct')->with(compact('UpdateProduct', 'category'));
  }

  public function Edit_products(Request $request, $id)
  {
    $editproduct = Product::find($id);
    $editproduct->product_title = $request['title'];
    $editproduct->product_price = $request['pprice'];
    $editproduct->product_description = $request['pdescription'];
    $editproduct->product_brand = $request['brand'];
    $editproduct->stock_quantity = $request['quantity'];
    $editproduct->sub_category_id = $request['category'];
    // $editproduct->product_image_URLs = 
    $editproduct->user_id = Auth::user()->id;
    $editproduct->save();
    return redirect('product_list');
  }

}
