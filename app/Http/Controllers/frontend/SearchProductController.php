<?php

namespace App\Http\Controllers\frontend;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SearchProductController extends Controller
{

    public function search(Request $request){
        $keyword = $request->input('inputSearch');
        if (empty($keyword)) {
            return redirect()->route('frontend.home');
        }
        $product = Product::where('name', 'LIKE', "%".$keyword. "%" )->paginate(6);


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
    }
    

}
