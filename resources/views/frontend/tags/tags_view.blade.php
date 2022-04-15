@extends('frontend.main_master')
@section('content')
@section('title')
    Tag Wise Product
@endsection

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop <span></span> Fillter
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-30">
        <div class="row">
            <div class="col-lg-12">
                <a class="shop-filter-toogle" href="#">
                    <span class="fi-rs-filter mr-5"></span>
                    Filters
                    <i class="fi-rs-angle-small-down angle-down"></i>
                    <i class="fi-rs-angle-small-up angle-up"></i>
                </a>
                <div class="shop-product-fillter-header">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 mb-lg-0 mb-md-2 mb-sm-2">
                            <div class="card">
                                <h5 class="mb-30">By Categories</h5>
                                <div class="categories-dropdown-wrap font-heading">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="#collapse{{ $category->id }}"> <img
                                                        src="assets/imgs/theme/icons/category-1.svg" alt="" />
                                                    @if (session()->get('language') == 'french')
                                                        {{ $category->category_name_fr }}
                                                    @else
                                                        {{ $category->category_name_en }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @php
                            /*
                                groupby va prendre une seul fois le tag pour ne pas répéter
                                on choisit alors les tags qu'on veut prendre
                            */

                            $tags_en = App\Models\Product::groupBy('product_tags_en')
                                ->select('product_tags_en')
                                ->get();

                            $tags_fr = App\Models\Product::groupBy('product_tags_fr')
                                ->select('product_tags_fr')
                                                            ->get();

                        @endphp
                        <div class="col-xl-3 col-lg-6 col-md-6 mb-lg-0 mb-md-2 mb-sm-2">
                            <div class="card">
                                <h5 class="mb-30">By Tags</h5>
                                <div class="sidebar-widget widget-tags">
                                    <ul class="tags-list">
                                        <li class="hover-up">
                                            @if (session()->get('language') == 'french')
                                            @foreach ( $tags_fr as $tag )
                                            <a href="{{ url('product/tag/'.$tag->product_tags_fr) }}">
                                                <i class="fi-rs-cross mr-10">
                                                    </i> {{ $tag->product_tags_fr }}</a>
                                        </li>
                                        @endforeach
                                        @else
                                        @foreach ( $tags_en as $tag )
                                        <li class="hover-up">
                                            <a href="{{ url('product/tag/'.$tag->product_tags_en) }}">
                                                <i class="fi-rs-cross mr-10">
                                                    </i> {{ $tag->product_tags_en }}</a>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 mb-lg-0 mb-md-5 mb-sm-5">
                            <div class="card">
                                <h5 class="mb-10">By Price</h5>
                                <div class="sidebar-widget price_range range">
                                    <div class="price-filter mb-20">
                                        <div class="price-filter-inner">
                                            <div id="slider-range" class="mb-20"></div>
                                            <div class="d-flex justify-content-between">
                                                <div class="caption">From: <strong id="slider-range-value1"
                                                        class="text-brand"></strong></div>
                                                <div class="caption">To: <strong id="slider-range-value2"
                                                        class="text-brand"></strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="exampleCheckbox211" value="" />
                                        <label class="form-check-label" for="exampleCheckbox211"><span>$0.00 - $20.00
                                            </span></label>
                                        <br />
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="exampleCheckbox22" value="" />
                                        <label class="form-check-label" for="exampleCheckbox22"><span>$20.00 - $40.00
                                            </span></label>
                                        <br />
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="exampleCheckbox23" value="" />
                                        <label class="form-check-label" for="exampleCheckbox23"><span>$40.00 - $60.00
                                            </span></label>
                                        <br />
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="exampleCheckbox24" value="" />
                                        <label class="form-check-label" for="exampleCheckbox24"><span>$60.00 - $80.00
                                            </span></label>
                                        <br />
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="exampleCheckbox25" value="" />
                                        <label class="form-check-label" for="exampleCheckbox25"><span>Over
                                                $100.00</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">29</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach ( $products as $product )
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6" id="collapse">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                        <img class="default-img"
                                            src="{{ asset($product->product_thambnail) }}" alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                            class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">
                                    @if (session()->get('language') == 'french')
                                        {{ $product->product_name_fr }}
                                    @else
                                        {{ $product->product_name_en }}
                                    @endif
                                </a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    {{-- <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span> --}}
                                </div>
                                <div class="product-card-bottom">
                                    @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                        @endphp
                                    @if($product->discount_price == NULL)
                                    <div class="product-price">
                                        <span>{{ $product->selling_price }}€</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span>{{ $amount }}€</span>
                                        <span class="old-price">{{ $product->selling_price }}€</span>
                                    </div>

                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--end product card-->

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
