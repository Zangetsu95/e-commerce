@extends('frontend.main_master')
@section('content')

@section('title')
ShinSekai Manga World
@endsection

    <main class="main">
        <section class="home-slider position-relative mb-30">
            <div class="home-slide-cover">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    @foreach ($sliders as $slider)
                        <div class="single-hero-slider rectangle single-animation-wrap"
                            style="background-image: url({{ asset($slider->slider_img) }})">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    {{ $slider->title }}
                                </h1>
                                <p class="mb-65"> {{ $slider->description }}</p>
                                {{-- <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </section>
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                    <section class="product-tabs section-padding position-relative">
                        <div class="section-title style-2">
                            <h3>New Products</h3>
                            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                        data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                        aria-selected="true">All
                                </li>
                                @foreach ($categories as $category)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link inactive" id="nav-tab-one" data-bs-toggle="tab"
                                            data-bs-target="#category{{ $category->id }}" type="button" role="tab"
                                            aria-controls="tab-one"
                                            aria-selected="true">
                                            @if (session()->get('language') == 'french')
                                            {{ $category->category_name_fr }}
                                            @else
                                            {{ $category->category_name_en }}
                                            @endif
                                        </button>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!--End nav-tabs-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row product-grid-4">
                                    {{-- FOREACH PRODUCT ALL --}}
                                    @foreach ($products as $product)
                                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap mb-30">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                            <img class="default-img"
                                                                src=" {{ asset($product->product_thambnail) }} " alt="" />
                                                            <img class="hover-img"
                                                                src=" {{ asset($product->product_thambnail) }}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Add To Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)" class="action-btn"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn"
                                                            href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                        <a aria-label="Quick view" class="action-btn"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                                class="fi-rs-eye"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                            @if (session()->get('language') == 'french')
                                                                {{ $product->product_name_fr }}
                                                            @else
                                                                {{ $product->product_name_en }}
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                            @if (session()->get('language') == 'french')
                                                                {{ $product->product_name_fr }}
                                                            @else
                                                                {{ $product->product_name_en }}
                                                            @endif
                                                        </a>
                                                    </h2>
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
                                                    {{-- Afficher le prix avec la réduction --}}
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp

                                                    <div class="product-card-bottom">
                                                        @if($product->discount_price == NULL)
                                                        <div class="product-price">
                                                            <span>{{ $product->selling_price }}€</span>
                                                        </div>
                                                        <div class="add-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"  >
                                                            <a class="add" ><i
                                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                        </div>
                                                        @else
                                                        <div class="product-price">
                                                            <span>{{ $amount }}€</span>
                                                            <span class="old-price">{{ $product->selling_price }}€</span>
                                                        </div>

                                                        <div class="add-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"  >
                                                            <a class="add" ><i
                                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                    {{-- END FOREACH PRODUCT ALL --}}
                                    <!--end product card-->
                                </div>
                                <!--End product-grid-4-->

                            </div>

                            {{-- FOREACH FIND ID CATEGORY --}}
                            @foreach ($categories as $category)
                                <div class="tab-pane" id="category{{ $category->id }}">
                                    <div class="tab-pane" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                        <div class="row product-grid-4">
                                            @php
                                                $catwiseProduct = App\Models\Product::where('category_id', $category->id)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
                                            @endphp
                                            {{-- FORELSE FIND PRODUCT FOR CATEGORY --}}
                                            @forelse ($catwiseProduct as $product)
                                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                                    <div class="product-cart-wrap mb-30">
                                                        <div class="product-img-action-wrap">
                                                            <div class="product-img product-img-zoom">
                                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                                    <img class="default-img"
                                                                        src=" {{ asset($product->product_thambnail) }} "
                                                                        alt="" />
                                                                    <img class="hover-img"
                                                                        src=" {{ asset($product->product_thambnail) }}"
                                                                        alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-action-1">
                                                                <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i
                                                                        class="fi-rs-heart"></i></a>
                                                                <a aria-label="Compare" class="action-btn"
                                                                    href="shop-compare.html"><i
                                                                        class="fi-rs-shuffle"></i></a>
                                                                <a aria-label="Quick view" class="action-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#quickViewModal"><i
                                                                        class="fi-rs-eye"></i></a>
                                                            </div>
                                                            <div
                                                                class="product-badges product-badges-position product-badges-mrg">
                                                                <span class="hot">Hot</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-content-wrap">
                                                            <div class="product-category">
                                                                <a
                                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                                    @if (session()->get('language') == 'french')
                                                                        {{ $product->product_name_fr }}
                                                                    @else
                                                                        {{ $product->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <h2><a
                                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                                    @if (session()->get('language') == 'french')
                                                                        {{ $product->product_name_fr }}
                                                                    @else
                                                                        {{ $product->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </h2>
                                                            <div class="product-rate-cover">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 90%"></div>
                                                                </div>
                                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                            </div>
                                                            <div>
                                                                <span class="font-small text-muted">By <a
                                                                        href="vendor-details-1.html">NestFood</a></span>
                                                            </div>
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = ($amount/$product->selling_price) * 100;
                                                            @endphp
                                                            <div class="product-card-bottom">
                                                                @if($product->discount_price == NULL)
                                                                <div class="product-price">
                                                                    <span>{{ $product->selling_price }}€</span>
                                                                </div>
                                                                <div class="add-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"  >
                                                                    <a class="add" ><i
                                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                                </div>
                                                                @else
                                                                <div class="product-price">
                                                                    <span>{{ $amount }}€</span>
                                                                    <span class="old-price">{{ $product->selling_price }}€</span>
                                                                </div>

                                                                <div class="add-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"  >
                                                                    <a class="add" ><i
                                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <h5 class="text-danger"> NO product found</h5>
                                            @endforelse
                                            {{-- END FORELESE FIND PRODUCT FOR CATEGORY --}}
                                            <!--end product card-->

                                        </div>
                                    </div>
                                    <!--End product-grid-4-->

                                </div>
                            @endforeach
                        </div>
                        <!--End tab-content-->
                    </section>

                    {{-- //////////////  FEATURED PRODUCT \\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <!--Products Tabs-->
                    <section class="section-padding pb-5">
                        <div class="section-title">
                            <h3 class="">Featured Product</h3>
                            <a class="show-all" href="">
                                All Deals
                                <i class="fi-rs-angle-right"></i>
                            </a>
                        </div>
                        <div class="row">
                            @foreach ( $featured as $product )
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                <img src="{{ asset($product->product_thambnail) }}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                @if (session()->get('language') == 'french')
                                                {{ $product->product_name_fr }}
                                                @else
                                                {{ $product->product_name_en }}
                                                @endif
                                            </a>
                                            </h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            {{-- <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">NestFood</a></span>
                                            </div> --}}
                                            @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = ($amount/$product->selling_price) * 100;
                                        @endphp
                                        @if($product->discount_price == NULL)
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>{{ $product->selling_price }}€</span>
                                                </div>
                                                <div class="add-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"  >
                                                    <a class="add" ><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>{{ $amount }}€</span>
                                                    <span class="old-price">{{ $product->selling_price }}€</span>
                                                </div>
                                                <div class="add-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"  >
                                                    <a class="add" ><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </section>
                    {{-- //////////////   END FEATURED PRODUCT \\\\\\\\\\\\\\\\\\\\\\\\ --}}

                    {{-- //////////////  HOT DEALS PRODUCT \\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <section class="section-padding pb-5">
                        <div class="section-title">
                            <h3 class="">Hot Deals Product</h3>
                            <a class="show-all" href="">
                                All Deals
                                <i class="fi-rs-angle-right"></i>
                            </a>
                        </div>
                        <div class="row">
                            @foreach ( $hot as $product )
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                <img src="{{ asset($product->product_thambnail) }}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                                @if (session()->get('language') == 'french')
                                                {{ $product->product_name_fr }}
                                                @else
                                                {{ $product->product_name_en }}
                                                @endif
                                            </a>
                                            </h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            {{-- <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">NestFood</a></span>
                                            </div> --}}
                                            @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = ($amount/$product->selling_price) * 100;
                                        @endphp
                                        @if($product->discount_price == NULL)
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>{{ $product->selling_price }}€</span>
                                                </div>
                                                <div class="add-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"  >
                                                    <a class="add" ><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>{{ $amount }}€</span>
                                                    <span class="old-price">{{ $product->selling_price }}€</span>
                                                </div>
                                                <div class="add-cart" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"  >
                                                    <a class="add" ><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </section>
                    {{-- //////////////  END HOT DEALS PRODUCT \\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    {{-- <section class="banners">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-img">
                                    <img src="assets/imgs/banner/banner-1.png" alt="" />
                                    <div class="banner-text">
                                        <h4>
                                            Everyday Fresh & <br />Clean with Our<br />
                                            Products
                                        </h4>
                                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                                class="fi-rs-arrow-small-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-img">
                                    <img src="assets/imgs/banner/banner-2.png" alt="" />
                                    <div class="banner-text">
                                        <h4>
                                            Make your Breakfast<br />
                                            Healthy and Easy
                                        </h4>
                                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                                class="fi-rs-arrow-small-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-md-none d-lg-flex">
                                <div class="banner-img mb-sm-0">
                                    <img src="assets/imgs/banner/banner-3.png" alt="" />
                                    <div class="banner-text">
                                        <h4>The best Organic <br />Products Online</h4>
                                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                                class="fi-rs-arrow-small-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--End banners--> --}}
                </div>

                {{-- /////////////// PRODUCT TAG \\\\\\\\\\\\\\\\\\\\  --}}
                @include('frontend.common.product_tags')
                {{-- ////////////// PRODUCT TAG END \\\\\\\\\\\\\\\\\  --}}
            </div>
        </div>

        <section class="popular-categories section-padding">
            <div class="container">
                <div class="section-title">
                    <div class="title">
                        <h3>Shop by Categories.. Coming soon</h3>
                        {{-- <a class="show-all" href="shop-grid-right.html">
                            All Categories
                            <i class="fi-rs-angle-right"></i>
                        </a> --}}
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow"
                        id="carausel-8-columns-arrows"></div>
                </div>
                {{-- <div class="carausel-8-columns-cover position-relative">
                    <div class="carausel-8-columns" id="carausel-8-columns">
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Milks and <br />Dairies</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Wines & <br />
                                    Alcohol</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Clothing & <br />Beauty</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Pet Foods <br />& Toy</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Packaged <br />fast food</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Baking <br />material</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Vegetables <br />& tubers</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Fresh <br />Seafood</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6>
                                <a href="shop-grid-right.html">Noodles <br />Rice</a>
                            </h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6><a href="shop-grid-right.html">Fastfood</a></h6>
                        </div>
                        <div class="card-1">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="shop-grid-right.html"><img src=""
                                        alt="" /></a>
                            </figure>
                            <h6><a href="shop-grid-right.html">Ice cream</a></h6>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>

        <!--End category slider-->
        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                        <h4 class="section-title style-1 mb-30 animated animated">Special Offer</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($special_offer as $product )

                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                        <img src="{{ $product->product_thambnail }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                            @if (session()->get('language') == 'french')
                                                {{ $product->product_name_fr }}
                                            @else
                                                {{ $product->product_name_en }}
                                            @endif
                                        </a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp
                                @if($product->discount_price == NULL)
                                    <div class="product-price">
                                        <span>{{ $product->selling_price }}€</span>
                                    </div>
                                @else
                                <div class="product-price">
                                    <span>{{ $amount }}€</span>
                                    <span class="old-price">{{ $product->selling_price }}€</span>
                                </div>
                                @endif
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                        <h4 class="section-title style-1 mb-30 animated animated">Special Deals</h4>
                        <div class="product-list-small animated animated">
                            @foreach ( $special_deals as $product )
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                        <img src="{{ $product->product_thambnail }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                                            @if (session()->get('language') == 'french')
                                                {{ $product->product_name_fr }}
                                            @else
                                                {{ $product->product_name_en }}
                                            @endif
                                        </a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp
                                @if($product->discount_price == NULL)
                                    <div class="product-price">
                                        <span>{{ $product->selling_price }}€</span>
                                    </div>
                                @else
                                <div class="product-price">
                                    <span>{{ $amount }}€</span>
                                    <span class="old-price">{{ $product->selling_price }}€</span>
                                </div>
                                @endif
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block">
                        <h4 class="section-title style-1 mb-30 animated animated">Recently added..Coming soon</h4>
                        {{-- <div class="product-list-small animated animated">
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src=""
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Pepperidge Farm Farmhouse Hearty White Bread</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src=""
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Organic Frozen Triple Berry Blend</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src=""
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Oroweat Country Buttermilk Bread</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div> --}}
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Rated...Coming Soon</h4>
                        {{-- <div class="product-list-small animated animated">
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src=""
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Foster Farms Takeout Crispy Classic Buffalo
                                            Wings</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src=""
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                            Corn</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img src=""
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">All Natural Italian-Style Chicken Meatballs</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                </div>
                            </article>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->
    </main>
@endsection
