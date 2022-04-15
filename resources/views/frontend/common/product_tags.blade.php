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

<div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
    <div class="sidebar-widget widget-category-2 mb-30">
        <h5 class="section-title style-1 mb-30">Tags</h5>
        <ul>
            @if (session()->get('language') == 'french')
            @foreach ( $tags_fr as $tag )

            <li>
                <a href="{{ url('product/tag/'.$tag->product_tags_fr) }}">
                    {{ $tag->product_tags_fr }}
                </a>
            </li>
            @endforeach
            @else
            @foreach ( $tags_en as $tag )
            <li>
                <a href="{{ url('product/tag/'.$tag->product_tags_en) }}">
                    {{ $tag->product_tags_en }}
                </a>
            </li>
            @endforeach

            @endif
        </ul>

    </div>
    <!-- Fillter By Price -->
    {{-- <div class="sidebar-widget price_range range mb-30">
        <h5 class="section-title style-1 mb-30">Fill by price</h5>
        <div class="price-filter">
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
        <div class="list-group">
            <div class="list-group-item mb-10 mt-10">
                <label class="fw-900">Color</label>
                <div class="custome-checkbox">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1"
                        value="" />
                    <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                    <br />
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2"
                        value="" />
                    <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                    <br />
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3"
                        value="" />
                    <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                </div>
                <label class="fw-900 mt-15">Item Condition</label>
                <div class="custome-checkbox">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11"
                        value="" />
                    <label class="form-check-label" for="exampleCheckbox11"><span>New
                            (1506)</span></label>
                    <br />
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21"
                        value="" />
                    <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished
                            (27)</span></label>
                    <br />
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31"
                        value="" />
                    <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                </div>
            </div>
        </div>
        <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>
            Fillter</a>
    </div> --}}
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
    </div>
    <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
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
