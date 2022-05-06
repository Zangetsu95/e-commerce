@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
    Stripe Payment
@endsection
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

</style>

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
                                    <form action="{{ route('stripe') }}" method="post" id="payment-form">
                                        @csrf
                                        <div class="form-row">
                                            <label for="card-element">
                                                Credit or debit card
                                            </label>

                                            <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary">Submit Payment</button>
                                    </form>

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

<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51KhHQpEAgR4E4ZKpGrxH1jhGPYORAwRJ2XPj2PQ77i0tPBCRd6g9gZ214yDNDb71qAAg6yJi2nhyB2GHXaAQXKBX00a6qZQzqN');
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>
@endsection
