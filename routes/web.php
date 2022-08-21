<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\ProductAttributeController;
use App\Middleware\admin;
use App\Http\Controllers\front_end\CommentController;
use App\Http\Controllers\front_end\HomeController;
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


Route::prefix('product')->group(function(){
   Route::get('/detail/{id}',[FrontProductController::class,'product_detail'])->name('product.detail');
   Route::get('/product_list/{section?}/{category?}',[FrontProductController::class,'product_list'] )->name('product.product_list');
   Route::post('/product_list_request',[FrontProductController::class,'product_list_with_request'] )->name('product.product_list_request');
   Route::get('/product_list_with_brand/{brand}',[FrontProductController::class,'list_product_with_brand'])->name('product.product_list_with_brand');
   Route::get('/cart/{id}',[FrontProductController::class,'add_product_to_cart'])->name('product.product_to_cart');

});

Route::prefix('comment')->group(function(){
   Route::post('/store',[CommentController::class,'store'])->name('comment.store');

});












Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
