<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addToCart(Request $request, $id) {
        $product = Product::find($id);

        $cart = new Cart($request->session()->get('cart'));
        $cart->add($product);

        $request->session()->put('cart', $cart);

        return redirect()->route('index');
    }

    public function getCart() {
        return view('shopping-cart')->with(['cart' => session('cart')]);
    }
}
