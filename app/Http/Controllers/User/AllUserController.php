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
use App\Mail\OrderMail;
use Barryvdh\DomPDF\Facade\Pdf;


class AllUserController extends Controller
{
    public function MyOrders()
    {
        //On va dans la table order et regarder l'user id = a l'user connecté
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        return view('frontend.user.order.order_view', compact('orders'));
    }

    public function OrderDetails($order_id)
    {
        //https://github.com/barryvdh/laravel-dompdf
        //on va aller cherche l'oder spécifique qui correspond a l'id et a son utilisateur
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('frontend.user.order.order_details', compact('order', 'orderItem'));
    }

    public function InvoiceDownload($order_id)
    {
        //on va aller cherche l'oder spécifique qui correspond a l'id et a son utilisateur
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        // return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));

        //setpaper pour le format de page
        //set options tempdir & chroot pour acceder a l'image en local
        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
