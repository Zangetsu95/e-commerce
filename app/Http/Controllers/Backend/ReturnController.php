<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ReturnController extends Controller
{
   /**
    * It returns the view of the return request page.
    * @returns The return request is being returned.
    */
    public function ReturnRequest()
    {
        /* Getting all the orders where the return_order is 1 and ordering them by id in descending
        order. */
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.return_order.return_request', compact('orders'));
    }

   /**
    * The above function is used to approve the return of the product.
    * @param order_id - The id of the order.
    * @returns The return of the product is succes !
    */
    public function ReturnApprove($order_id)
    {
       /* Updating the return_order column of the order table to 2. */
        Order::where('id',$order_id)->update(['return_order' => 2]);

        $notifications = array(
            'message' => 'The return of the product is succes !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifications);
    }

    public function ReturnAllRequest()
    {
        /* Getting all the orders where the return_order is 2 and ordering them by id in descending
                order. */
        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('backend.return_order.all_return_request', compact('orders'));
    }

}
