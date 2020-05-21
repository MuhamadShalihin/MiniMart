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
                <div class="card-body">
                    <div class="form-group">
                        <?php
					    $total = 0; 
					    $charge = 5; 
					    $grand = 0;
					    ?>
                        <table>
                            @if (session('cart'))
                            @foreach (session('cart') as $id => $item)
                            <?php $total += $item['price'] * $item['quantity'] ?>
                            <?php $grand += $total + ($total * $charge)/100 ?>
                            <tr>
                                <td>
                                    <h5>Product Name</h5>
                                </td>
                                <td><label>{{ $item['name'] }}</label></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>RM{{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quantity</h5>
                                </td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>
                                    <h5>Grand Total</h5>
                                </td>
                                <td>RM{{ number_format($grand, 2) }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Price</h5>
                                </td>
                                <td>RM{{ number_format($item['price'], 2) }}</td>
                                <td>
                                    <h5>Charge</h5>
                                </td>
                                <td>{{ $charge }}%</td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')

@include('layouts.footer')

<!-- loader -->
@include('layouts.scripts')