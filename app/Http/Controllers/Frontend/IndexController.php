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
        /*
            chaque variable correspondt a une chose en particulier
            on utilise le modèle adéquat avec le where pour matcher avec la DB
            On organise ca soit par DESC ou ASC au choix
            pour certaines variable on mettra une limite pour ne pas surchager
            ->get() pour récuper les données on oublie pas de la mettre dans le compact()
        */
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(4)->get();
        $hot = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(4)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

        /*
            L'utilisation de la requête skip en laravel est utilisée pour sauter les données
            return $skip_category->id;
            die();
            avec le skip on va montrer les produits actif qui match avec le category id du skip
            $skip_category_0 = Category::skip(0)->first();
            $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
        */

        return view('frontend.index',compact(
            'sliders','categories','products',
            'featured','hot','special_offer','special_deals',
        ));
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

    public function TagWiseProduct($tag)
    {
        /*
        On va prendre que les produits actifs
        l'autre where veut dire quand le tag va matcher avec celui qu'on va cliquer
        */
        $products = Product::where('status',1)
        ->where('product_tags_en',$tag)
        ->where('product_tags_fr',$tag)
        ->orderBy('id','DESC')
        ->paginate(20);
        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.tags.tags_view',compact('products','categories'));
    }
}
