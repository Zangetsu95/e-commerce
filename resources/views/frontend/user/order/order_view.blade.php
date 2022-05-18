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

                <div class="tab-pane " id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Your Orders</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->invoice_no }}</td>
                                                <td>{{ $order->order_date }}</td>
                                                <td>
                                                    <label for="">
                                                        @if($order->status == 'pending')
                                                        <span class="badge badge-pill badge-warning"
                                                            style="background: #41b1f1;">{{ $order->status }} </span>

                                                        @elseif($order->status == 'confirm')
                                                        <span class="badge badge-pill badge-warning"
                                                        style="background: #41f164;">{{ $order->status }} </span>

                                                        @elseif($order->status == 'processing')
                                                        <span class="badge badge-pill badge-warning"
                                                        style="background: #f29513;">{{ $order->status }} </span>

                                                        @elseif($order->status == 'picked')
                                                        <span class="badge badge-pill badge-warning"
                                                        style="background: #d0e720;">{{ $order->status }} </span>

                                                        @elseif($order->status == 'shipped')
                                                        <span class="badge badge-pill badge-warning"
                                                        style="background: #e758d2;">{{ $order->status }} </span>

                                                        @elseif($order->status == 'delivered')
                                                        <span class="badge badge-pill badge-warning"
                                                        style="background: #833939;">{{ $order->status }} </span>
                                                        @if($order->return_order == 1)
                                                        <span class="badge badge-pill badge-warning"
                                                        style="background: #c81d1d;">Return Requested </span>
                                                        @endif
                                                        
                                                        @else
                                                        <span class="badge badge-pill badge-warning"
                                                        style="background: #b90101;"> Cancel </span>

                                                        @endif
                                                    </label>
                                                </td>
                                                <td>{{ $order->amount }}€</td>
                                                <td>
                                                    <a href="{{ url('user/order_details/' . $order->id) }}"
                                                        class="btn-small d-block">View</a>
                                                    <a href="{{ url('user/invoice_download/' . $order->id) }}"
                                                        class="btn-small d-block" style="color: red">Invoice</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- row -->
        </div>
    </div>
@endsection
