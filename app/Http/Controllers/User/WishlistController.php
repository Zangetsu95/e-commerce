<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function ViewWishList()
    {

        return view('frontend.wishlist.view_wishlist');
    }
}
