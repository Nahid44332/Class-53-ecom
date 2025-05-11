<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function shop(){
        return view('frontend.shop');
    }
    public function return(){
        return view('frontend.return-process');
    }
    public function details(){
        return view('frontend.details');
    }
    public function typeproducts(){
        return view('frontend.typeproducts');
    }
}
