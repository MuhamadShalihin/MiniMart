<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="/">Mini Mart</a>
		<form action="#" class="nav-link search-form">
			<div class="form-group">
				<span class="icon ion-ios-search"></span>
				<input type="text" class="form-control" placeholder="Search...">
			</div>
		</form>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
			aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">Products</a>
					<div class="dropdown-menu" aria-labelledby="dropdown04">
						<?php
						$categories = App\Category::all();
						?>
						<a class="dropdown-item" href="/shop">All</a>
						@foreach ($categories as $category)
						<a class="dropdown-item"
							href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{ $category->cat_name }}</a>
						@endforeach
					</div>
				</li>
				<li class="nav-item"><a href="#" class="nav-link">About</a></li>
				@guest
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						Account
					</a>
					<div class="dropdown-menu">
						<a href="{{ route('login') }}" class="dropdown-item">Login</a>
						<a href="{{ route('register') }}" class="dropdown-item">Register</a>
					</div>
					@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }}
						<span class="caret"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a href="/myprofile" class="dropdown-item">My Profile</a>
						<a href="/orders" class="dropdown-item">My Orders</a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
				@endguest
				<li class="nav-item cta cta-colored"><a href="/cart" class="nav-link"><span
							class="icon-shopping_cart"></span>[{{ count((array) session('cart')) }}]</a></li>
			</ul>
		</div>
	</div>
</nav>