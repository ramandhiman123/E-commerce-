<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Roles;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */

// Route::get('/', function () {

//     return view('welcome');
// });



// Route::middleware('auth')->group(function () {
//   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

// });

Route::group(['middleware' => ['auth', 'checkrole']], function () {
  /////user role and permissions///
  Route::get('/users', [UserController::class, 'index'])->name('user.index');
  Route::get('/create', [UserController::class, 'create'])->name('user.create');
  Route::post('/newuser', [UserController::class, 'store'])->name('user.store');
  Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
  Route::post('/userupdate/{id}', [UserController::class, 'update'])->name('user.update');
  Route::Delete('/userdelete/{id}', [UserController::class, 'delete'])->name('user.delete');
  Route::get('/role', [AdminController::class, 'roleview'])->name('role.view');
  Route::post('/addrole', [AdminController::class, 'add_role'])->name('add.role');
  Route::get('/deleterole/{id}', [AdminController::class, 'deleterole'])->name('delete.role');
  Route::get('/adpermision/{id}', [AdminController::class, 'addpermision'])->name('add.permission');
  Route::post('/assignpermission/{roleid}', [AdminController::class, 'assign_permissions'])->name('add.rolepermission');
  //////end roles and permissions route////

  //////product//////
  Route::get('/productupdate/{id}', [VenderController::class, 'Update_item'])->name('update.products');
  Route::post('/storeupdate/{id}', [VenderController::class, 'Edit_products'])->name('Edit.items');
  Route::get('/product_list', [VenderController::class, 'vendershow'])->name('admin.Vender');
  Route::Delete('/delete_product/id={id}', [VenderController::class, 'delete_vender_products'])->name('delete_add_products');
  Route::get('/productadd', [VenderController::class, 'Add_product'])->name('Product_Add');
  Route::post('/Products', [VenderController::class, 'productadd'])->name('product.Add');
  //////end products route////

  ///////category///////
  Route::get('/category_view', [CategoryController::class, 'index'])->name('category.index');
  Route::post('/parent_category', [CategoryController::class, 'create'])->name('category.create');
  Route::get('/deletecategory/{id}', [CategoryController::class, 'deletecategory'])->name('delete.category');
  Route::get('/newcategory', [CategoryController::class, 'category_form'])->name('new.category');
  Route::post('/sub-category-add', [CategoryController::class, 'create_sub_category'])->name('sub-category.create');
  //////end catgory route/////
////vendor product orders/////
  Route::get('/vender_orders', [OrderController::class, 'vender_orders'])->name('vendor_orders_details');
  Route::get('/vendor_products_orders/{id}', [OrderController::class, 'vendor_products_orders'])->name('vendor.products_orders');

  Route::get('/admin_all_orders', [OrderController::class, 'allorders'])->name('admin.allorders');
  //////end order route
});


require __DIR__ . '/auth.php';

Route::get('/', [ProductController::class, 'productdisplay'])->name('welcome');
Route::get('/Seller-dashboard', [VenderController::class, 'seller_dashboard'])->name('admin.sellerdashoard');
Route::get('/Seller-form', [VenderController::class, 'newvender'])->name('admin.sellerform');
Route::post('/Seller-add', [VenderController::class, 'venderstore'])->name('admin.vender-store');
Route::get('/P_show', [ProductController::class, 'productdisplay'])->name('Product_show');
Route::get('/SProduct/{id}', [ProductController::class, 'singleProduct'])->name('single.product');
Route::post('/addtocart', [ProductController::class, 'addtocart'])->name('add_cart');
Route::get('/shoppingcart', [ProductController::class, 'shoppcart'])->name('shopping_cart');
Route::Delete('/delete_cart_item/{id}', [ProductController::class, 'deleteproduct'])->name('delete_cart_item');
Route::get('/address', [ProductController::class, 'addressform'])->name('address.form');
Route::get('/product/{id}', [CategoryController::class, 'sub_categories'])->name('mens.wear');
Route::get('/logout', [AdminController::class, 'logoutuser'])->name('user.logout');

Route::group(['middleware' => ['guest']], function () {
  Route::get('/e', [ProductController::class, 'loginform'])->name('login_form');
  Route::post('/logdata', [ProductController::class, 'loginmatch'])->name('login_data');
  Route::get('/userreg', [ProductController::class, 'userRegistration'])->name('user.registration');
  Route::post('/userstore', [ProductController::class, 'storeuser'])->name('user.reg');
});

Route::get('/stripe', [StripeController::class, 'stripe']);
Route::post('/stripes', [StripeController::class, 'stripePost'])->name('stripe.post');
Route::post('/quantityup', [ProductController::class, 'up'])->name('quantity.up');
Route::post('/quantitydown', [ProductController::class, 'down'])->name('quantity.down');

Route::get('/orders_history', [OrderController::class, 'order_history'])->name('order.history');
Route::get('/orders_user/{oid}', [OrderController::class, 'user_orders'])->name('order.users');


Route::post('/update_status/{id}', [OrderController::class, 'vendor_status_update'])->name('vendor.update_status');



Route::get('/show_details', function () {
  return view('pusher');
});

Route::get('/allusershow',[UserDetailController::class, 'usershow'])->name('alluser.show');

Route::post('/useradd', [UserDetailController::class, 'useradd'])->name('user_add');





