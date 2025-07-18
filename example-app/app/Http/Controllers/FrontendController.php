<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
    public function addToCardDetails(Request $request, $product_id)
    {
        $cartProduct = Cart::where('product_id', $product_id)->where('ip_address', $request->ip())->first();
        $product = Product::find($product_id);

        if($cartProduct == Null){
            $cart = new Cart();

            $cart->ip_address = $request->ip();
            $cart->product_id = $product->id;
            $cart->qty = $request->qty;
            $cart->color = $request->color;
            $cart->size = $request->size;

            if($product->discount_price == Null){
                $cart->price = $product->regular_price;
            }
            if($product->discount_price != Null){
                $cart->price = $product->discount_price;
            }

            $cart->save();

            if($request->action == "addToCart"){
                return redirect()->back();
            }
            if($request->action == "buyNow"){
                return redirect('/checkout');
            }
        }

        elseif($cartProduct != Null){
            $cartProduct->qty = $request->qty + $cartProduct->qty;
            $cartProduct->color = $request->color;
            $cartProduct->size = $request->size;

            if($product->discount_price == Null){
                $cartProduct->price = $product->regular_price;
            }
            if($product->discount_price != Null){
                $cartProduct->price = $product->discount_price;
            }

            $cartProduct->save();

             if($request->action == "addToCart"){
                return redirect()->back();
            }
            if($request->action == "buyNow"){
                return redirect('/checkout');
            }
        }
    }

    public function addToCard(Request $request, $product_id)
    {
        $cartProduct = Cart::where('product_id', $product_id)->where('ip_address', $request->ip())->first();
        $product = Product::find($product_id);

          if($cartProduct == Null){
            $cart = new Cart();

            $cart->ip_address = $request->ip();
            $cart->product_id = $product->id;
            $cart->qty = 1;

            if($product->discount_price == Null){
                $cart->price = $product->regular_price;
            }
            if($product->discount_price != Null){
                $cart->price = $product->discount_price;
            }

            $cart->save();
            return redirect()->back();
        }

          elseif($cartProduct != Null){
            $cartProduct->qty = 1 + $cartProduct->qty;

            if($product->discount_price == Null){
                $cartProduct->price = $product->regular_price;
            }
            if($product->discount_price != Null){
                $cartProduct->price = $product->discount_price;
            }

            $cartProduct->save();
            return redirect()->back();
        }
    }
    public function typeproducts($type){
        return view('frontend.typeproducts', compact('type'));
    }
    public function viewcart(){
        $cartitem = Cart::where('ip_address', request()->ip())->get();
        return view('frontend.view-products', compact('cartitem'));
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
