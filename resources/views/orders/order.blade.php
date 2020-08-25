@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class=" row order">
                    <div class="col-12">
                        <div class="row mb-3">
                            <div class="order-title">{{ __('#') }}{{ $order->created_at->format('d F Y') }} | Order #{{ $order->id }}</div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @foreach($products as $product)
                                    <div id="{{ $product->id }}" class="row order-item">
                                        <div class="col-12">
                                            <div class="row mt-3">
                                                <div class="col-md-5 d-flex justify-content-center align-items-center">
                                                    <img class="img-fluid" src="{{ asset('storage/products/' . $product->file_name) }}" alt="Image of Product">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <p class="font-weight-bold">{{ $product->name }}</p>
                                                        <p class="">{{ $product->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <div class="row d-block text-center mr-5">
                                                        <p class="font-weight-bold mb-2">{{ __('Quantity') }}</p>
                                                        <p class="mb-0">{{ $product->pivot->quantity }}</p>
                                                    </div>
                                                    <div class="row d-block text-center ml-5 mr-3">
                                                        <p class="font-weight-bold mb-2">{{ __('Price') }}</p>
                                                        <p class="mb-0">${{ $product->pivot->quantity * $product->pivot->price }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
