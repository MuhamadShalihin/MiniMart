@extends('layouts.styles')

@include('layouts.navbar')

@section('title')
Order History
@endsection

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Order History</h1>
                </div>
                @if (auth()->user()->orders())
                @foreach ($orders->sortByDesc('id')  as $order)
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
                                    <h4><b>Order ID:</b> #BS{{ str_pad($order->id, 3, 0, STR_PAD_LEFT) }}</h4>
                                </p>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                        <th>Last Order</th>
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
                                            <td><b>{{ $order->created_at }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ url('/reorder/' . $order->id) }}" class="btn btn-primary py-3 px-4">Reorder</a>
                            <br>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@section('scripts')

@include('layouts.footer')

<!-- loader -->
@include('layouts.scripts')