@extends('layouts.master')

@section('title')
Customers' Order
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Customers' Order</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Street</th>
                            <th>State</th>
                            <th>Postal Code</th>
                            <th>Phone</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Grand Total</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id  }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->street }}</td>
                                <td>{{ $order->state }}</td>
                                <td>{{ $order->postal_code }}</td>
                                <td>{{ $order->phone }}</td>
                                {{-- <td>{{ $order['product_name'] }}</td>
                                <td>{{ $order['quantity'] }}</td>
                                <td>{{ $order['price'] }}</td>
                                <td>{{ $order['total_price'] }}</td>
                                <td>{{ $order['grand_total'] }}</td> --}}
                                <td>
                                    <a href="#" class="btn btn-success">Update</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection