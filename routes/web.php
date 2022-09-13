<?php

use App\Middleware\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\front_end\HomeController;
use App\Http\Controllers\front_end\UserController;
use App\Http\Controllers\front_end\OrderController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\front_end\CommentController;
use App\Http\Controllers\front_end\CheckoutController;
use App\Http\Controllers\front_end\ProductController as FrontProductController;




Route::get('/',[HomeController::class,'index']);
// all admin routes
Route::any('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::middleware('admin')->group(function () {   
   Route::prefix('/admin')->group(function(){
         Route::get('/',[AdminController::class,'index'])->name('admin.layout');
         Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
         Route::get('/setting',[AdminController::class,'setting'])->name('admin.setting');
         Route::post('/update/{id?}',[AdminController::class,'update'])->name('admin.update');
         Route::post('/updateDetail/{id}',[AdminController::class,'updateDetail'])->name('admin.updateDetail');
         Route::get('/create',[AdminController::class,'create'])->name('admin.create');
         Route::get('/list',[AdminController::class,'list'])->name('admin.list');
         Route::post('/store',[AdminController::class,'store'])->name('admin.store');
         Route::get('/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');
       }); 

   // section routes
   Route::prefix('section')->group(function(){
      Route::get('/',[SectionController::class,'index'])->name('section.list');
      Route::get('/create',[SectionController::class,'create'])->name('section.create');
      Route::post('/store',[SectionController::class,'store'])->name('section.store');
      Route::get('/edit/{id}',[SectionController::class,'edit'])->name('section.edit');
      Route::post('/update/{id}',[SectionController::class,'update'])->name('section.update');
      Route::post('/updateStatus',[SectionController::class,'updateStatus'])->name('section.updateStatus');
      Route::get('/delete/{id}',[SectionController::class,'delete'])->name('section.delete');

   }) ; 

    // categories route
    Route::prefix('category')->group(function(){
       Route::get('deleteImage/{id}',[CategoryController::class,'deleteImage'])->name('category.deleteImage');
       Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    });
    Route::prefix('/product')->group(function(){
       Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    });

    Route::resource('category',CategoryController::class)->parameters(['category'=>'id']);
    Route::resource('product',ProductController::class)->parameters(['product'=>'id']);

    Route::prefix('product_attribute')->group(function () {
       Route::match(['get', 'post'], '/add/{id}',[ProductAttributeController::class,'create'])->name('product_attribute.add');
       Route::post('/store',[ProductAttributeController::class,'store'])->name('product_attribute.store'); 
    });

   Route::prefix('image')->group(function(){
      Route::get('/delete/{id}',[ImageController::class,'delete'])->name('image.delete');
   });
   
   // brand route  
   Route::prefix('brand')->group(function(){
   Route::get('/status/{id}',[BrandController::class,'update_status']);  
   Route::get('/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');
  }); 

  Route::resource('brand', BrandController::class)->parameters(['brand'=>'id']);           
  // slide show route 
 Route::prefix('slide_show')->group(function(){
     Route::get('/delete/{id}',[SlideShowController::class,'delete'])->name('slide_show.delete');
  });
  Route::resource('slide_show', SlideShowController::class)->parameters(['slide_show'=>'id']);
});

// These route use for front_end  
Route::prefix('product')->group(function(){
   Route::get('/detail/{id}',[FrontProductController::class,'product_detail'])->name('product.detail');
   Route::get('/product_list/{section?}/{category?}',[FrontProductController::class,'product_list'] )->name('product.product_list');
   Route::post('/product_list_request',[FrontProductController::class,'product_list_with_request'] )->name('product.product_list_request');
   Route::get('/product_list_with_brand/{brand}',[FrontProductController::class,'list_product_with_brand'])->name('product.product_list_with_brand');
   Route::post('/cart',[FrontProductController::class,'add_product_to_cart'])->name('product.add_to_cart');
   Route::post('/update_cart',[FrontProductController::class,'update_cart'])->name('product.update_cart');
   Route::get('/delete_cart/{id}',[FrontProductController::class,'delete_cart'])->name('cart.delete');   
   Route::get('/delete_cart_when_login/{id}',[FrontProductController::class,'delete_cart_when_login'])->name('cart.delete_when_login');   
});
Route::get("/checkout",[CheckoutController::class,'checkout'])->name('product.checkout');
Route::prefix('delivery')->group(function(){
   Route::get('/add',[CheckoutController::class,'add'])->name('delivery.add');
   Route::post('/store',[CheckoutController::class,'store'])->name('delivery.store');
   Route::get('/delete/{id}',[CheckoutController::class,'delete'])->name('delivery.delete');
   Route::get('/edit/{id}',[CheckoutController::class,'edit'])->name('delivery.edit');
   Route::put('/upate/{id}',[CheckoutController::class,'update'])->name('delivery.update');

});
Route::prefix('order')->group(function(){
   Route::post('/',[OrderController::class,'order'])->name('user.order');
});

Route::get('/show_cart',[FrontProductController::class,'show_cart'])->name("product.show_cart");

Route::prefix('comment')->group(function(){
   Route::post('/store',[CommentController::class,'store'])->name('comment.store');

});

Route::prefix('user')->group(function(){
    Route::get('/login_form',[UserController::class,'open_login_form'])->name('user.login_form');
    Route::get('/register_form',[UserController::class,'open_register_form'])->name('user.register_form');
    Route::get('/forgot_password_form',[UserController::class,'open_forgot_password_form'])->name('user.forgot_password_form');
    Route::post('/register',[UserController::class,'register'])->name('user.register');
    Route::post("/login",[UserController::class,'login'])->name('user.login');
    Route::post("/forgot_password",[UserController::class,'forgot_password'])->name('user.forgot_password');
});  

Route::middleware(['auth'])->group(function () {
Route::prefix('user')->group(function(){
    Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
    Route::get('/open_account',[UserController::class,'open_account'])->name('user.open_account');
    Route::get('/edit_account',[UserController::class,'edit_account'])->name('user.edit_account');
    Route::put('/upate_account',[UserController::class,'update_account'])->name('user.update_account');
    Route::get('/edit_password',[UserController::class,'edit_password'])->name('user.edit_password');
    Route::put('/update_password',[UserController::class,'update_password'])->name('user.update_password');
});
});











Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
