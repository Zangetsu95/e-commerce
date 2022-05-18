@extends('frontend.main_master')
@section('content')

@section('title')
    Blog Category Page
@endsection

<main class="main">
    <div class="page-header mt-30 mb-75">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">Blog & News</h1>
                        <div class="breadcrumb">
                            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Blog & News
                        </div>
                    </div>
                    {{-- <div class="col-xl-9 text-end d-none d-xl-block">
                        <ul class="tags-list">
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Shopping</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter mb-50 pr-30">
                        <div class="totall-product">
                            <h2>
                                All Articles
                            </h2>
                        </div>
                        <div class="sort-by-product-area">
                            {{-- <div class="sort-by-cover mr-10">
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
                            </div> --}}
                            {{-- <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span>Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Newest</a></li>
                                        <li><a href="#">Most comments</a></li>
                                        <li><a href="#">Release Date</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="loop-grid pr-30">
                        <div class="row">
                            @foreach ($blogPost as $blog)
                                <article class="col-xl-4 col-lg-6 col-md-6 text-center hover-up mb-30 animated">
                                    <div class="post-thumb">
                                        <a href="{{ route('post-details',$blog->id) }}">
                                            <img class="border-radius-15" src="{{ $blog->post_image }}" alt="{!! $blog->post_title_en !!}" />
                                        </a>
                                        <div class="entry-meta">
                                            <a class="entry-meta meta-2" href="{{ route('post-details',$blog->id) }}"><i
                                                    class="fi-rs-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="entry-content-2">
                                        <h6 class="mb-10 font-sm"><a class="entry-meta text-muted"
                                                href="{{ route('post-details',$blog->id) }}"></a></h6>
                                        <h4 class="post-title mb-15">
                                            @if (session()->get('language') == 'french')
                                                <a href="{{ route('post-details',$blog->id) }}">{!! $blog->post_title_fr !!}</a>
                                            @else
                                                <a href="{{ route('post-details',$blog->id) }}">{!! $blog->post_title_en !!}</a>
                                            @endif
                                        </h4>
                                        <div class="entry-meta font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span
                                                    class="post-on mr-10">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                                {{-- <span class="hit-count has-dot mr-10">126k Views</span>
                                            <span class="hit-count has-dot">4 mins read</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar mb-50 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30">Blog Category</h5>
                            @foreach ($blogCategory as $category)
                                <ul class="list-group">
                                    <a href="{{ url('blog/category/post/'.$category->id) }}"><li class="list-group-item">
                                        @if (session()->get('language') == 'fr')
                                            {{ $category->blog_category_name_fr }}
                                        @else
                                            {{ $category->blog_category_name_en }}
                                        @endif
                                    </li></a>
                                    <br>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
