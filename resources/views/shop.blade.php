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

	<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('assets/images/a.jpg') }}');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Products</span>
					</p>
					<h1 class="mb-0 bread">{{ $categoryName }}</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				@foreach ($products as $product)
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="{{ url('/shop/' . $product->slug) }}" class="img-prod">
							<img class="img-fluid" src="{{asset('assets/images/products/'.$product->slug.'.jpg')}}">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3>
								<a href="{{ url('/shop/' . $product->slug) }}">{{ $product->name }}</a>
							</h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price">RM {{ number_format($product->price, 2) }}</p>
                                </div>
                                </a>
							</div>
							<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="{{ url('/shop/' . $product->slug) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
    							</div>
    						</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="row mt-5">
				<div class="col text-center">
					<div class="col-12 d-flex justify-content-center pt-4">
						<ul>
							<li class="{{ '/shop/category' == request()->path() ? 'active' : '' }}">{{ $products->links() }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('layouts.footer')


	<!-- loader -->
	@include('layouts.scripts')
</body>

</html>