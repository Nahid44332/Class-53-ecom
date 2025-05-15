<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/' , [FrontendController::class ,'index']);
Route::get('/shop' , [FrontendController::class ,'shop']);
Route::get('/return-process' , [FrontendController::class ,'return']);
Route::get('/details' , [FrontendController::class ,'details']);
Route::get('/type-products/{type}' , [FrontendController::class ,'typeproducts']);
Route::get('/view-products' , [FrontendController::class ,'viewcart']);
Route::get('/checkout' , [FrontendController::class ,'checkout']);

// policy
Route::get('/privacy-policy' , [FrontendController::class ,'privacy']);
Route::get('/terms-Conditions' , [FrontendController::class ,'terms']);
Route::get('/refund-Policy' , [FrontendController::class ,'refundPolicy']);
Route::get('/payment-Policy' , [FrontendController::class ,'paymentPolicy']);
Route::get('/about-us' , [FrontendController::class ,'aboutUs']);
Route::get('/contact-us' , [FrontendController::class ,'contactUs']);

// Catagoury
Route::get('/test-category' , [FrontendController::class ,'testCategory']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
