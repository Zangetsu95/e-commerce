@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
    Checkout Page
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
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    {{-- <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart --}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                    <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                        {{-- <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an
                                    account?</span> <a href="#loginform" data-bs-toggle="collapse"
                                    class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                        </div> --}}
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                {{-- <p class="mb-30 font-sm">If you have shopped with us before, please enter your details
                                    below. If you are a new customer, please proceed to the Billing &amp; Shipping
                                    section.</p> --}}
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox"
                                                    id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember
                                                        me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <form method="post" class="apply-coupon">
                            <input type="text" placeholder="Enter Coupon Code...">
                            <button class="btn  btn-md" name="login">Apply Coupon</button>
                        </form>
                    </div> --}}
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="POST" action="{{ route('checkout-store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="shipping_name" value="{{ Auth::user()->name }}" required=""
                                    name="fname" placeholder="Name *">
                            </div>

                            {{-- <div class="form-group col-lg-6">
                                <input type="text" name="shipping_email" required="" name="lname" placeholder="Division Select *">
                            </div> --}}

                            <div class="form-group col-lg-6">
                                <div class="controls">
                                    <select name="division_id" class="form-control" required="">
                                        <option value="" selected="" disabled="">Select Division</option>
                                        @foreach ($divisions as $item)
                                            <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="shipping_email" value="{{ Auth::user()->email }}" required=""
                                    placeholder="Email *">
                            </div>
                            {{-- <div class="form-group col-lg-6">
                                <input type="text" name="billing_address2" required="" placeholder="DISTRICT">
                            </div> --}}
                            <div class="form-group col-lg-6">
                                <div class="controls">
                                    <select name="district_id" class="form-control" required="">
                                        <option value="" selected="" disabled="">Select District</option>
                                        @foreach ($divisions as $item)
                                            <option value="{{ $item->id }}">{{ $item->district_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="shipping_phone" value="{{ Auth::user()->phone }}" required=""
                                    placeholder="Number *">
                            </div>
                            <div class="form-group col-lg-6">
                                <div class="controls">
                                    <select name="state_id" class="form-control" required="">
                                        <option value="" selected="" disabled="">Select State</option>
                                        @foreach ($divisions as $item)
                                            <option value="{{ $item->id }}">{{ $item->state_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" name="post_code" type="text" name="zipcode"
                                    placeholder="Postcode / ZIP *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="notes" placeholder="Adress *">
                            </div>
                        </div>
                        <div class="payment ml-30">
                            <h4 class="mb-30">Payment</h4>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" value="stripe" required="" type="radio" name="payment_option"
                                        id="exampleRadios3" checked="">
                                    <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                        data-target="#bankTranfer" aria-controls="bankTranfer">Stripe</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" value="cash" type="radio" name="payment_option"
                                        id="exampleRadios4" checked="">
                                    <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                        data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" value="card" type="radio" name="payment_option"
                                        id="exampleRadios5" checked="">
                                    <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                        data-target="#paypal" aria-controls="paypal">Card</label>
                                </div>
                            </div>
                            <div class="payment-logo d-flex">
                                <img class="mr-15" src="" alt="">
                                <img class="mr-15" src="" alt="">
                                <img class="mr-15" src="" alt="">
                                <img src="assets/imgs/theme/icons/payment-zapper.svg" alt="">
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i
                                    class="fi-rs-sign-out ml-15"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @foreach ($carts as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img
                                                src="{{ asset($item->options->image) }}"
                                                style="height:50px;witdh:50px" alt="product-image"></td>
                                        <td>
                                            <h6 class="w-160 mb-5"><a href="shop-product-full.html"
                                                    class="text-heading">{{ $item->name }}</a></h6></span>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                        </td>
                                        @if ($item->options->size != null)
                                            <td>
                                                <h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6>
                                                <h5 class="text-muted pl-20 pr-20"> {{ $item->options->size }}</h6>
                                            </td>
                                        @else
                                            <td>
                                                <h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6>
                                            </td>
                                        @endif
                                        <td>
                                            <h4 class="text-brand">{{ $item->price }}€</h4>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <table>
                                <tbody>
                                    <tr>
                                        @if (Session::has('coupon'))
                                            <strong>SubTotal: </strong>
                                            <h4>{{ $cartTotal }}</h4>
                                            <hr>

                                            <strong>Coupon Name : </strong>
                                            <h4>{{ session()->get('coupon')['coupon_name'] }} </h4>
                                            <h4>( {{ session()->get('coupon')['coupon_discount'] }} % ) </h4>
                                            <hr>

                                            <strong>Coupon Discount : </strong>
                                            <h4>{{ session()->get('coupon')['discount_amount'] }} €</h4>
                                            <hr>

                                            <strong>Grand Total : </strong>
                                            <h4 />{{ session()->get('coupon')['total_amount'] }} €</h4>
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
                            </table>
                        </table>
                    </div>
                </div>
                {{-- <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios3" checked="">
                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios4" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios5" checked="">
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                data-target="#paypal" aria-controls="paypal">Online Getway</label>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="" alt="">
                        <img class="mr-15" src="" alt="">
                        <img class="mr-15" src="" alt="">
                        <img src="assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    <a href="#" class="btn btn-fill-out btn-block mt-30">Place an Order<i
                            class="fi-rs-sign-out ml-15"></i></a>
                </div> --}}
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').empty();
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' +
                                value.id + '">' + value.state_name + '</option>'
                                );
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
</script>
@endsection
