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