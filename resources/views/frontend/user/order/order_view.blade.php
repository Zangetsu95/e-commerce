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
                                    <tr>
                                        <td>#1357</td>
                                        <td>March 45, 2020</td>
                                        <td>Processing</td>
                                        <td>$125.00 for 2 item</td>
                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>#2468</td>
                                        <td>June 29, 2020</td>
                                        <td>Completed</td>
                                        <td>$364.00 for 5 item</td>
                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>#2366</td>
                                        <td>August 02, 2020</td>
                                        <td>Completed</td>
                                        <td>$280.00 for 3 item</td>
                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                    </tr>
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
