@extends('admin.admin_master')
@section('admin')

    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            < </div>

                <!-- Main content -->
                <section class="content">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add Product</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form novalidate>
                                        <div class="row">
                                            <div class="col-12">

                                                <!-- Start 1st row -->
                                                <div class="row">
                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Brand Select <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="brand_id" id="select" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">Select Brand
                                                                    </option>
                                                                    @foreach ($brands as $brand)

                                                                        <option value="{{ $brand->id }}">
                                                                            {{ $brand->brand_name_en }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div> <!-- end col md 4 -->

                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Category Select <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="subcategory_id" id="select" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">Select Category
                                                                    </option>
                                                                    @foreach ($categories as $category)

                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->category_name_en }}</option>
                                                                    @endforeach

                                                                </select>
                                                                @error('subcategory_id')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div> <!-- end col md 4 -->
                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>SubCategory Select <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <select name="category_id" id="select" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">Select
                                                                        SubCategory
                                                                    </option>

                                                                </select>
                                                                @error('category_id')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div> <!-- end col md 4 -->



                                                </div>
                                                <!-- End 1st row -->

                                                <!-- Start 2nd row -->
                                                <div class="row">
                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>SubSubCategory Select <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <select name="subsubcategory_id" id="select" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">Select
                                                                        SubSubCategory
                                                                    </option>

                                                                </select>
                                                                @error('subsubcategory_id')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div> <!-- end col md 4 -->

                                                    <div class="col-md 4">
                                                        <div class="form-group">
                                                            <h5>Product Name English <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_name_en"
                                                                    class="form-control" required
                                                                    data-validation-required-message="This field is required">
                                                                @error('product_name_en')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div> <!-- end col md 4 -->

                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product Name French <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_name_fr"
                                                                    class="form-control" required
                                                                    data-validation-required-message="This field is required">
                                                                @error('product_name_fr')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div> <!-- end col md 4 -->

                                                </div>
                                                <!-- End 2nd row -->


                                                <!-- Start 3rd row -->
                                                <div class="row">
                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product Code <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_code"
                                                                    class="form-control" required
                                                                    data-validation-required-message="This field is required">
                                                                @error('product_code')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col md 4 -->


                                                    <div class="col-md 4">
                                                        <div class="form-group">
                                                            <h5>Product Quantity <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_qty" class="form-control"
                                                                    required
                                                                    data-validation-required-message="This field is required">
                                                                @error('product_qty')
                                                                    <span class="text-danger">{{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div> <!-- end col md 4 -->

                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product Tags English <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_tags_en"
                                                                    class="form-control" value="Lorem,Ipsum,Amet"
                                                                    data-role="tagsinput" placeholder="add tags" />
                                                            </div>

                                                            @error('product_tags_en')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div> <!-- End 3rd row -->

                                                <!-- Start 4th row -->
                                                <div class="row">
                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product Tags French <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_tags_fr"
                                                                    class="form-control" value="Lorem,Ipsum,Amet"
                                                                    data-role="tagsinput" placeholder="add tags" />
                                                            </div>

                                                            @error('product_tags_fr')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- end col md 4 -->


                                                    <div class="col-md 4">
                                                        <div class="form-group">
                                                            <h5>Product size English <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_size_en"
                                                                    class="form-control" value="Small,Medium,Large"
                                                                    data-role="tagsinput" placeholder="add tags" />
                                                            </div>

                                                            @error('product_size_en')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>

                                                    </div> <!-- end col md 4 -->

                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product size French <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_size_fr"
                                                                    class="form-control" value="Small,Medium,Large"
                                                                    data-role="tagsinput" placeholder="add tags" />
                                                            </div>

                                                            @error('product_size_fr')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div> <!-- End 4th row -->

                                                <!-- Start 5th row -->
                                                <div class="row">
                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product Color English <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_color_en"
                                                                    class="form-control" value="Lorem,Ipsum,Amet"
                                                                    data-role="tagsinput" placeholder="add tags" />
                                                            </div>

                                                            @error('product_color_en')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- end col md 4 -->


                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product Color French <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_color_fr"
                                                                    class="form-control" value="Lorem,Ipsum,Amet"
                                                                    data-role="tagsinput" placeholder="add tags" />
                                                            </div>

                                                            @error('product_color_fr')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- end col md 4 -->

                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product Selling Price <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="selling_price"
                                                                    class="form-control" required
                                                                    data-validation-required-message="This field is required">
                                                                @error('selling_price')
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div> <!-- End 5th row -->

                                                <!-- Start 6th row -->
                                                <div class="row">
                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Product discount price <span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="discount_price"
                                                                    class="form-control" />
                                                            </div>

                                                            @error('discount_price')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- end col md 4 -->


                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Main Thambnail <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="file" name="product_thambnail"
                                                                    class="form-control" />
                                                            </div>

                                                            @error('product_thambnail')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>

                                                    </div> <!-- end col md 4 -->

                                                    <div class="col-md 4">

                                                        <div class="form-group">
                                                            <h5>Multiple Image <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="file" name="multi_img[]"
                                                                    class="form-control" />
                                                            </div>

                                                            @error('multi_img')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div> <!-- End 6th row -->

                                                <!-- Start 7th row -->
                                                <div class="row">
                                                    <div class="col-md 6">

                                                        <div class="form-group">
                                                            <h5>Short Description English<span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <textarea name="short_descp_en" id="textarea"
                                                                    class="form-control" required
                                                                    placeholder="Textarea text"></textarea>
                                                            </div>

                                                            @error('short_descp_en')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- end col md 6 -->


                                                    <div class="col-md 6">

                                                        <div class="form-group">
                                                            <h5>Short Description French<span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <textarea name="short_descp_fr" id="textarea"
                                                                    class="form-control" required
                                                                    placeholder="Textarea text"></textarea>
                                                            </div>

                                                            @error('short_descp_fr')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>

                                                    </div> <!-- end col md 6 -->

                                                    <div class="col-md 4">


                                                    </div>

                                                </div> <!-- End 7th row -->

                                                <!-- Start 8th row -->
                                                <div class="row">
                                                    <div class="col-md 6">

                                                        <div class="form-group">
                                                            <h5>Long Description English<span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <textarea name="long_descp_en" id="editor1" rows="10"
                                                                    cols="80" class="form-control" required
                                                                    placeholder="Textarea text"></textarea>
                                                            </div>

                                                            @error('long_descp_en')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- end col md 6 -->


                                                    <div class="col-md 6">

                                                        <div class="form-group">
                                                            <h5>Long Description English<span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <textarea name="long_descp_fr" id="editor2" rows="10"
                                                                    cols="80" class="form-control" required
                                                                    placeholder="Textarea text"></textarea>
                                                            </div>

                                                            @error('long_descp_fr')
                                                                <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- end col md 6 -->

                                                    <div class="col-md 4">


                                                    </div>

                                                </div> <!-- End 8th row -->

                                                <hr>

                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                                value="1">
                                                            <label for="checkbox_2">Hot deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="featured"
                                                                value="1">
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
                                                                value="1">
                                                            <label for="checkbox_4">Special Offers</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="speacial_deals"
                                                                value="1">
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="Add Product ">
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
        </div>
        <!-- /.content-wrapper -->

    @endsection
