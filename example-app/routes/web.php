<?php

use App\Http\Controllers\backend\adminauthcontroller;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\FrontendController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/' , [FrontendController::class ,'index']);
Route::get('/shop' , [FrontendController::class ,'shop']);
Route::get('/return-process' , [FrontendController::class ,'return']);
Route::get('/product-details/{slug}' , [FrontendController::class ,'productdetails']);
Route::get('/type-products/{type}' , [FrontendController::class ,'typeproducts']);
Route::get('/view-products' , [FrontendController::class ,'viewcart']);
Route::get('/checkout' , [FrontendController::class ,'checkout']);

// Add to Card Route...
Route::post('/product-details/add-to-card/{product_id}' , [FrontendController::class ,'addToCartDetails']);
Route::get('/add-to-card/{product_id}' , [FrontendController::class ,'addToCart']);
Route::get('/cart/delete/{id}', [FrontendController::class, 'deleteCartItem']);

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
//SubCategory Routes
Route::get('/admin/sub-category/create', [SubCategoryController::class, 'subcategoryCreate']);
Route::post('/admin/sub-category/store', [SubCategoryController::class, 'subcategoryStore']);
Route::get('/admin/sub-category/list', [SubCategoryController::class, 'subcategoryList']);
Route::get('/admin/sub-category/delete/{id}', [SubCategoryController::class, 'subcategoryDelete']);
Route::get('/admin/sub-category/edit/{id}', [SubCategoryController::class, 'subcategoryEdit']);
Route::post('/admin/sub-category/update/{id}', [SubCategoryController::class, 'subcategoryUpdate']);
//product Routes
Route::get('/admin/product/create', [ProductController::class, 'ProductCreate']);
Route::post('/admin/product/store', [ProductController::class, 'ProductStore']);
Route::get('/admin/product/list', [ProductController::class, 'ProductList']);
Route::get('/admin/product/delete/{id}', [ProductController::class, 'ProductDelete']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'ProductEdit']);
Route::post('/admin/product/update/{id}', [ProductController::class, 'ProductUpdate']);

Route::get('/admin/product/color/delete/{id}', [ProductController::class, 'colorDelete']);
Route::get('/admin/product/size/delete/{id}', [ProductController::class, 'sizeDelete']);
Route::get('/admin/product/galleryimage/delete/{id}', [ProductController::class, 'galleryImageDelete']);
Route::get('/admin/product/galleryimage/edit/{id}', [ProductController::class, 'galleryImageEdit']);
Route::post('/admin/product/galleryimage/update/{id}', [ProductController::class, 'galleryImageUpdate']);