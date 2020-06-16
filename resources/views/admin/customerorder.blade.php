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
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Street</th>
                            <th>State</th>
                            <th>Postal Code</th>
                            <th>Phone</th>
                        </thead>
                        <tbody>
                            @foreach ($orders->sortByDesc('id') as $order)
                            <tr>
                                <td>#BS{{ str_pad($order->id, 3, 0, STR_PAD_LEFT) }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->user->street }}</td>
                                <td>{{ $order->user->state }}</td>
                                <td>{{ $order->user->postal_code }}</td>
                                <td>{{ $order->user->phone }}</td>
                                <td>
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-info" data-id="{{ $order->order_id }}" data-toggle="modal"
                                        data-target="#orderDetail-{{ $order->id }}">Purchase <br> Details</button>

                                    <!-- Modal -->
                                    <div id="orderDetail-{{ $order->id }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="card col-md-12">
                                                <div class="card-header">
                                                    <h4 class="modal-title">Purchase details for {{ $order->name }}</h4>
                                                    <p><h4>Order ID: #{{ str_pad($order->id, 3, 0, STR_PAD_LEFT) }}</h4></p>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead class="text-primary">
                                                            <th>Product Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Total Price</th>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $grandTotal = 0.0;
                                                            @endphp
                                                            @foreach($order->products as $product)
                                                            <tr>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ $product->pivot->amount }}</td>
                                                                <td>RM{{ number_format($product->price, 2) }}</td>
                                                                <td>RM{{ number_format($product->price * $product->pivot->amount, 2) }}</td>
                                                            </tr>
                                                            @php
                                                            $grandTotal = $grandTotal + ($product->price * $product->pivot->amount)
                                                            @endphp
                                                            @endforeach
                                                            <tr>
                                                                <td class="text-primary"><b>GRAND TOTAL</b></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><b>RM{{ number_format($grandTotal, 2) }}</b></td>
                                                            </tr>
                                                        </tbody>
                                                    </table> 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="/orders-edit/{{ $order->id }}" class="btn btn-success">Update</a>
                                </td>
                                <td>
                                    <form action="/orders-delete/{{ $order->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Remove selected order?');">Delete</button>
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
<!-- <script type="text/javascript">
    $("#orderDetail").on("show.bs.modal", function (event)
    {
        let button = $(event.relatedTarget);
        let orderId = button.data("orderid");
        let modal = $(this);
        let orders = @json($orders);

        modal
        .find("#orderDetailLabel")
        .text(orders[orderId -1].email);
        console.log(orders)
    });
</script> -->
@endsection