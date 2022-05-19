<?php

/* Importing all the controllers that we have created. */

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
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\WebSettingsController;
use App\Http\Controllers\Backend\ReturnController;

use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;

use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;


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
}); // end middleware Admin

// Admin Order All Routes

Route::prefix('orders')->group(function () {

    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');

    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending-order-details');

    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');

    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

    /*Change status for order */
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingConfirm'])->name('pending-confirm');

    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm-processing');

    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing-picked');

    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked-shipped');

    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped-delivered');

    /* invoice download */

    Route::get('/invoice/download/{order_id}', [OrderController::class, 'InvoiceDownloadAdmin'])->name('invoice-download');
});

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

/*ADMIN COUPONS */
Route::prefix('coupons')->group(function () {

    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');

    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon-store');

    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon-edit');

    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon-update');

    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon-delete');
});

/*ADMIN SHIPPING DIVISION */
Route::prefix('shipping')->group(function () {

    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division-store');

    Route::get('/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division-edit');

    Route::post('/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division-update');

    Route::get('/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division-delete');
});

/*ADMIN SHIPPING DISTRICT */
Route::prefix('district')->group(function () {

    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');

    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district-store');

    Route::get('/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district-edit');

    Route::post('/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district-update');

    Route::get('/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district-delete');
});

/*ADMIN SHIPPING DISTRICT */
Route::prefix('state')->group(function () {

    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');

    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state-store');

    Route::get('/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state-edit');

    Route::post('/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state-update');

    Route::get('/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state-delete');
});


/* ADMIN REPORTS */
Route::prefix('reports')->group(function () {

    Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');

    Route::post('/search/by/date', [ReportController::class, 'ReportDate'])->name('search-date');

    Route::post('/search/by/month', [ReportController::class, 'ReportMonth'])->name('search-month');

    Route::post('/view', [ReportController::class, 'ReportYear'])->name('search-year');
});


/* ADMIN GET ALL USERS */
Route::prefix('allusers')->group(function () {

    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
});

/* ADMIN GET ALL USERS */
Route::prefix('blog')->group(function () {

    /* Blog CATEGORY */

    Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog-category');

    Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blog-category-store');

    Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog-category-edit');

    Route::post('/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blog-category-update');

    Route::get('/delete/{id}', [BlogController::class, 'BlogCategoryDelete'])->name('blog-category-delete');

    Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog-category-edit');

    Route::post('/category/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blog-category-update');

    /* Blog POST */

    Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('blog-add');

    Route::get('/all/post', [BlogController::class, 'AllBlogPost'])->name('blog-list');

    Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('blog-store');

    Route::get('/post/edit/{id}', [BlogController::class, 'BlogPostEdit'])->name('blog-post-edit');

    Route::post('/post/update', [BlogController::class, 'BlogPostUpdate'])->name('blog-post-update');

    Route::get('/post/delete/{id}', [BlogController::class, 'BlogPostDelete'])->name('blog-post-delete');
});


/* WebSite Settings */
route::prefix('settings')->group(function () {
    Route::get('/web', [WebSettingsController::class, 'WebSettings'])->name('site-settings');

    Route::post('/web/update', [WebSettingsController::class, 'WebSettingsUpdate'])->name('site-settings-update');
});

/* SEO Settings */
route::prefix('settings')->group(function () {
    Route::get('/seo', [WebSettingsController::class, 'SeoSettings'])->name('seo-settings');

    Route::post('/seo/update', [WebSettingsController::class, 'SeoSettingsUpdate'])->name('seo-settings-update');
});

/* Return Product */
route::prefix('return')->group(function () {
    Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return-request');

    Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnApprove'])->name('return-approve');

    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all-request');

});

//////////////////////////////////////////////// FRONTEND ALL ROUTES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
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



Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    /* Wishlist Page */
    Route::get('/wishlist', [WishlistController::class, 'ViewWishList'])->name('wishlist');

    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishListProduct']);

    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishListProduct']);

    /* View Cart */
    Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

    Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);

    Route::get('/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);

    /*Stripe payment */

    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe');

    /* My orders */

    Route::get('/orders', [AllUserController::class, 'MyOrders'])->name('my-orders');

    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

    /* Return product & showing return  product + cancel */

    Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return-order');

    Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('orders-list-return');

    Route::get('/cancel/order', [AllUserController::class, 'CancelOrder'])->name('cancel-orders');
});


/* cart page routes */
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/user/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);

Route::get('/cart-increment/{id}', [CartPageController::class, 'CartIncrement']);

Route::get('/cart-decrement/{id}', [CartPageController::class, 'CartDecrement']);

/* COUPON ROUTE */
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

Route::post('/coupon-calculation', [CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

/* CHECKOUT ROUTE */

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);

Route::post('/checkout/Store', [CheckoutController::class, 'CheckoutStore'])->name('checkout-store');


/* Blog Frontend */

Route::get('/blog', [HomeBlogController::class, 'GetBlog'])->name('blog-home');

Route::get('/blog/details/{id}', [HomeBlogController::class, 'GetBlogDetails'])->name('post-details');

Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'BlogCategoryPost']);
