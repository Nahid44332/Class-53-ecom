<?php

use App\Http\Controllers\FrontednController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontednController::class, 'index']);
Route::get('/contact-us', [FrontednController::class, 'contactus']);