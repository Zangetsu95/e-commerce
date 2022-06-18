<?php

/* Importing the classes that we will use in this controller. */
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    /**
     * It returns the view of the mycart page.
     * @returns A view
     */
    public function MyCart()
    {
        return view('frontend.wishlist.view_mycart');
    }

   /**
    * It returns a JSON response containing the cart content, the cart quantity and the cart total
    */
    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = number_format(Cart::total(),2);

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

   /**
    * It removes the product from the cart.
    * @param rowId - The unique identifier for the cart item.
    * @returns A JSON object with a success message.
    */
    public function RemoveCartProduct($rowId)
    {
        Cart::remove($rowId);

        //si la session a un coupon alors on le supprime
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        return response()->json(['success' => 'Product Remove from Your Cart']);
    }

    /**
     * It increments the quantity of a product in the cart
     * @param rowId - The rowId of the item you want to increment.
     */
    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);

        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            // on va regarde si la session possède un coupon et on modifiera le prix en temps réelles
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => number_format(Cart::total() * $coupon->coupon_discount / 100,2),
                'total_amount' => number_format(Cart::total() - Cart::total() * $coupon->coupon_discount / 100,2)
            ]);
        }

        return response()->json(['increment']);
    }

   /**
    * It decrements the quantity of the product in the cart
    * @param rowId - The unique identifier for the cart item.
    * @returns The response is being returned as a JSON object.
    */
    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);

        Cart::update($rowId, $row->qty - 1);

        // on va regarde si la session possède un coupon et on modifiera le prix en temps réelles
        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => number_format(Cart::total() * $coupon->coupon_discount / 100,2),
                'total_amount' => number_format(Cart::total() - Cart::total() * $coupon->coupon_discount / 100,2)
            ]);
        }

        return response()->json(['decrement']);
    }
}
