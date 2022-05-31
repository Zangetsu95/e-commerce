<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend/assets/imgs/shop/product-16-2.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend/assets/imgs/shop/product-16-1.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend/assets/imgs/shop/product-16-3.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend/assets/imgs/shop/product-16-4.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend/assets/imgs/shop/product-16-5.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend/assets/imgs/shop/product-16-6.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend/assets/imgs/shop/product-16-7.jpg') }}"
                                        alt="product image" />
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-3.jpg') }}&"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-4.jpg') }}&"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-5.jpg') }}&"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-6.jpg') }}&"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-7.jpg') }}&"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-8.jpg') }}&"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-9.jpg') }}&"
                                        alt="product image" /></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of
                                    Change Organic Quinoa, Brown</a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i
                                            class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="page-about.htlm">About Us</a></li>
                            @auth
                                <li><a href="{{ route('dashboard') }}">My Account</a></li>
                                <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                {{-- <li><a href="shop-order.html">Order Tracking</a></li> --}}
                            @endauth

                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery without contacting the courier</li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Need help? Call Us: <strong class="text-brand"> + 1800 900</strong></li>
                            <li>
                                <a class="language-dropdown-active" href="#">
                                    @if (session()->get('language') == 'french')
                                        Séléctioner la langue
                                    @else
                                        Choose a language
                                    @endif
                                    <i class="fi-rs-angle-small-down"></i>
                                </a>
                                <ul class="language-dropdown">
                                    @if (session()->get('language') == 'french')
                                        <li>
                                            <a href="{{ route('english.language') }}">English</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('french.language') }}">Français</a>
                                        </li>
                                    @endif


                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $settings = App\Models\WebSetting::find(1);
    @endphp
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="index.html"><img src="{{ asset($settings->logo) }}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form method="post" action="{{ route('product-search') }}">
                            @csrf
                            <input type="text" id="search" onfocus="search_result_show()" onblur="search_result_hide()"
                                name="search" placeholder="Search for items..." />
                            <button class="search-button" type="submit"></button>
                        </form>
                        <div id="searchProducts"></div>
                    </div>

                    <div class="header-action-right">
                        <div class="header-action-2">
                            {{-- <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div> --}}
                            {{-- <div class="header-action-icon-2">
                                <a href="shop-compare.html">
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-compare.svg') }}" />
                                    <span class="pro-count blue">3</span>
                                </a>
                                <a href="shop-compare.html"><span class="lable ml-0">Compare</span></a>
                            </div> --}}
                            <div class="header-action-icon-2">
                                <a href="{{ route('wishlist') }}">
                                    <img class="svgInject" alt="wishlist"
                                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count blue"></span>
                                </a>
                                <a href="{{ route('wishlist') }}"><span class="lable">Wishlist</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="shop-cart.html">
                                    <img alt="Nest"
                                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue" id="cartQty"> </span>
                                </a>
                                <a href="shop-cart.html"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li id="miniCart">
                                            {{-- MINI CART AJAX --}}

                                            {{-- END MINI CART AJAX --}}
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span id="cartSubTotal">€</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('mycart') }}" class="outline">View
                                                cart</a>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                @auth
                                    <a href="page-account.html"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="{{ route('dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My
                                                    Account</a></li>
                                            {{-- <li><a href="{{ route('logout')}}"><i class="fi fi-rs-sign-out mr-10"></i>Log out</a></li> --}}
                                        </ul>
                                    </div>
                                @else
                                    <a href="page-account.html"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="{{ route('login') }}"><i
                                                        class="fi fi-rs-sign-out mr-10"></i>Sign out</a></li>
                                        </ul>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}"
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    {{-- <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Browse</span> All
                            Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Milks and
                                            Dairies</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Clothing &
                                            beauty</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Pet Foods &
                                            Toy</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Baking
                                            material</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Fresh Fruit</a>
                                    </li>
                                </ul>
                                <ul class="end">
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Wines & Drinks</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Fresh Seafood</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Fast food</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="" alt="" />Vegetables</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="g" alt="" />Bread and
                                            Juice</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="" alt="" />Milks and
                                                Dairies</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="" alt="" />Clothing &
                                                beauty</a>
                                        </li>
                                    </ul>
                                    <ul class="end">
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="" alt="" />Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="" alt="" />Fresh Seafood</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span
                                    class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div> --}}
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">


                        <nav>
                            <ul>
                                <li class="hot-deals"><img
                                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-hot.svg') }}"
                                        alt="hot deals" /><a href="{{ route('hot-deals') }}">Hot Deals</a></li>
                                <li>
                                    <a class="active" href="{{ route('home') }}">Home <i
                                            class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('blog-home') }}">About</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('blog-home') }}">Blog</a>
                                </li>

                                @php
                                    //Getting data from the category Table
                                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();

                                @endphp

                                @foreach ($categories as $category)
                                    @php
                                        //Getting data from the SUBCATEGORY Table
                                        $subCategories = App\Models\SubCategory::where('category_id', $category->id)
                                            ->orderBy('subcategory_name_en', 'ASC')
                                            ->get();

                                    @endphp

                                    @if ($category->category_name_en == 'Books')
                                        <li>
                                            <a href="{{ route('books') }}">
                                                @if (session()->get('language') == 'french')
                                                    {{ $category->category_name_fr }}
                                                @else
                                                    {{ $category->category_name_en }}
                                                @endif
                                                <i class="fi-rs-angle-down"></i>
                                            </a>
                                            <ul class="sub-menu">
                                                @foreach ($subCategories as $subCategory)
                                                    @if ($subCategory->subcategory_name_en == 'Blu-ray and DVD')
                                                        <li><a href="{{ route('books-dvd') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Mangas')
                                                        <li><a href="{{ route('books-mangas') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Shonen Jump')
                                                        <li><a href="{{ route('books-shonen') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Others')
                                                        <li><a href="{{ route('books-others') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @elseif($category->category_name_en == 'Clothes')
                                        <li>
                                            <a href="{{ route('clothes') }}">
                                                @if (session()->get('language') == 'french')
                                                    {{ $category->category_name_fr }}
                                                @else
                                                    {{ $category->category_name_en }}
                                                @endif
                                                <i class="fi-rs-angle-down"></i>
                                            </a>
                                            <ul class="sub-menu">
                                                @foreach ($subCategories as $subCategory)
                                                    @if ($subCategory->subcategory_name_en == 'Mask')
                                                        <li><a href="{{ route('clothes-mask') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'T-shirt')
                                                        <li><a href="{{ route('clothes-tshirt') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Pulls')
                                                        <li><a href="{{ route('clothes-pulls') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Cap')
                                                        <li><a href="{{ route('clothes-cap') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Bags')
                                                        <li><a href="{{ route('clothes-bags') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Others')
                                                        <li><a href="{{ route('clothes-others') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @elseif($category->category_name_en == 'Miniature')
                                        <li>
                                            <a href="{{ route('miniature') }}">
                                                @if (session()->get('language') == 'french')
                                                    {{ $category->category_name_fr }}
                                                @else
                                                    {{ $category->category_name_en }}
                                                @endif
                                                <i class="fi-rs-angle-down"></i>
                                            </a>
                                            <ul class="sub-menu">
                                                @foreach ($subCategories as $subCategory)
                                                    @if ($subCategory->subcategory_name_en == 'Miniature Manga')
                                                        <li><a href="{{ route('miniature-manga') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Funko Pop')
                                                        <li><a href="{{ route('miniature-funko') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Others')
                                                        <li><a href="{{ route('miniature-others') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        @elseif($category->category_name_en == 'Goodies')
                                        <li>
                                            <a href="{{ route('goodies') }}">
                                                @if (session()->get('language') == 'french')
                                                    {{ $category->category_name_fr }}
                                                @else
                                                    {{ $category->category_name_en }}
                                                @endif
                                                <i class="fi-rs-angle-down"></i>
                                            </a>
                                            <ul class="sub-menu">
                                                @foreach ($subCategories as $subCategory)
                                                    @if ($subCategory->subcategory_name_en == 'Posters')
                                                        <li><a href="{{ route('goodies-posters') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Mug')
                                                        <li><a href="{{ route('goodies-mug') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Pillows')
                                                        <li><a href="{{ route('goodies-pillows') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'snacks')
                                                        <li><a href="{{ route('goodies-snacks') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Others')
                                                        <li><a href="{{ route('goodies-others') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        @elseif($category->category_name_en == 'Trading Cards')
                                        <li>
                                            <a href="{{ route('trading') }}">
                                                @if (session()->get('language') == 'french')
                                                    {{ $category->category_name_fr }}
                                                @else
                                                    {{ $category->category_name_en }}
                                                @endif
                                                <i class="fi-rs-angle-down"></i>
                                            </a>
                                            <ul class="sub-menu">
                                                @foreach ($subCategories as $subCategory)
                                                    @if ($subCategory->subcategory_name_en == 'Dragon Ball Z')
                                                        <li><a href="{{ route('trading-dragon') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'YUGIHO')
                                                        <li><a href="{{ route('trading-yugi') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Pokemon')
                                                        <li><a href="{{ route('trading-pokemon') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @elseif ($subCategory->subcategory_name_en == 'Others')
                                                        <li><a href="{{ route('trading-others') }}">
                                                                @if (session()->get('language') == 'french')
                                                                    {{ $subCategory->subcategory_name_fr }}
                                                                @else
                                                                    {{ $subCategory->subcategory_name_en }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                                {{-- <li>
                                    <a href="#">Vendors <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="vendors-grid.html">Vendors Grid</a></li>
                                        <li><a href="vendors-list.html">Vendors List</a></li>
                                        <li><a href="vendor-details-1.html">Vendor Details 01</a></li>
                                        <li><a href="vendor-details-2.html">Vendor Details 02</a></li>
                                        <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                        <li><a href="vendor-guide.html">Vendor Guide</a></li>
                                    </ul>
                                </li>
                                <li class="position-static">
                                    <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Fruit & Vegetables</a>
                                            <ul>
                                                <li><a href="shop-product-right.html">Meat & Poultry</a></li>
                                                <li><a href="shop-product-right.html">Fresh Vegetables</a></li>
                                                <li><a href="shop-product-right.html">Herbs & Seasonings</a></li>
                                                <li><a href="shop-product-right.html">Cuts & Sprouts</a></li>
                                                <li><a href="shop-product-right.html">Exotic Fruits & Veggies</a></li>
                                                <li><a href="shop-product-right.html">Packaged Produce</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Breakfast & Dairy</a>
                                            <ul>
                                                <li><a href="shop-product-right.html">Milk & Flavoured Milk</a></li>
                                                <li><a href="shop-product-right.html">Butter and Margarine</a></li>
                                                <li><a href="shop-product-right.html">Eggs Substitutes</a></li>
                                                <li><a href="shop-product-right.html">Marmalades</a></li>
                                                <li><a href="shop-product-right.html">Sour Cream</a></li>
                                                <li><a href="shop-product-right.html">Cheese</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Meat & Seafood</a>
                                            <ul>
                                                <li><a href="shop-product-right.html">Breakfast Sausage</a></li>
                                                <li><a href="shop-product-right.html">Dinner Sausage</a></li>
                                                <li><a href="shop-product-right.html">Chicken</a></li>
                                                <li><a href="shop-product-right.html">Sliced Deli Meat</a></li>
                                                <li><a href="shop-product-right.html">Wild Caught Fillets</a></li>
                                                <li><a href="shop-product-right.html">Crab and Shellfish</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="shop-product-right.html"><img
                                                        src="assets/imgs/banner/banner-menu.png" alt="Nest" /></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>
                                                        Don't miss<br />
                                                        Trending
                                                    </h3>
                                                    <div class="menu-banner-price">
                                                        <span class="new-price text-success">Save to 50%</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href="shop-product-right.html">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>25%</span>
                                                        off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog-category-grid.html">Blog <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                        <li><a href="blog-category-list.html">Blog Category List</a></li>
                                        <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                        <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                        <li>
                                            <a href="#">Single Post <i class="fi-rs-angle-right"></i></a>
                                            <ul class="level-menu level-menu-modify">
                                                <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                                <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                                <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Pages <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-contact.html">Contact</a></li>
                                        <li><a href="page-account.html">My Account</a></li>
                                        <li><a href="page-login.html">Login</a></li>
                                        <li><a href="page-register.html">Register</a></li>
                                        <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                        <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="page-terms.html">Terms of Service</a></li>
                                        <li><a href="page-404.html">404 Page</a></li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="page-contact.html">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>1900 - 888<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest"
                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="shop-cart.html">
                                <img alt="Nest"
                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div id="miniCart">

                                        </div>
                                        {{-- MINI CART AJAX --}}

                                        {{-- END MINI CART AJAX --}}
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span id="cartSubTotal">€</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="{{ route('mycart') }}">View cart</a>
                                        <a href="{{ route('checkout') }}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="post" action="{{ route('product-search') }}">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="index.html">Home</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                                <li><a href="index-5.html">Home 5</a></li>
                                <li><a href="index-6.html">Home 6</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="shop-grid-right.html">shop</a>
                            <ul class="dropdown">
                                <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                        <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                        <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                        <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-filter.html">Shop – Filter</a></li>
                                <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                <li><a href="shop-cart.html">Shop – Cart</a></li>
                                <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                <li><a href="shop-compare.html">Shop – Compare</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop Invoice</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-invoice-1.html">Shop Invoice 1</a></li>
                                        <li><a href="shop-invoice-2.html">Shop Invoice 2</a></li>
                                        <li><a href="shop-invoice-3.html">Shop Invoice 3</a></li>
                                        <li><a href="shop-invoice-4.html">Shop Invoice 4</a></li>
                                        <li><a href="shop-invoice-5.html">Shop Invoice 5</a></li>
                                        <li><a href="shop-invoice-6.html">Shop Invoice 6</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Vendors</a>
                            <ul class="dropdown">
                                <li><a href="vendors-grid.html">Vendors Grid</a></li>
                                <li><a href="vendors-list.html">Vendors List</a></li>
                                <li><a href="vendor-details-1.html">Vendor Details 01</a></li>
                                <li><a href="vendor-details-2.html">Vendor Details 02</a></li>
                                <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                <li><a href="vendor-guide.html">Vendor Guide</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Mega menu</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Dresses</a></li>
                                        <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                        <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="shop-product-right.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Jackets</a></li>
                                        <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                        <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                        <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                        <li><a href="shop-product-right.html">Tablets</a></li>
                                        <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                        <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog-category-fullwidth.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                <li><a href="blog-category-list.html">Blog Category List</a></li>
                                <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product Layout</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                        <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                        <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="page-about.html">About Us</a></li>
                                <li><a href="page-contact.html">Contact</a></li>
                                <li><a href="page-account.html">My Account</a></li>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="page-terms.html">Terms of Service</a></li>
                                <li><a href="page-404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                        alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2021 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>
<!--End header-->
<style>
    .search-style-2 {
        position: relative;
    }

    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }

</style>
<script>
    function search_result_hide() {
        $("#searchProducts").slideUp();
    }

    function search_result_show() {
        $("#searchProducts").slideDown();
    }
</script>
