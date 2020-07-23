<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mini Mart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('layouts.styles')
</head>

<body class="goto-here">
    @include('layouts.navbar')
    <!-- END nav -->

    <section class="ftco-section ftco-cart">
        <div class="container">
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
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
            <?php $total = 0 ?>
            <?php $charge = 10.0 ?>
            <?php $grand = 0 ?>
            @if(session('cart'))
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('cart') as $id => $item)

                                <?php $total += $item['price'] * $item['quantity'] ?>
                                <?php $grand = $total + $charge ?>

                                <tr class="text-center">
                                    <td class="product-remove remove-from-cart" data-id="{{ $id }}">
                                        <a href="#">x</a>
                                    </td>
                                    <td class="product-remove update-from-cart" data-id="{{ $id }}">
                                        <a href="#">&#8634;</a>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $item['name'] }}</h3>
                                    </td>
                                    <td class="Price">RM {{ number_format($item['price'], 2) }}</td>
                                    <td class="Quantity">
                                        <input type="number" value="{{ $item['quantity'] }}" min="1" max="100"
                                            class="form-control quantity" />
                                    </td>
                                    <td class="Subtotal">RM
                                        {{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <td data-th="Subtotal" class="text-center">RM
                                {{ number_format($total, 2) }}
                            </td>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>RM {{ number_format($charge, 2) }}</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>RM {{ number_format($grand, 2) }}</span>
                        </p>
                    </div>
                    <p><a href="/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                    <p><a href="{{ url('/shop') }}" class="btn btn-primary py-3 px-4">Continue Shopping</a></p>
                </div>
            </div>
            @else
            <div class="row" align="center">
                <div class="col-md-12 ftco-animate">
                    <h3>Cart is empty</h3>
                    <br>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary py-3 px-4">Continue Shopping</a>
                </div>
            </div>
            @endif
        </div>
    </section>

    @include('layouts.footer')

    <!-- loader -->
    @include('layouts.scripts')

    <script type="text/javascript">
        $(".update-from-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-from-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>

</body>

</html>