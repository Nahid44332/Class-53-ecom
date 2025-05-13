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
    public function typeproducts($type){
        return view('frontend.typeproducts', compact('type'));
    }
    public function viewcart(){
        return view('frontend.view-products');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    public function privacy(){
        return view('frontend.privacy-policy');
    }
    // policy
    public function terms(){
        return view('frontend.terms-Conditions');
    }
}
