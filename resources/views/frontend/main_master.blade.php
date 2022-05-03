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
                                <select class="form-control" id="id" name="size">
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

</body>

</html>
