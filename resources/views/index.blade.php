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

	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			<div class="slider-item" style="background-image: url('./assets/images/a.jpg');">
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
						<div class="col-md-12 ftco-animate text-center">
							<h1 class="mb-2">We serve Fresh Vegetables &amp; Fruits</h1>
							<h2 class="subheading mb-4">We deliver the best groceries</h2>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item" style="background-image: url('./assets/images/b.jpg');">
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

						<div class="col-sm-12 ftco-animate text-center">
							<h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
							<h2 class="subheading mb-4">We deliver the best groceries</h2>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row no-gutters ftco-services">
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-shipped"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Free Shipping</h3>
							<span>On order over $100</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-diet"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Always Fresh</h3>
							<span>Product well package</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-award"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Superior Quality</h3>
							<span>Quality Products</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-customer-service"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Support</h3>
							<span>24/7 Support</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<br>
			<h1 class="row justify-content-center mb-5 pb-3">Products you might like</h1>
			<div class="row">
				@foreach ($products as $product)
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="{{ url('/shop/' . $product->slug) }}" class="img-prod">
							<img class="img-fluid" src="{{ asset('assets/images/products/' . $product->slug . '.jpg') }}">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3>{{ $product->name }}</h3>
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
				<div class="col-sm-12 ftco-animate text-center">
					<p>
						<a href="/shop" class="btn btn-primary">Shop Now</a>
					</p>
				</div>
			</div>
		</div>
	</section>


	
	@include('layouts.footer')

	<!-- loader -->
	@include('layouts.scripts')

</body>

</html>