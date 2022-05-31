<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function CouponView()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupons.view_coupon', compact('coupons'));
    }

   /**
    * A function that inserts the data into the database.
    * @param {Request} request - The request object.
    */
    public function CouponStore(Request $request)
    {
        //champs obligatoire du formulaire
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',

        ]);

        //inserer les datas dans la DB
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        //notification de réussite
        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CouponEdit($id)
    {
        //Aller sur le coupon avec le bon ID
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupons.edit_coupon', compact('coupons'));
    }


   /**
    * It updates the coupon with the id that is passed in the url.
    * @param {Request} request - The request object.
    * @param id - The id of the coupon you want to update.
    */
    public function CouponUpdate(Request $request, $id)
    {

        //Trouver le coupon avec son id et update seulement celui la
        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-coupon')->with($notification);
    }


   /**
    * It deletes a coupon from the database.
    * @param id - The id of the coupon you want to delete.
    */
    public function CouponDelete($id)
    {

        //trouver l'id du coupon et le supprimer
        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
