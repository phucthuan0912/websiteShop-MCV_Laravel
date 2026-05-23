<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class HomeController extends Controller
{
    //   public function __construct(){
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $product = Product::paginate(6);
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
            return view('frontend.home', compact('product', 'categories', 'brands', 'maxPrice'));

    }


}
    