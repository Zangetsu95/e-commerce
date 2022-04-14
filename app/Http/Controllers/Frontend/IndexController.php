<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Slider;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        //on récupre les sliders mais pas tout donc on fait une limite de 3
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(4)->get();

        return view('frontend.index',compact('sliders','categories','products','featured'));
    }

    public function UserLogout()
    {
        Auth::logout();

        $notifications = array(
            'message' => 'User logout SuccessFuly !',
            'alert-type' => 'success'
        );


        return redirect()->route('login')->with($notifications);
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore (Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notifications = array(
            'message' => 'User Profile Updated SuccessFuly !',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notifications);
    }

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.change_password',compact('user'));
    }

    public function UserPasswordUpdate(Request $request)
    {

        $validateDAta = $request->validate([

            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');

        } else {

            return redirect()->back();

        }

    }

    public function ProductDetails($id,$slug)
    {
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id',$id)->get();

        return view('frontend.product.product_details',compact('product','multiImg'));
    }
}
