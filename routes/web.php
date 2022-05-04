<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;

use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Admin all route*/
Route::group(['prefix' => 'admin', 'middlewlare' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function () {

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    Route::get('admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

    Route::get('admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

    Route::post('admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
});// end middleware Admin

/*User All route */
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {

    $id = Auth::user()->id;
    $user = User::find($id);

    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');

Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


/* Admin Brand All route */

Route::prefix('brand')->group(function () {

    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');

    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');

    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');

    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});

/* Admin category All route */

Route::prefix('category')->group(function () {

    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

    // Admin Sub Category All

    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');

    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    /* Admin Sub subcategory All route */

    Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);

    Route::post('/sub//sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');

    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');

    Route::post('/sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');

    Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});


// Admin Product Routes
Route::prefix('product')->group(function () {

    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');

    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');

    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');

    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product-edit');

    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');

    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');

    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');

    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiple.delete');

    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product-active');

    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product-inactive');

    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
});

/* Admin Slider All route */

Route::prefix('slider')->group(function () {

    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');

    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');

    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider-active');

    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider-inactive');
});


///////////// FRONTEND ALL ROUTES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/* Multi LAnguage All Routes */

Route::get('/language/french', [LanguageController::class, 'French'])->name('french.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

/* PRODUCT DETAILS PAGE Url */
//comme on a utilisé le {{ url('')}} pas besoin de faire un name
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

/* Product Tags */
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);

/* Product View Modal AJAX */
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

/* Product add to cart AJAX */
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

/* Get Data for the mini  cart AJAX */
Route::get('/product/mini/cart', [CartController::class, 'AddToMiniCart']);

/* Remove mini  cart AJAX */
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

/* Add to Whislist AJAX */
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishList']);



Route::group(['prefix' => 'user','middleware' => ['user','auth'],'namespace' => 'User'],function(){
/* Wishlist Page */
Route::get('/wishlist', [WishlistController::class, 'ViewWishList'])->name('wishlist');

Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishListProduct']);

Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishListProduct']);

/* View Cart */
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);

});


/* cart page routes */
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/user/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);

Route::get('/cart-increment/{id}', [CartPageController::class, 'CartIncrement']);

Route::get('/cart-decrement/{id}', [CartPageController::class, 'CartDecrement']);


