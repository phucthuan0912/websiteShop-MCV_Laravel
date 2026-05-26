<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index() {
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
        return view ('frontend.checkout.checkout', compact('cart', 'final_subTotal','subTotal','tax' ));
    }

    public function registerCheckout() {

    }
}
