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

    <section class="ftco-section">
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
            <br>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <img src="{{ asset('assets/images/products/' . $product->slug . '.jpg') }}" class="img-fluid">
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    <p class="price"><span>RM {{ number_format($product->price, 2) }}</span></p>
                    <p>{{ $product->description }}</p>
                    <br>
                    @if($product->stock_qty > 0)
                    <p>In stock</p>
                    @else
                    <p>Out of stock</p>
                    @endif
                    <br>
                    <form action="{{ url('/add-to-cart/'. $product->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="submit" value="Add to Cart" class="btn btn-primary py-3 px-4">
                    </form>
                </div>

            </div>
        </div>
    </section>
    @include('layouts.footer')


    <!-- loader -->
    @include('layouts.scripts')

</body>

</html>