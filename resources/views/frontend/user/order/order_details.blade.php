@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <ul class="list-group list-group-flush">

                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Dashboard</a>
                    </ul>
                </div><!-- end col md 2 -->

                <div class="col-md-2">

                </div><!-- end col md 2 -->
                <br>
                <div class="col-xs-6">
                    <h2 class="sub-header">Subtitle</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th><strong> Shipping Name : </strong></th>
                                <th> {{ $order->name }} </th>
                            </tr>

                            <tr>
                                <th><strong> Shipping Phone : </strong></th>
                                <th> {{ $order->phone }} </th>
                            </tr>

                            <tr>
                                <th><strong> Shipping Email : </strong></th>
                                <th> {{ $order->email }} </th>
                            </tr>

                            <tr>
                                <th><strong> Division : </strong></th>
                                <th> {{ $order->division->division_name }} </th>
                            </tr>

                            <tr>
                                <th><strong> District : </strong></th>
                                <th> {{ $order->district->district_name }} </th>
                            </tr>

                            <tr>
                                <th> <strong> State : </strong></th>
                                <th>{{ $order->state->state_name }} </th>
                            </tr>

                            <tr>
                                <th> <strong> Post Code : <strong></th>
                                <th> {{ $order->post_code }} </th>
                            </tr>

                            <tr>
                                <th> <strong> Order Date : </strong> </th>
                                <th> {{ $order->order_date }} </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <div class="col-xs-6">
                    <h2 class="sub-header">Order Details</h2>
                    <h3><span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th> Name : </th>
                                <th> {{ $order->user->name }} </th>
                            </tr>

                            <tr>
                                <th> Phone : </th>
                                <th> {{ $order->user->phone }} </th>
                            </tr>

                            <tr>
                                <th> Payment Type : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>

                            <tr>
                                <th> Tranx ID : </th>
                                <th> {{ $order->transaction_id }} </th>
                            </tr>

                            <tr>
                                <th> Invoice : </th>
                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                            </tr>

                            <tr>
                                <th> Order : </th>
                                <th>
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #418DB9;">{{ $order->status }} </span>
                                </th>

                        </table>
                    </div>
                </div>

                <div class="col-xs-6">
                    <h2 class="sub-header">Product</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>

                                <tr style="background: #e2e2e2;">
                                    <td class="col-md-1">
                                        <label for=""> Image</label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Product Name </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Product Code</label>
                                    </td>


                                    <td class="col-md-1">
                                        <label for=""> Color </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Size </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Quantity </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Price </label>
                                    </td>

                                </tr>

                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for=""><img src="{{ asset($item->product->product_thambnail) }}"
                                                    height="50px;" width="50px;"> </label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for=""> {{ $item->product->product_name_en }}</label>
                                        </td>


                                        <td class="col-md-1">
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for=""> {{ $item->size }}</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for=""> {{ $item->price }}€ (  {{ $item->price * $item->qty }} €)
                                            </label>
                                        </td>

                                    </tr>
                                @endforeach





                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        @endsection
