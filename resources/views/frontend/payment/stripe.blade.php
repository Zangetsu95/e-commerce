@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
    Stripe Payment
@endsection

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Payment</h1>
                <div class="d-flex justify-content-between">
                    {{-- <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart
                    </h6> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                            </tbody>
                            <table>
                                <tbody>
                                    <tr>
                                        @if (Session::has('coupon'))
                                            <strong>SubTotal: </strong>
                                            <h4>${{ $cartTotal }}</h4>
                                            <hr>

                                            <strong>Coupon Name : </strong>
                                            <h4>{{ session()->get('coupon')['coupon_name'] }} </h4>
                                            <h4>( {{ session()->get('coupon')['coupon_discount'] }} % ) </h4>
                                            <hr>

                                            <strong>Coupon Discount : </strong>
                                            <h4>${{ session()->get('coupon')['discount_amount'] }} €</h4>
                                            <hr>

                                            <strong>Grand Total : </strong>
                                            <h4 />${{ session()->get('coupon')['total_amount'] }} €</h4>
                                            <hr>
                                        @else
                                            <strong>SubTotal: </strong>
                                            <h4>{{ $cartTotal }} €</h4>
                                            <hr>

                                            <strong>Grand Total : </strong>
                                            <h4>{{ $cartTotal }} €</h4>
                                            <hr>
                                        @endif
                                    </tr>
                                </tbody>
                                <div class="payment ml-30">
                                   
                                </div>
                            </table>
                        </table>
                    </div>
                </div>

            </div>
            {{-- <div class="col-lg-5">
            </div> --}}
        </div>
    </div>
</main>

@endsection
