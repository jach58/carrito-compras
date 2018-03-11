@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4> Your Total: ${{ $total }}</h4>
            <div id="charge-error" class="alert alert-danger" {{!Session::has('error') ? 'hidden':''}}>
                {{Session::get('error')}}
            </div>
            <form action="{{route('checkout')}}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" name="address" required>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Card Holder Name</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Credit Card Number</label>
                            <div id="card-number" class="form-control"></div>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Buy now</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{URL::to('js/checkout.js')}}"></script>
@endsection