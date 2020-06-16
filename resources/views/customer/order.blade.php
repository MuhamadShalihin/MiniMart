@extends('layouts.styles')

@include('layouts.navbar')

@section('title')
Your Order
@endsection

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Your Order</h1>
                </div>
                @foreach ($orders->sortByDesc('id') as $order)
                <div class="card-body">
                    <div class="form-group">
                        <?php
					    $total = 0; 
					    $charge = 5; 
					    $grand = 0;
					    ?>
                        <div class="card col-md-12">
                            <div class="card-header">
                                <p>
                                    <h4><b>Order ID:</b> #BS{{ str_pad($order->user_id, 3, 0, STR_PAD_LEFT) }}</h4>
                                </p>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                        <th>&nbsp;</th>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total = 0.0;
                                        $grandTotal = 0.0;
                                        $charge = 5;
                                        @endphp
                                        @foreach($order->products as $product)
                                        @php
                                        $total += $product->price * $product->pivot->amount;
                                        $grandTotal += $total + ( $total * $charge)/100;
                                        @endphp
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->pivot->amount }}</td>
                                            <td>RM{{ number_format($product->price, 2) }}</td>
                                            <td>RM{{ number_format($total, 2) }}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-primary"><b>Grand Total</b></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>RM{{ number_format($grandTotal, 2) }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('scripts')

@include('layouts.footer')

<!-- loader -->
@include('layouts.scripts')