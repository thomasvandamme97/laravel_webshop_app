<?php


namespace App;


class Cart
{
    public $items = null;

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
        }
    }

    public function add(Product $product) {
        $storedItem = ['quantity' => 0, 'price' => $product->price, 'product' => $product];

        if ($this->items) {
            if (array_key_exists($product->id, $this->items)) {
                $storedItem = $this->items[$product->id];
            }
        }

        $this->items[$product->id] = $storedItem;
        $this->items[$product->id]['quantity']++;
    }

    public function totalQuantity() {
        $totalQuantity = 0;

        foreach($this->items as $product) {
            $totalQuantity += $product['quantity'];
        }

        return $totalQuantity;
    }

    public function totalPrice() {
        $totalPrice = 0;

        foreach($this->items as $product) {
            $totalPrice += $product['price'];
        }

        return $totalPrice;
    }

    public function totalItemPrice($id) {
        return $this->items[$id]['quantity'] * $this->items[$id]['price'];
    }
}
