@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ __('My Orders') }}</h1>
                @if($orders)
                    @foreach($orders as $order)
                        <div class="row order">
                            <div class="col-12">
                                @foreach($order as $item)
                                    @if($loop->first)
                                        <div class="row">
                                            <p class="order-title">{{ $item->created_at->format('d F Y') }} | Order #{{ $item->id }}</p>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-12">
                                                @foreach($item as $product)
                                                    <a class="order-link" href="{{ route('orders.order', $order[0]->id) . '#' . $product->id }}">
                                                        <div class="row order-item">
                                                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                                                <img class="img-fluid" src="{{ asset('storage/products/' . $product->file_name) }}" alt="Image of Product">
                                                            </div>
                                                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                                                <p class="font-weight-bold mb-0">{{ $product->name }}</p>
                                                            </div>
                                                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                                                <p class="mb-0">{{ $product->pivot->quantity }}</p>
                                                            </div>
                                                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                                                <p class="font-weight-bold mb-0">${{ $product->pivot->quantity * $product->pivot->price }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
