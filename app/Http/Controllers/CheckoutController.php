<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getCheckout() {
        if (!session('cart')) {
            return redirect()->route('product.cart');
        }

        return view('checkout');
    }

    public function postCheckout(Request $request) {
        if (!session('cart')) {
            return redirect()->route('product.cart');
        }

        $cart = $request->session()->get('cart');
        $stripe = new StripeClient('sk_test_51HHrFcI0FvzbwgnCxQU8xLosKHSoWebLRi39YnMEbQbqzlLmWREGJUnicd0D4Yldgo9PB6DkpDrRxRIJsjBQ5x2r00dRvcFSfk');

        try {
            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $request->card_number,
                    'exp_month' => $request->card_expiry_month,
                    'exp_year' => $request->card_expiry_year,
                    'cvc' => $request->card_cvc,
                ],
            ]);

            $charge = $stripe->charges->create([
                'amount' => $cart->totalPrice() * 100,
                'currency' => 'usd',
                'source' => $token,
                'receipt_email' => Auth::user()->email,
                'description' => 'Webshop charge',
            ]);

            $order = Order::create([
                'user_id' => Auth::user()->id,
            ]);

            foreach($cart->items as $item) {
                $order->products()->attach($item['product']->id, ['quantity' => $item['quantity'], 'price' => $item['product']->price]);
            }
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with(['error' => $e->getMessage()]);
        }

        $request->session()->forget('cart');

        return redirect()->route('orders.order', $order->id);
    }
}
