<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $orders = Auth::user()->orders()->get();

        $collection = collect([]);

        foreach ($orders as $order) {
            $products = $order->products()->get();

            $collection->push([$order, $products]);
        }



        return view('orders.index')->with(['orders' => $collection]);
    }

    public function getOrder($id) {
        $order = Order::find($id);

        if (Auth::user()->id === $order->user_id) {
            $products= $order->products()->get();

            return view('orders.order')->with(['order' => $order, 'products' => $products]);
        }

        return redirect()->route('orders.index');
    }
}
