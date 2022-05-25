@extends('frontend.main_master')
@section('content')

@section('title')
    {{ $product->product_name_en }} Product Details
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .checked {
        color: orange;
    }

</style>

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                {{-- <span></span> <a href="shop-grid-right.html">Vegetables & tubers</a> <span></span> Seeds of Change Organic --}}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">

                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @foreach ($multiImg as $img)
                                                <figure class="border-radius-10" id="slide{{ $img->id }}">
                                                    <img src="{{ asset($img->photo_name) }}" alt="product image" />
                                                </figure>
                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->

                                        <div class="slider-nav-thumbnails">
                                            @foreach ($multiImg as $img)
                                                <div href="#slide{{ $img->id }}"><img
                                                        src="{{ asset($img->photo_name) }}" alt="product image" />
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        {{-- <span class="stock-status out-stock"> Sale Off </span> --}}
                                        <h2 class="title-detail" id="pname">
                                            @if (session()->get('language') == 'french')
                                                {{ $product->product_name_fr }}
                                            @else
                                                {{ $product->product_name_en }}
                                            @endif
                                        </h2>
                                        @php
                                            $reviewCount = App\Models\Review::where('product_id', $product->id)
                                                ->where('status', 1)
                                                ->latest()
                                                ->get();
                                            $avarage = App\Models\Review::where('product_id', $product->id)
                                                ->where('status', 1)
                                                ->avg('rating');
                                        @endphp

                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                @if ($avarage == 0)
                                                    <div class="product-rate d-inline-block">
                                                        No ratings yet
                                                    </div>
                                                @elseif($avarage == 1 || $avarage < 2)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 2 || $avarage < 3)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 3 || $avarage < 4)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 4 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 5 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                @endif
                                                <span class="font-small ml-5 text-muted"> {{ count($reviewCount) }}
                                                    Reviews</span>
                                            </div>
                                        </div>
                                        {{-- Afficher le prix avec la réduction --}}
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = ($product->discount_price / $product->selling_price) * 100;
                                            $percentage = round($discount);
                                        @endphp

                                        <div class="clearfix product-price-cover">
                                            @if ($product->discount_price == null)
                                                <div class="product-price primary-color float-left">
                                                    <span
                                                        class="current-price text-brand">{{ $product->selling_price }}€</span>
                                                </div>
                                            @else
                                                <div class="product-price primary-color float-left">
                                                    <span class="current-price text-brand">{{ $amount }}€</span>
                                                    <span>
                                                        <span
                                                            class="save-price font-md color3 ml-15">{{ $percentage }}%
                                                        </span>
                                                        <span
                                                            class="old-price font-md ml-15">{{ $product->selling_price }}€</span>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="short-desc mb-30">

                                        </div>
                                        <div class="attr-detail attr-size mb-30" id="size">
                                            @if ($product->category->category_name_en === 'Clothes')
                                                <strong class="mr-10">Size </strong>
                                                <ul class="list-filter size-filter font-small">
                                                    @foreach ($product_size_en as $item)
                                                        <li><a href="#">{{ $item }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div class="detail-extralink mb-50">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i
                                                        class="fi-rs-angle-small-down"></i></a>
                                                <span><input class="qty-val" type="text" id="qty" value="1"
                                                        min="1"></span>
                                                <a href="#" class="qty-up"><i
                                                        class="fi-rs-angle-small-up"></i></a>
                                            </div>

                                            <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart"
                                                    onclick="addToCart()"><i class="fi-rs-shopping-cart"></i>Add to
                                                    cart</button>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                {{-- <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </div>
                                        </div>
                                        {{-- <div class="font-xs">
                                            <ul class="mr-50 float-start">
                                                <li class="mb-5">Type: <span class="text-brand">Organic</span></li>
                                                <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                                <li>LIFE: <span class="text-brand">70 days</span></li>
                                            </ul>
                                            <ul class="float-start">
                                                <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                                <li class="mb-5">Tags: <a href="#" rel="tag">Snack</a>, <a href="#" rel="tag">Organic</a>, <a href="#" rel="tag">Brown</a></li>
                                                <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                                href="#Description">Description</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            {{-- <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a> --}}
                                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                                href="#Reviews">Reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        <div class="tab-pane fade show active" id="Description">
                                            @if (session()->get('language') == 'french')
                                                {!! $product->long_descp_fr !!}
                                            @else
                                                {!! $product->long_descp_en !!}
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="Additional-info">
                                            <table class="font-md">
                                                <tbody>
                                                    <tr class="stand-up">
                                                        <th>Stand Up</th>
                                                        <td>
                                                            <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="folded-wo-wheels">
                                                        <th>Folded (w/o wheels)</th>
                                                        <td>
                                                            <p>32.5″L x 18.5″W x 16.5″H</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="folded-w-wheels">
                                                        <th>Folded (w/ wheels)</th>
                                                        <td>
                                                            <p>32.5″L x 24″W x 18.5″H</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="door-pass-through">
                                                        <th>Door Pass Through</th>
                                                        <td>
                                                            <p>24</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="frame">
                                                        <th>Frame</th>
                                                        <td>
                                                            <p>Aluminum</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="weight-wo-wheels">
                                                        <th>Weight (w/o wheels)</th>
                                                        <td>
                                                            <p>20 LBS</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="weight-capacity">
                                                        <th>Weight Capacity</th>
                                                        <td>
                                                            <p>60 LBS</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="width">
                                                        <th>Width</th>
                                                        <td>
                                                            <p>24″</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="handle-height-ground-to-handle">
                                                        <th>Handle height (ground to handle)</th>
                                                        <td>
                                                            <p>37-45″</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="wheels">
                                                        <th>Wheels</th>
                                                        <td>
                                                            <p>12″ air / wide track slick tread</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="seat-back-height">
                                                        <th>Seat back height</th>
                                                        <td>
                                                            <p>21.5″</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="head-room-inside-canopy">
                                                        <th>Head room (inside canopy)</th>
                                                        <td>
                                                            <p>25″</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="pa_color">
                                                        <th>Color</th>
                                                        <td>
                                                            <p>Black, Blue, Red, White</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="pa_size">
                                                        <th>Size</th>
                                                        <td>
                                                            <p>M, S</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @php
                                            $reviewCount = App\Models\Review::where('product_id', $product->id)
                                                ->where('status', 1)
                                                ->latest()
                                                ->get();
                                            $avarage = App\Models\Review::where('product_id', $product->id)
                                                ->where('status', 1)
                                                ->avg('rating');
                                        @endphp
                                        <div class="tab-pane fade" id="Vendor-info">
                                            <div class="vendor-logo d-flex mb-30">
                                                <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                                                <div class="vendor-name ml-15">
                                                    <h6>
                                                        <a href="vendor-details-2.html">Noodles Co.</a>
                                                    </h6>
                                                    <div class="product-rate-cover text-end">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <span
                                                            class="font-small ml-5 text-muted">{{ count($reviewCount) }}
                                                            Reviews</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="contact-infor mb-50">
                                                <li><img src="assets/imgs/theme/icons/icon-location.svg"
                                                        alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave
                                                        undefined Kent, Utah 53127 United States</span></li>
                                                <li><img src="assets/imgs/theme/icons/icon-contact.svg"
                                                        alt="" /><strong>Contact Seller:</strong><span>(+91) -
                                                        540-025-553</span></li>
                                            </ul>
                                            <div class="d-flex mb-55">
                                                <div class="mr-30">
                                                    <p class="text-brand font-xs">Rating</p>
                                                    <h4 class="mb-0">92%</h4>
                                                </div>
                                                <div class="mr-30">
                                                    <p class="text-brand font-xs">Ship on time</p>
                                                    <h4 class="mb-0">100%</h4>
                                                </div>
                                                <div>
                                                    <p class="text-brand font-xs">Chat response</p>
                                                    <h4 class="mb-0">89%</h4>
                                                </div>
                                            </div>
                                            <p>
                                                Noodles & Company is an American fast-casual restaurant that offers
                                                international and American noodle dishes and pasta in addition to soups
                                                and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and
                                                is headquartered in Broomfield, Colorado. The company went public in
                                                2013 and recorded a $457 million revenue in 2017.In late 2018, there
                                                were 460 Noodles & Company locations across 29 states and Washington,
                                                D.C.
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="Reviews">
                                            @php
                                                $reviews = App\Models\Review::where('product_id', $product->id)
                                                    ->latest()
                                                    ->limit(5)
                                                    ->get();

                                            @endphp
                                            <!--Comments-->
                                            <div class="comments-area">
                                                <div class="row">

                                                    <div class="col-lg-8">
                                                        <h4 class="mb-30">No comment for this Product</h4>
                                                        @foreach ($reviews as $comment)
                                                            @if ($comment->status == 0)
                                                            @else
                                                                <h4 class="mb-30">Customer reviews</h4>
                                                                <div class="comment-list">
                                                                    <div
                                                                        class="single-comment justify-content-between d-flex mb-30">
                                                                        <div
                                                                            class="user justify-content-between d-flex">
                                                                            <div class="thumb text-center">
                                                                                <img style="border-radius: 50%"
                                                                                    src="{{ !empty($comment->user->profile_photo_path) ? url('upload/user_images/' . $comment->user->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                                                    width="80px;" height="80px;"><b></b>
                                                                                <a href="#"
                                                                                    class="font-heading text-brand">{{ $comment->summary }}</a>
                                                                            </div>
                                                                            <div class="desc">
                                                                                <div
                                                                                    class="d-flex justify-content-between mb-10">
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <span
                                                                                            class="font-xs text-muted">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        <span
                                                                                            class="font-xs text-muted">by
                                                                                            {{ $comment->user->name }}
                                                                                        </span>
                                                                                    </div>
                                                                                    @if ($comment->rating == null)
                                                                                    @elseif($comment->rating == 1)
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                    @elseif($comment->rating == 2)
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                    @elseif($comment->rating == 3)
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                    @elseif($comment->rating == 4)
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star"></span>
                                                                                    @elseif($comment->rating == 5)
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                        <span
                                                                                            class="fa fa-star checked"></span>
                                                                                    @endif
                                                                                </div>
                                                                                <p class="mb-10">
                                                                                    {{ $comment->comment }} <a
                                                                                        href="#"
                                                                                        class="reply">Reply</a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h4 class="mb-30">Customer reviews</h4>
                                                        <div class="d-flex mb-30">
                                                            <div class="product-rate d-inline-block mr-15">
                                                                <div class="product-rating" style="width: 90%"></div>
                                                            </div>
                                                            <h6>4.8 out of 5</h6>
                                                        </div>
                                                        <div class="progress">
                                                            <span>5 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100">50%</div>
                                                        </div>
                                                        <div class="progress">
                                                            <span>4 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100">25%</div>
                                                        </div>
                                                        <div class="progress">
                                                            <span>3 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                                aria-valuemax="100">45%</div>
                                                        </div>
                                                        <div class="progress">
                                                            <span>2 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                                aria-valuemax="100">65%</div>
                                                        </div>
                                                        <div class="progress mb-30">
                                                            <span>1 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                                aria-valuemax="100">85%</div>
                                                        </div>
                                                        <a href="#" class="font-xs text-muted">How are ratings
                                                            calculated?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--comment form-->
                                            @guest
                                                <h4 class="mb-15">You must be logged to make a review !</h4>
                                            @else
                                                <div class="comment-form">
                                                    <h4 class="mb-15">Add a review</h4>
                                                    <div class="product-rate d-inline-block mb-30"></div>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12">
                                                            <form class="form-contact comment_form" method="POST"
                                                                action="{{ route('review-add') }}" id="commentForm">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="cell-label">&nbsp;</th>
                                                                                <th>1 star</th>
                                                                                <th>2 stars</th>
                                                                                <th>3 stars</th>
                                                                                <th>4 stars</th>
                                                                                <th>5 stars</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="cell-label">Quality</td>
                                                                                <td><input style="height: 10px" type="radio"
                                                                                        name="quality"
                                                                                        class="radio" value="1">
                                                                                </td>
                                                                                <td><input style="height: 10px" type="radio"
                                                                                        name="quality"
                                                                                        class="radio" value="2">
                                                                                </td>
                                                                                <td><input style="height: 10px" type="radio"
                                                                                        name="quality"
                                                                                        class="radio" value="3">
                                                                                </td>
                                                                                <td><input style="height: 10px" type="radio"
                                                                                        name="quality"
                                                                                        class="radio" value="4">
                                                                                </td>
                                                                                <td><input style="height: 10px" type="radio"
                                                                                        name="quality"
                                                                                        class="radio" value="5">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table><!-- /.table .table-bordered -->
                                                                </div><!-- /.table-responsive -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="summary"
                                                                                id="name" type="text" placeholder="Title" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                                                placeholder="Write Comment"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="button button-contactForm">Submit
                                                                        Review</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mt-60">
                                <div class="col-12">
                                    <h2 class="section-title style-1 mb-30">Related products</h2>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html" tabindex="0">
                                                            <img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="" />
                                                            <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="shop-product-right.html" tabindex="0">Ulstra Bass Headphone</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span> </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html" tabindex="0">
                                                            <img class="default-img" src="assets/imgs/shop/product-3-1.jpg" alt="" />
                                                            <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="sale">-12%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="shop-product-right.html" tabindex="0">Smart Bluetooth Speaker</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span> </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$138.85 </span>
                                                        <span class="old-price">$145.8</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html" tabindex="0">
                                                            <img class="default-img" src="assets/imgs/shop/product-4-1.jpg" alt="" />
                                                            <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="new">New</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="shop-product-right.html" tabindex="0">HomeSpeak 12UEA Goole</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span> </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$738.85 </span>
                                                        <span class="old-price">$1245.8</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6 d-lg-block d-none">
                                            <div class="product-cart-wrap hover-up mb-0">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html" tabindex="0">
                                                            <img class="default-img" src="assets/imgs/shop/product-5-1.jpg" alt="" />
                                                            <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="shop-product-right.html" tabindex="0">Dadua Camera 4K 2021EF</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span> </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$89.8 </span>
                                                        <span class="old-price">$98.8</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                        <div class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30">Category.. Coming soon</h5>
                            {{-- <ul>
                                <li>
                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-1.svg" alt="" />Milks & Dairies</a><span class="count">30</span>
                                </li>
                                <li>
                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-2.svg" alt="" />Clothing</a><span class="count">35</span>
                                </li>
                                <li>
                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-3.svg" alt="" />Pet Foods </a><span class="count">42</span>
                                </li>
                                <li>
                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-4.svg" alt="" />Baking material</a><span class="count">68</span>
                                </li>
                                <li>
                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-5.svg" alt="" />Fresh Fruit</a><span class="count">87</span>
                                </li>
                            </ul> --}}
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <h5 class="section-title style-1 mb-30">Fill by price..Coming soon</h5>
                            {{-- <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" class="mb-20"></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                                        <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">Color</label>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                        <br />
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                                        <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                        <br />
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                                        <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                                    </div>
                                    <label class="fw-900 mt-15">Item Condition</label>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                        <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                        <br />
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                                        <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                        <br />
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                                        <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a> --}}
                        </div>
                        <!-- Product sidebar Widget -->
                        {{-- <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30">New products</h5>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#" />
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="shop-product-detail.html">Chen Cardigan</a></h5>
                                    <p class="price mb-0 mt-5">$99.50</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#" />
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="shop-product-detail.html">Chen Sweater</a></h6>
                                    <p class="price mb-0 mt-5">$89.50</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#" />
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="shop-product-detail.html">Colorful Jacket</a></h6>
                                    <p class="price mb-0 mt-5">$25</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                            <img src="assets/imgs/banner/banner-11.png" alt="" />
                            <div class="banner-text">
                                <span>Oganic</span>
                                <h4>
                                    Save 17% <br />
                                    on <span class="text-brand">Oganic</span><br />
                                    Juice
                                </h4>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-628b54fe2320575e"></script>

@endsection
