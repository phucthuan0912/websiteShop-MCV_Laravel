<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        
        $cart = session()->get('cart', []);
        $cart = collect($cart)->map(function ($item) {
            return (object) $item;
        });
        $tax = 2;
        $subTotal = 0; 
        $final_subTotal = 0; 
        foreach ($cart as $item) {
            $subTotal+= $item->price * $item->quantity;
        }
        if($subTotal > 0 ) {
            $final_subTotal = $tax+$subTotal;     
        } else{
            $subTotal = 0;
            $final_subTotal = $tax;

        }
        return view ('frontend.cart.cart', compact('cart', 'final_subTotal','subTotal','tax' ));
    }

    public function updateCart(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            if ($type == 'plus') {
                $cart[$id]['quantity']++;
            } elseif ($type == 'minus') {
                $cart[$id]['quantity']--;
                if ($cart[$id]['quantity'] <= 0) {
                    unset($cart[$id]);
                }
            }
            session()->put('cart', $cart);
        }
        
        $data = $this->calculateData($cart, $id);
        return response()->json($data);
    }
    public function removeCart(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        $data = $this->calculateData($cart);
        return response()->json($data);
    }
    private function calculateData($cart, $id = null)
    {
        $subtotal = 0;
        $totalQuantity = 0;
        
        foreach ($cart as $item) {
            $subtotal += $item['quantity'] * $item['price'];
            $totalQuantity += $item['quantity'];
        }
        $eco_tax = 2;
        $total = $subtotal > 0 ? $subtotal + $eco_tax : $eco_tax ;

        return [
            'status' => true,
            'qty' => ($id && isset($cart[$id])) ? $cart[$id]['quantity'] : 0,
            'lineTotal' => ($id && isset($cart[$id])) ? number_format($cart[$id]['quantity'] * $cart[$id]['price']) : 0,
            'subTotal' => number_format($subtotal),
            'tax' => number_format($eco_tax),
            'total' => number_format($total),
            'total_quantity' => $totalQuantity
        ];
    }
}
