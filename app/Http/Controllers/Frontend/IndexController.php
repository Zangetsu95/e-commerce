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
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(20)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(4)->get();
        $hot = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(4)->get();
        $special_offer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $hot_deals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $speacial_deals = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(3)->get();



        /*
            L'utilisation de la requête skip en laravel est utilisée pour sauter les données
            return $skip_category->id;
            die();
            avec le skip on va montrer les produits actif qui match avec le category id du skip
            $skip_category_0 = Category::skip(0)->first();
            $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
        */

        return view('frontend.index', compact(
            'sliders',
            'categories',
            'products',
            'featured',
            'hot',
            'special_offer',
            'special_deals',
            'hot_deals',
            'speacial_deals'
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
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request)
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

        return view('frontend.profile.change_password', compact('user'));
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

    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id', $id)->get();

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_fr = $product->product_color_fr;
        $product_color_fr = explode(',', $color_fr);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_fr = $product->product_size_fr;
        $product_size_fr = explode(',', $size_fr);

        $cat_id = $product->category_id;

        return view(
            'frontend.product.product_details',
            compact('product', 'multiImg', 'product_color_en', 'product_color_fr', 'product_size_en', 'product_size_fr', 'cat_id')
        );
    }

    public function TagWiseProduct($tag)
    {
        /*
        On va prendre que les produits actifs
        l'autre where veut dire quand le tag va matcher avec celui qu'on va cliquer
        */
        $products = Product::where('status', 1)
            ->where('product_tags_en', $tag)
            ->where('product_tags_fr', $tag)
            ->orderBy('id', 'DESC')
            ->paginate(20);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }

    public function ProductViewAjax($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color = explode(',', $color_en);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        $discount = $product->selling_price - $product->discount_price;

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
            'discount' => $discount
        ));
    }


    /**
     * It takes the search item from the search form and searches the database for products with a name
     * that matches the search item
     * @param {Request} request - The request object.
     */
    public function ProductSearch(Request $request)
    {

        $request->validate(["search" => "required"]);

        $item = $request->search;

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('product_name_en', 'LIKE', "%$item%")->get();
        return view('frontend.product.search', compact('products', 'categories'));
    }

    public function ProductSearchAdvanced(Request $request)
    {
        $request->validate(["search" => "required"]);

        $item = $request->search;

        $products = Product::where('product_name_en', 'LIKE', "%$item%")->select('product_name_en', 'product_thambnail', 'selling_price', 'id', 'product_slug_en')->limit(5)->get();
        return view('frontend.product.search_product', compact('products'));
    }


    /*---------------------------------------- */

    public function ProductHot()
    {
        $products = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.hot_deals', compact('products'));
    }

    /*---------------- links for books --------------------------------*/
    public function ProductBooks()
    {

        $products = Product::where('category_id', 22)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.books.index', compact('products'));
    }

    public function ProductDVD()
    {
        $products = Product::where('subcategory_id', 20)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.books.dvd', compact('products'));
    }

    public function ProductManga()
    {
        $products = Product::where('subcategory_id', 17)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.books.manga', compact('products'));
    }

    public function ProductShonen()
    {
        $products = Product::where('subcategory_id', 18)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.books.shonen', compact('products'));
    }

    public function ProductCalendar()
    {
        $products = Product::where('subcategory_id', 19)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.books.calendar', compact('products'));
    }

    public function ProductOthers()
    {
        $products = Product::where('subcategory_id', 35)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.books.other', compact('products'));
    }
    /*----------------------- links for clothes ---------------------------*/
    public function ProductClothes()
    {
        $products = Product::where('category_id', 18)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.clothes.index', compact('products'));
    }

    public function ProductMask()
    {
        $products = Product::where('subcategory_id', 21)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.clothes.mask', compact('products'));
    }

    public function ProductTshirt()
    {
        $products = Product::where('subcategory_id', 22)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.clothes.mask', compact('products'));
    }

    public function ProductPulls()
    {
        $products = Product::where('subcategory_id', 23)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.clothes.pulls', compact('products'));
    }

    public function ProductCap()
    {
        $products = Product::where('subcategory_id', 24)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.clothes.cap', compact('products'));
    }

    public function ProductBags()
    {
        $products = Product::where('subcategory_id', 25)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.clothes.bags', compact('products'));
    }

    public function ProductClothesOthers()
    {
        $products = Product::where('subcategory_id', 36)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.clothes.others', compact('products'));
    }

    /*----------------------- links for miniature ---------------------------*/
    public function ProductMiniature()
    {
        $products = Product::where('category_id', 19)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.miniature.index', compact('products'));
    }
    public function ProductMiniaOthers()
    {
        $products = Product::where('subcategory_id', 37)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.miniature.others', compact('products'));
    }
    public function ProductMiniatureManga()
    {
        $products = Product::where('subcategory_id', 27)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.miniature.manga', compact('products'));
    }

    public function ProductFunko()
    {
        $products = Product::where('subcategory_id', 31)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.miniature.manga', compact('products'));
    }

    /*----------------------- links for goodies ---------------------------*/
    public function ProductGoodies()
    {
        $products = Product::where('category_id', 20)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.goodies.index', compact('products'));
    }

    public function ProductGoodiesPosters()
    {
        $products = Product::where('subcategory_id', 26)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.goodies.posters', compact('products'));
    }

    public function ProductGoodiesMug()
    {
        $products = Product::where('subcategory_id', 27)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.goodies.mug', compact('products'));
    }

    public function ProductGoodiesPillows()
    {
        $products = Product::where('subcategory_id', 28)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.goodies.pillows', compact('products'));
    }

    public function ProductGoodiesSnacks()
    {
        $products = Product::where('subcategory_id', 29)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.goodies.snacks', compact('products'));
    }

    public function ProductGoodiesOthers()
    {
        $products = Product::where('subcategory_id', 37)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.goodies.others', compact('products'));
    }

    /*----------------------- links for Trading ---------------------------*/

    public function ProductTrading()
    {
        $products = Product::where('category_id', 21)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.trading.index', compact('products'));
    }

    public function ProductTradingDragon()
    {
        $products = Product::where('subcategory_id', 32)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.trading.dragon', compact('products'));
    }

    public function ProductTradingYugi()
    {
        $products = Product::where('subcategory_id', 33)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.trading.yugi', compact('products'));
    }

    public function ProductTradingPokemon()
    {
        $products = Product::where('subcategory_id', 33)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.trading.pokemon', compact('products'));
    }

    public function ProductTradingOthers()
    {
        $products = Product::where('subcategory_id', 37)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.trading.others', compact('products'));
    }

    public function ProductFeatured()
    {
        $products = Product::where('featured', 1)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.product.featured', compact('products'));
    }
}
