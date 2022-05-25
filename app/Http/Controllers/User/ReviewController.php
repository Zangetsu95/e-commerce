<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Carbon\Carbon;
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
            'comment' => 'required',
            'quality' => 'required'
        ]);

        /* Inserting the review into the database. */
        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'rating' => $request->quality,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Review Will be Approved By an Admin !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * It fetches all the reviews that are pending and displays them in the view.
     */
    public function SeeReview()
    {
        $review = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.review.review_see', compact('review'));
    }

    /**
     * It approves a comment.
     * @param id - The id of the review you want to approve.
     * @returns A redirect to the previous page with a success notification.
     */
    public function ApproveComment($id)
    {

        /* Updating the status of the review with the id of  to 1. */
        Review::where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * It fetches all the reviews that have a status of 1 and orders them by id in descending order.
     */
    public function PublishedReview()
    {
        $review = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backend.review.published_review', compact('review'));
    }


    /**
     * Delete Review
     * @param id - The id of the review you want to delete.
     */
    public function DeleteReview($id)
    {

        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
