@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            {{-- enctype="multipart/form-data" --}}
                            <form method="POST" action="{{ route('product-update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $products->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <!-- start 1st row  -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    {{ $brand->id == $products->brand_id ? 'selected' : '' }}>
                                                                    {{ $brand->brand_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control" >
                                                            <option value="" selected="" disabled="">Select Category
                                                            </option>

                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                                                    {{ $category->category_name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select SubCategory

                                                                @foreach ($subCategory as $sub)
                                                            <option value="{{ $sub->id }}"
                                                                {{ $sub->id == $products->subcategory_id ? 'selected' : '' }}>
                                                                {{ $sub->subcategory_name_en }}</option>
                                                            @endforeach


                                                            </option>

                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 1st row  -->
                                        <div class="row">
                                            <!-- start 2nd row  -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control" >
                                                            <option value="" selected="" disabled="">Select SubSubCategory

                                                                @foreach ($subSubCategory as $subSub)
                                                            <option value="{{ $subSub->id }}"
                                                                {{ $subSub->id == $products->subsubcategory_id ? 'selected' : '' }}>
                                                                {{ $subSub->subsubcategory_name_en }}</option>
                                                            @endforeach

                                                            </option>

                                                        </select>
                                                        @error('subsubcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control"
                                                            value="{{ $products->product_name_en }}">
                                                        @error('product_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name Fr <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_fr" class="form-control"
                                                           " value="{{ $products->product_name_fr }}">
                                                        @error('product_name_fr')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 2nd row  -->
                                        <div class="row">
                                            <!-- start 3RD row  -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control"
                                                            value="{{ $products->product_code }}">
                                                        @error('product_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control"
                                                            value="{{ $products->product_qty }}">
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_en" class="form-control"
                                                            value="{{ $products->product_tags_en }}"
                                                            data-role="tagsinput" >
                                                        @error('product_tags_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 3RD row  -->
                                        <div class="row">
                                            <!-- start 4th row  -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags Fr <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_fr" class="form-control"
                                                            value="{{ $products->product_tags_fr }}"
                                                            data-role="tagsinput" >
                                                        @error('product_tags_fr')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control"
                                                            value="{{ $products->product_size_en }}"
                                                            data-role="tagsinput">
                                                        @error('product_size_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size Fr <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_fr" class="form-control"
                                                            value="{{ $products->product_size_fr }}"
                                                            data-role="tagsinput">
                                                        @error('product_size_fr')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 4th row  -->

                                        <div class="row">
                                            <!-- start 5th row  -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Color En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en" class="form-control"
                                                            value="{{ $products->product_color_en }}"
                                                            data-role="tagsinput">
                                                        @error('product_color_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Color Fr <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_fr" class="form-control"
                                                            value="{{ $products->product_size_fr }}"
                                                            data-role="tagsinput">
                                                        @error('product_color_fr')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 5th row  -->

                                        <div class="row">
                                            <!-- start 6th row  -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control"
                                                            value="{{ $products->selling_price }}">
                                                        @error('selling_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control"
                                                            value="{{ $products->discount_price }}">
                                                        @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->


                                            <div class="col-md-4">
                                                {{-- <div class="form-group">
                                                    <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thambnail" class="form-control"
                                                            onchange="mainThamUrl(this)">
                                                        @error('product_thambnail')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="" id="mainThmb">
                                                    </div>
                                                </div> --}}


                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">
                                                {{-- <div class="form-group">
                                                    <h5>Multiple Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control"
                                                            multiple="" id="multiImg">
                                                        @error('multi_img')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="row" id="preview_img">
                                                        </div>
                                                    </div>
                                                </div> --}}


                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 6th row  -->
                                        <div class="row">
                                            <!-- start 7th row  -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description English <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">
                                                                                                        {{ $products->short_descp_en }}
                                                                                                    </textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description fr <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_fr" id="textarea" class="form-control" required placeholder="Textarea text">
                                                                                                        {{ $products->short_descp_fr }}
                                                                                                    </textarea>
                                                    </div>
                                                </div>


                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 7th row  -->




                                        <div class="row">
                                            <!-- start 8th row  -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
                                                                                                        {{ $products->long_descp_en }}
                                                                                                </textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description frdi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_descp_fr" rows="10" cols="80">
                                                                                                        {{ $products->long_descp_en }}
                                                                                                 </textarea>
                                                    </div>
                                                </div>


                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 8th row  -->

                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                                value="1"
                                                                {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="featured" value="1"
                                                                {{ $products->featured == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="special_offer"
                                                                value="1"
                                                                {{ $products->special_offers == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="special_deals"
                                                                value="1"
                                                                {{ $products->specials_deals == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="Update Product">
                                        </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->

        {{-- Start Multiple image update area --}}

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                        </div>

                        <form method="POST" action="{{ route('update-product-image') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach ($multiImgs as $img)
                                    <div class="col-md-3">

                                        <div class="card">
                                            <img src="{{ asset($img->photo_name) }}" class="card-img-top"
                                                style="height: 130px; width: 280px;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ route('product.multiple.delete', $img->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i
                                                            class="fa fa-trash"></i> </a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span
                                                            class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file"
                                                        name="multi_img[ {{ $img->id }} ]">
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div><!--  end col md 3		 -->
                                @endforeach
                                <input type="hidden" name="id" value="{{ $products->id }}">
                                <div class="card mr-4" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Add Additional Photo
                                        </h5>
                                        <p class="card-text">
                                        <div class="form-group">
                                            <label for="" class="form-control-label"> Change Image <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="multi_img_add[]" multiple required="">
                                        </div>
                                        </p>

                                    </div>
                                </div>

                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>

                            <br><br>

                        </form>
                    </div>
                </div>
            </div> <!-- // end row  -->
        </section>
        {{-- End Multiple image update area --}}

        {{-- Start Thambnail image update area --}}

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                        </div>

                        <form method="POST" action="{{ route('update-product-thambnail') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">

                            <div class="row row-sm">

                                <div class="col-md-3">

                                    <div class="card">
                                        <img src="{{ asset($products->product_thambnail) }}" class="card-img-top"
                                            style="height: 130px; width: 280px;">
                                        <div class="card-body">

                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span
                                                        class="tx-danger">*</span></label>
                                                <input onchange="mainThamUrl(this)" class="form-control" type="file"
                                                    name="product_thambnail" required ="">
                                                <img src="" id="mainThmb">
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div><!--  end col md 3		 -->

                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>

                            <br><br>

                        </form>
                    </div>
                </div>
            </div> <!-- // end row  -->
        </section>
        {{-- End Thambnail image update area --}}


    </div>

    <!-- script category option select -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>

    <!-- script image thumbnail -->
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    {{-- script multiple image --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
