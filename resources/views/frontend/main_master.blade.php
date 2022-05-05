<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/slider-range.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=4.0') }}" />
    <!-- Toast js script -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.body.header')

    <!-- ============================================== HEADER : END ============================================== -->

    @yield('content')

    <!-- ============================================== FOOTER  ============================================== -->

    @include('frontend.body.footer')
    <!-- ============================================== FOOTER : END ============================================== -->
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="assets/imgs/theme/loading.gif" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slider-range.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.j') }}s"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.j') }}s"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=4.0') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=4.0') }}"></script>
    <!-- SWEET ALERT -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- Toast js script -->
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
            }
        @endif
    </script>

    <!-- Add to Cart Product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px;right:100px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal" style="display: none"
                        aria-label="Close" id="closeModel">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;"
                                    id="pimage">
                            </div>
                        </div><!-- // end col md -->
                        <br>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong class="text-danger">
                                        <span id="pprice"></span>€
                                    </strong>
                                    <del id="oldprice"></del>
                                </li>
                                <li class="list-group-item">Product Code : <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                                <li class="list-group-item">Stock
                                    <span class="badge badge-pill badge-success" id="aviable"
                                        style="background: green;color:white"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout"
                                        style="background: red;color:white"></span>

                                </li>
                            </ul>
                        </div><!-- // end col md -->
                        <div class="col-md-4">
                            {{-- <div class="form-group" id="colorArea">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color">

                                </select>
                            </div> <!-- // end form group --> --}}
                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select class="form-control" id="size" name="size">
                                </select>
                            </div> <!-- // end form group -->
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" value="1" min="1">
                            </div> <!-- // end form group -->
                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mb-3" onclick="addToCart()">Add to
                                Cart</button>
                        </div><!-- // end col md -->
                    </div> <!-- // end row -->
                </div> <!-- // end modal Body -->
            </div>
        </div>
    </div>
    <!-- End Add to Cart Product Modal -->

    <script type="text/javascript">
        // PRODUCT VIEW MODAL \\

        //dans le header on va mettre un token pour éviter les attaques csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        //Start product View With Modal

        // le onclick est démodé il faudrai essayer un adventlistener !
        //la fonction va prendre l'id du produt grace au onclick et on va récuper toute les données
        // qu'on a mit dans notre controller grace a la route
        function productView(id) {
            //alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    //console.log(data)

                    //fait référence a l'id du span pour le nom du produit
                    //dans le controller on a choisit les données qu'on veut par exemple le nom du produit
                    //on fera donc data.product.product_name_en
                    $('#pname').text(data.product.product_name_en);
                    $('#price').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pimage').attr('src', '/' + data.product.product_thambnail);

                    $('#product_id').val(id);
                    $('#qty').val(1);


                    //on prend la color qu'on a mit dans le controller
                    //on choisit le formulaire

                    // PRODUCT PRICE \\

                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.discount);
                        $('#oldprice').text(data.product.selling_price);
                    }

                    /// STOCK \\\
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');

                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    }



                    //// COLOR \\\\
                    // if (data.product.category.category_name_en === 'Clothes') {
                    //     $('select[name="color"]').empty();
                    //     $.each(data.color, function(key, value) {
                    //         $('select[name="color"]').append('<option value=" ' + value + ' "> ' +
                    //             value + ' </option>');
                    //     })
                    //     $('#colorArea').show();
                    // } else {
                    //     $('#colorArea').hide();
                    // }

                    //// SIZE \\\\
                    if (data.product.category.category_name_en === 'Clothes') {
                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value=" ' + value + ' "> ' +
                                value + ' </option>');
                        })
                        $('#sizeArea').show();
                    } else {
                        $('select[name="size"]').empty();
                        $('#sizeArea').hide();
                    }

                }
            })
            // END PRODUCT VIEW MODAL \\

        }
        //START ADD TO CART \\

        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart()
                    if ($("#closeModel").click()) {
                        $('#exampleModal').removeClass('show');
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }

                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }
                    }

                    console.log(data);
                }
            })
        }

        //END ADD TO CART \\
    </script>

    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)
                    var miniCart = ""
                    $('span[id=cartSubTotal]').text(response.cartTotal)
                    $('span[id=cartQty]').text(response.cartQty)

                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest"
                                                    src="/${value.options.image}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">${value.name}</a></h4>
                                            <h3><span> </span>${value.price}€ * ${value.qty}</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fi-rs-cross-small" ></i></a>
                                        </div>`
                    });
                    $('#miniCart').html(miniCart);
                }
            })
        }
        miniCart();
        //MINI CART REMOVE FUNCTION \\

        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }

        //MINI CART REMOVE END FUNCTION \\
    </script>

    {{-- WHISLIT --}}
    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,

                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            })
        }
    </script>
    {{-- END WHISLIT --}}

    {{-- LOAD WISHLIST DATA --}}
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get-wishlist-product',
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response, function(key, value) {
                        rows += `<tr class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="exampleCheckbox1" value="" />
                                        <label class="form-check-label" for="exampleCheckbox1"></label>
                                    </td>
                                    <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}"
                                            alt="#" /></td>
                                    <td class="product-des product-name">
                                        <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name_en}</a></h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        ${value.product.discount_price == null
                                        ? `${value.product.selling_price}€`
                                        :
                                        `${(value.product.selling_price) - (value.product.discount_price)}€ <span class="text-danger">(${value.product.selling_price}€)</span>`
                                        }
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <span class="stock-status in-stock mb-0"> In Stock </span>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Add Cart" id="${value.product_id}" onclick="productView(this.id)">Add to cart</button>

                                    </td>
                                    <td class="action text-center" data-title="Remove">
                                        <a id="${value.id}" onclick="wishListRemove(this.id)" class="text-body"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>`
                    });

                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();

        // REMOVE WISHLIST \\
        function wishListRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }

        // END REMOVE WISHLIST \\
    </script>
    {{-- END LOAD WISHLIST DATA --}}

    {{-- LOAD CARTPAGE DATA --}}
    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    var totalCart = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="/${value.options.image}" style="width:60px;height:60px" alt="product-image"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">
                                        ${value.name}
                                         ${value.options.size != null
                                            ?`(${value.options.size})`
                                            :``
                                        }</a>
                                        </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                <td class="price" data-title="Price">
                                   ${value.price}€
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                ${value.qty >1
                                                    ?`<a href="#" class="qty-down"><i class="fi-rs-angle-small-down"  id="${value.rowId}" onclick="cartDecrement(this.id)"></i></a>`

                                                    :`<a href="#" class="qty-down"><i class="fi-rs-angle-small-down" disabled=""></i></a>`
                                                }

                                                <span class="qty-val">${value.qty}</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up" id="${value.rowId}" onclick="cartIncrement(this.id)"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                <td>
                                    <strong>${value.subtotal}€</strong>
                                </td>
                                <td class="action text-center" data-title="Remove"><a id="${value.rowId}" onclick="cartPageRemove(this.id)" class="text-body"><i class="fi-rs-trash"></i></a></td>
                            </tr>`
                        totalCart += `<h4 class="text-brand text-end">€</h4>`
                    });
                    $('#cartPage').html(rows);
                    $('#subTotal').html(totalCart);
                }
            })
        }
        cart();

        // REMOVE CARTPAGE \\
        function cartPageRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }

        // END REMOVE CART PAGE \\

        // CART INCREMENT \\

        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                }
            });
        }

        // End CART INCREMENT \\

        // CART INCREMENT \\

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                }
            });
        }

        // End CART INCREMENT \\
    </script>
    {{-- END LOAD CARTPAGE DATA --}}

    {{-- APPLY COUPOON --}}
    <script type="text/javascript">
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            })
        }

        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {}
            })
        }
    </script>
    {{-- END APPLY COUPOON --}}

</body>

</html>
