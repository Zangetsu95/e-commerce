<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        //https://stripe.com/docs/payments/charges-api
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51KhHQpEAgR4E4ZKpsfYiNvYy9s7lhDpO37fMfjncrjp8rv82ic4pzaUKqU8Mwp9VnFhGq4yvS9fkSn694d4KjrPx00X4BVB4go');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999*100,
            'currency' => 'eur',
            'description' => 'ShinSekaiManga',
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]);

        dd($charge);
    }
}
