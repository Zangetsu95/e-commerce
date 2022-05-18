<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Illuminate\Contracts\Mail\Mailable;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        //https://stripe.com/docs/payments/charges-api
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys

        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        \Stripe\Stripe::setApiKey('sk_test_51KhHQpEAgR4E4ZKpsfYiNvYy9s7lhDpO37fMfjncrjp8rv82ic4pzaUKqU8Mwp9VnFhGq4yvS9fkSn694d4KjrPx00X4BVB4go');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'eur',
            'description' => 'ShinSekaiManga',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,

            //SSM abréviation du nom du site
            //mt_rand va générer un numéro de facture
            'invoice_no' => 'SSM' . mt_rand(10000000, 99999999),
            // date month year
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);

        // avec le package ,le content va récuper le contenu du panier
        //on fait un foreach pour récuper les données du panier et les insert dans la db
        $carts = Cart::content();
        $color = null;
        $size = null;
        foreach ($carts as $item) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $item->id,
                'color' => $item->options->color,
                'size' => $item->options->size,
                'qty' => $item->qty,
                'price' => $item->price,
                'created_at' => Carbon::now(),
            ]);
        }

        //Send mail
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        //on envoit $data dans le model Mail:orderMail
        Mail::to($request->email)->send(new OrderMail($data));


        //ne pas oublier de supprimer le coupon de la session si on avait mit un
        if (Session::has('coupon')) {
            Session::forget();
        }

        //après que le paiement passe on supprimer le panier
        Cart::destroy();

        $notification = array(
            'message' => 'Payment accepted !',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }
}
