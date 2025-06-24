<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ProductCreate()
    {
        $categories = Category::orderby('name', 'asc')->get();
        $subcategories = SubCategory::orderby('name', 'asc')->get();
        return view('backend.product.create', compact('categories', 'subcategories'));
    }
    public function ProductStore(Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->sku_code = $request->sku_code;
        $product->qty = $request->qty;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;

         if(isset($request->image)){
            $imageName = rand().'-product-'.'.'.$request->image->extension(); //12345-category-.webp
            $request->image->move('backend/images/product/', $imageName);

            $product->image = $imageName;

        }
        $product->save();
        return redirect()->back();
    }
}

