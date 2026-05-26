<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
class SearchAdvanceController extends Controller
{
    public function index(){
        $product = Product::all();
        $categories = Category::all();
            $brands = Brand::all();
            $maxPrice = Product::max('price') ?? 1000;
            foreach($product as $item) {
                if($item->status == 1) {
                    $item->final_price = $item->price - ($item->price * $item->sale / 100);
                } else {
                    $item->final_price = $item->price;
                }
            }

        return view("frontend.search.index",compact('product', 'keyword', 'categories','brands','maxPrice'));
        return view ('frontend.advancesearch.index');
    }
}
