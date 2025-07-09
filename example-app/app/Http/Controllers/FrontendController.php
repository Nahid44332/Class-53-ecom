<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::orderBy('name', 'asc')->with('subCategory')->get();
        $hotproducts = Product::where('product_type', 'hot')->orderby('id', 'desc')->get();
        $newproducts = Product::where('product_type', 'new')->orderby('id', 'desc')->get();
        $regularproducts = Product::where('product_type', 'regular')->orderby('id', 'desc')->get();
        $discountproducts = Product::where('product_type', 'discount')->orderby('id', 'desc')->get();
        return view('frontend.index', compact('hotproducts', 'newproducts', 'regularproducts', 'discountproducts', 'categories'));
    }
    public function shop(){
        return view('frontend.shop');
    }
    public function return(){
        return view('frontend.return-process');
    }
    public function productdetails($slug){

        $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();
        $categories = Category::orderby('name', 'asc')->get();
        return view('frontend.details', compact('product', 'categories'));
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
    // Policy
    public function privacy(){
        return view('frontend.privacy-policy');
    }
    public function terms(){
        return view('frontend.terms-Conditions');
    }
    public function refundPolicy(){
        return view('frontend.refund-Policy');
    }
    public function paymentPolicy(){
        return view('frontend.payment-Policy');
    }
    public function aboutUs(){
        return view('frontend.about-us');
    }
    public function contactUs(){
        return view('frontend.contact-us');
    }
    public function testCategory(){
        return view('frontend.test-category');
    }
}
