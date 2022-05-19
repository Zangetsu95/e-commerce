<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
Use Carbon\Carbon;
use App\Models\Review;

class ReviewController extends Controller
{
   /**
    * It takes the product id from the request, validates the request, and then inserts the review into
    * the database
    * @param {Request} request - The request object.
    */
    public function AddReview(Request $request)
    {
       /* Getting the product id from the request. */
        $product = $request->product_id;

       /* Validating the request. */
        $request->validate([
            'summary' => 'required',
            'comment' => 'required'
        ]);

        /* Inserting the review into the database. */
        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
			'message' => 'Review Will be Approved By an Admin !',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
}
