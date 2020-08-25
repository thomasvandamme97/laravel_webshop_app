@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Shopping Cart') }}</div>

                    <div class="card-body">
                        @if($cart)
                            @foreach($cart->items as $item)
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="img-fluid" src="{{ asset('storage/products/' . $item['product']->file_name) }}" alt="Image of {{ $item['product']->name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="font-weight-bold pt-3">{{ $item['product']->name }}</p>
                                        <p>{{ $item['product']->description }}</p>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <p class="checkout-quantity">{{ $item['quantity'] }}</p>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <p class="font-weight-bold">${{ $cart->totalItemPrice($item['product']->id) }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
                                    <p>{{ __('Quantity') }}</p>
                                    <p>{{ $cart->totalQuantity() }}</p>
                                </div>
                                <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
                                    <p class="font-weight-bold">{{ __('Total') }}</p>
                                    <p class="font-weight-bold">${{ $cart->totalPrice() }}</p>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-2 d-flex justify-content-center align-items-center">
                                    <a href="{{ route('checkout') }}" class="btn btn-primary">{{ __('Checkout') }}</a>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-12">
                                    <p class="m-0">There are no products in your shopping cart.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
