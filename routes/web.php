<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home']);

Route::get('/dashboard',[HomeController::class,'loginHome'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myOrders',[HomeController::class,'myOrders'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

Route::get('view-category',[AdminController::class,'viewCategory'])->middleware(['auth','admin']);

Route::post('add-category',[AdminController::class,'addCategory'])->middleware(['auth','admin']);

Route::get('delete-category/{id}',[AdminController::class,'deleteCategory'])->middleware(['auth','admin']);

Route::get('edit-category/{id}',[AdminController::class,'editCategory'])->middleware(['auth','admin']);

Route::post('update-category/{id}',[AdminController::class,'updateCategory'])->middleware(['auth','admin']);

Route::get('add-product',[AdminController::class,'addProduct'])->middleware(['auth','admin']);

Route::post('upload-product',[AdminController::class,'uploadProduct'])->middleware(['auth','admin']);

Route::get('view-product',[AdminController::class,'viewProduct'])->middleware(['auth','admin']);

Route::get('delete-product/{id}',[AdminController::class,'deleteProduct'])->middleware(['auth','admin']);

Route::get('update-product/{slug}',[AdminController::class,'updateProduct'])->middleware(['auth','admin']);

Route::post('edit-product/{id}',[AdminController::class,'editProduct'])->middleware(['auth','admin']);

Route::get('product-search',[AdminController::class,'productSearch'])->middleware(['auth','admin']);

Route::get('productDetail/{id}',[HomeController::class,'productDetail']);

Route::get('addCart/{id}',[HomeController::class,'addCart'])->middleware(['auth','verified']);

Route::get('myCart',[HomeController::class,'myCart'])->middleware(['auth','verified']);

Route::get('delete-cart/{id}',[HomeController::class,'deleteCart'])->middleware(['auth','verified']);

Route::post('confirm-order',[HomeController::class,'confirmOrder'])->middleware(['auth','verified']);

Route::get('shop',[HomeController::class,'shop']);

Route::get('whyUs',[HomeController::class,'whyUs']);

Route::get('testimonial',[HomeController::class,'testimonial']);

Route::get('contact',[HomeController::class,'contact']);

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});

Route::get('view-order',[AdminController::class,'viewOrder'])->middleware(['auth','admin']);

Route::get('ontheWay/{id}',[AdminController::class,'ontheWay'])->middleware(['auth','admin']);

Route::get('delivered/{id}',[AdminController::class,'delivered'])->middleware(['auth','admin']);

Route::get('print-PDF/{id}',[AdminController::class,'printPDF'])->middleware(['auth','admin']);

