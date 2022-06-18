@extends('admin.admin_master')
@section('admin')
    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Data Tables</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Tables</li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub-SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>SubCategory Name </th>
                                            <th>Sub-SubCategory Name En</th>
                                            <th>Sub-SubCategory Name Fr</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subSubCategory as $item)
                                            <tr>
                                                <td>{{ $item->category->category_name_en }}</td>
                                                <td>{{ $item->subCategory->subcategory_name_en ?? '' }}</td>
                                                <td>{{ $item->subsubcategory_name_en }}</td>
                                                <td>{{ $item->subsubcategory_name_fr }}</td>
                                                <td>
                                                    <a href="{{ route('subsubcategory.edit', $item->id) }}"
                                                        class="btn btn-info"><i class="fa fa-pencil"
                                                            title="Edit"></i></a>
                                                    <a href="{{ route('subsubcategory.delete', $item->id) }}"
                                                        class="btn btn-danger" id="delete" title="Delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <!--    ------------ Add Sub-SubCategory Page -->
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub-SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('subsubcategory.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="select" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach ($category as $category)

                                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" id="select" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select SubCategory</option>

                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control">
                                            @error('subcategory_name_en')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Name French <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_fr" class="form-control">
                                            @error('subcategory_name_fr')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New ">
                                    </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->
    </div>
    <!-- /.row -->


    </section>
    <!-- /.content -->

    </div>

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
        });
    </script>

@endsection
