<?php

use App\Http\Controllers\backend\adminauthcontroller;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Models\Category;
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
// admin site
Route::get('/admin/login' , [adminauthcontroller::class ,'adminlogin']);
Route::get('/admin/logout' , [adminauthcontroller::class ,'adminlogout']);

Auth::routes();
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
// Category Routes
Route::get('/admin/category/create', [CategoryController::class, 'categoryCreate']);
Route::post('/admin/category/store', [CategoryController::class, 'categoryStore']);
Route::get('/admin/category/list', [CategoryController::class, 'categoryList']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'categoryDelete']);
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'categoryEdit']);
Route::post('/admin/category/update/{id}', [CategoryController::class, 'categoryUpdate']);
