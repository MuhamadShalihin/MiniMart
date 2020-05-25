@extends('layouts.master')

@section('title')
Customers' Order
@endsection

@section('content')
@if (session()->has('status'))
<div class="alert alert-success">
    {{ session()->get('status') }}
</div>
@endif
@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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
                            <th>Email</th>
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
                                <td>{{ json_encode($order->product_name) }}</td>
                                <td>{{ json_encode($order->quantity) }}</td>
                                <td>{{ json_encode($order->price) }}</td>
                                <td>{{ json_encode($order->total_price) }}</td>
                                <td>{{ json_encode($order->grand_total) }}</td>
                                <td>
                                    <a href="/orders-edit/{{ $order->id }}" class="btn btn-success">Update</a>
                                </td>
                                <td>
                                    <form action="/orders-delete/{{ $order->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Remove selected order?');">Delete</button>
                                    </form>
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