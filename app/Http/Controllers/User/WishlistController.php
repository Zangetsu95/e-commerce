<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function ViewWishList()
    {

        return view('frontend.wishlist.view_wishlist');
    }

    public function GetWishListProduct()
    {
        /*
            we take all the product where the user add to his wishlist
        */
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

        return response()->json($wishlist);
    }

    public function RemoveWishListProduct($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();

        return response()->json(['success' => 'Successfully Product Remove from WishList']);

    }
}
