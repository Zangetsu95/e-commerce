@extends('admin.admin_master')
@section('admin')

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

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name En</th>
                                            <th>Product Name Fr</th>
                                            <th>Product price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td><img src="{{ asset($item->product_thambnail) }}"
                                                        style="width:60px;height:50px"></td>
                                                <td>{{ $item->product_name_en }}</td>
                                                <td>{{ $item->product_name_fr }}</td>
                                                <td>{{ $item->selling_price }}</td>
                                                <td>{{ $item->product_qty }}</td>
                                                <td>
                                                    @if ($item->discount_price == null)
                                                        <span class="badge badge-pill badge-danger"> No Discount </span>
                                                    @else
                                                        @php

                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = ($amount / $item->selling_price) * 100;

                                                        @endphp

                                                        <span class="badge badge-pill badge-danger"> {{ round($discount) }} % </span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success"> Active</span>

                                                    @else
                                                        <span class="badge badge-pill badge-danger"> Inactive</span>
                                                    @endif
                                                </td>
                                                <td width='30%'>
                                                    <a href="{{ route('product-edit', $item->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-eye"
                                                            title="Product Details Data"></i></a>

                                                    <a href="{{ route('product-edit', $item->id) }}"
                                                        class="btn btn-info"><i class="fa fa-pencil"
                                                            title="Edit"></i></a>
                                                    <a href="{{ route('product.delete', $item->id) }}"
                                                        class="btn btn-danger" id="delete" title="Delete"><i
                                                            class="fa fa-trash"></i></a>

                                                    @if ($item->status == 1)

                                                        <a href="{{ route('product-inactive', $item->id) }}"
                                                            class="btn btn-danger"><i class="fa fa-arrow-down"
                                                                title="Inactive Now"></i></a>
                                                    @else

                                                        <a href="{{ route('product-active', $item->id) }}"
                                                            class="btn btn-success"><i class="fa fa-arrow-up"
                                                                title="Active Now"></i></a>
                                                    @endif

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


                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->
    </div>
    <!-- /.row -->


    </section>
    <!-- /.content -->

    </div>

@endsection
