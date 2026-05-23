<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductDetailController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['brand', 'category'])->findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $maxPrice = Product::max('price') ?? 1000;
            if($product->status == 1) {
                $product->final_price = $product->price - ($product->price * $product->sale / 100);
                } else {
                    $product->final_price = $product->price;
                }
        return view('frontend.product.productdetail', compact('product', 'categories', 'brands', 'maxPrice'));
    }
}
