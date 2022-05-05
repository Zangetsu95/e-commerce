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
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('backend.coupons.view_coupon',compact('coupons'));
    }
}
