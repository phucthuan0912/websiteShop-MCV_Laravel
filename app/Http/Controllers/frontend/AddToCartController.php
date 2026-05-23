<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class AddToCartController extends Controller
{
    public function addToCart(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        
        $finalPrice = $product->price;
        if ($product->status == 1) {
            $finalPrice = $product->price - ($product->price * $product->sale / 100);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $finalPrice,
                "image" => $product->getImageUrl(0)
            ];
        }   
        session()->put('cart', $cart);
        
        $totalQuantity = 0;
        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'Đã thêm sản phẩm vào giỏ hàng!',
            'total_quantity' => $totalQuantity
        ]);
       
    }
       
    
}