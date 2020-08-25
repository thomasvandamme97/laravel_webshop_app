@extends('layouts.app')

@section('head')
    <script src="https://js.stripe.com/v2/"></script>
    <script src="{{ asset('js/client.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><span>{{ __('Checkout') }}</span><span></span></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @if(session('error'))
                                    <div id="charge-error" class="alert alert-danger {{ !session('error') ? 'hidden' : '' }}">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('checkout') }}" method="POST" id="checkout-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="card-name">Credit Card Name</label>
                                                <input class="form-control" type="text" name="card_name" id="card-name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="card-number">Credit Card Number</label>
                                                <input class="form-control" type="text" name="card_number" id="card-number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="card-expiry-month">Expiry Month</label>
                                                <input class="form-control" type="text" name="card_expiry_month" id="card-expiry-month" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="card-expiry-year">Expiry Year</label>
                                                <input class="form-control" type="text" name="card_expiry_year" id="card-expiry-year" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="card-cvc">CVC</label>
                                                <input class="form-control" type="text" name="card_cvc" id="card-cvc" required>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Checkout">
                                </form>
                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-end align-items-end">
                                <p class="card-text font-weight-bold">{{ __('Your total') }}: <span class="pl-5">${{ session('cart')->totalPrice() }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
