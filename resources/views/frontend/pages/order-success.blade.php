@extends('frontend.layouts.master')

@section('stylesheets')

@endsection


@section('content')

<div class="container-fluid mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Success !!</h3>
        </div>

        <div class="card-body row">
            <div class="col-md-5">
                <div class="">
                    <h4>
                        <i class="fa fa-check"></i>
                        Your order has been placed successfully !!
                    </h4>
                    <br>
                    <div class="p-3">
                        <h4>Order No: {{ $order->id }}</h4>
                        <p>
                            Keep track your orders from here:
                            <a href="{{ route('user.orders') }}">
                                My Orders
                            </a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-md-7">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                            <th>Discount/Shipping Charge</th>
                            <th>Subtotal</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at }}
                            <br> ({{ $order->created_at->diffForHumans() }})
                        </td>
                        <td>
                            <strong class="text-info"> {{ $order->total_amounts() }} ৳</strong>
                        </td>
                        <td>
                            (-) {{ $order->custom_discount }} ৳
                            <br>
                            (+) {{ $order->shipping_charge }} ৳
                        </td>
                        <td>
                            <strong class="text-danger">
                                {{ $order->total_amounts() - $order->custom_discount +  $order->shipping_charge }} ৳
                            </strong>
                        </td>
                        <td>
                            <p>
                                @if ($order->is_seen_by_admin)
                                <span class="text-success">
                                    Seen
                                </span>
                                @else
                                <span class="text-danger">
                                    Unseen
                                </span>
                                @endif
                            </p>

                            <p>
                                @if ($order->is_completed)
                                <span class="text-success">
                                    Completed
                                </span>
                                @else
                                <span class="text-danger">
                                    Not Completed
                                </span>
                                @endif
                            </p>

                            <p>
                                @if ($order->is_paid)
                                <span class="text-success">
                                    Paid
                                </span>
                                @else
                                <span class="text-danger">
                                    UnPaid
                                </span>
                                @endif
                            </p>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection