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


   /**
    * It returns the order
    * @returns The return value of the function is the value of the last expression in the function
    * body.
    */
    /**
     * We are going to the table order and looking at the user id = the user connected
     */
    public function MyOrders()
    {
        //On va dans la table order et regarder l'user id = a l'user connecté
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        return view('frontend.user.order.order_view', compact('orders'));
    }


    /**
     * A function that is used to show the details of the order.
     * @param order_id - The order ID.
     */
    public function OrderDetails($order_id)
    {
        //https://github.com/barryvdh/laravel-dompdf
        //on va aller cherche l'oder spécifique qui correspond a l'id et a son utilisateur
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('frontend.user.order.order_details', compact('order', 'orderItem'));
    }

    /**
     * The above code is generating a PDF file from the view file
     * @param order_id - This is the order id of the order for which we want to generate the invoice.
     * @returns The above code is generating a PDF file from the view file.
     */
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


   /**
    * It returns the order.
    * @param {Request} request - The request object.
    * @param order_id - The ID of the order you want to return.
    * @returns The return value of the function is the value of the last expression in the function
    * body.
    */
    public function ReturnOrder(Request $request,$order_id)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);


        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my-orders')->with($notification);
    }

    /**
     * It returns the order list of the user.
     * @returns The return_order_view.blade.php file is being returned.
     */
    public function ReturnOrderList()
    {
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_order_view',compact('orders'));
    }
}
