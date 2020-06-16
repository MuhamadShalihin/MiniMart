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

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-7 ftco-animate">
					<form action="{{ route('checkout.store') }}" method="POST" class="billing-form" id="payment-form">
						{{ csrf_field() }}
						<h3 class="mb-4 billing-heading">Billing Details</h3>
						@if (Auth::user())
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" class="form-control" id="email" name="email"
								value="{{ Auth::user()->email }}">
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name"
								value="{{ Auth::user()->name }}">
						</div>
						<div class="form-group">
							<label for="street">Street</label>
							<input type="text" class="form-control" id="street" name="street"
								value="{{ Auth::user()->street }}" required>
						</div>
						<div class="form-group">
							<label>State</label>
							<select id="state" type="text"
								class="form-control @error('state') is-invalid @enderror" name="state"
								value="{{ Auth::user()->state }}" required autocomplete="state">
								<option value="{{ Auth::user()->id }}" selected disabled hidden>
									{{ Auth::user()->state }}
								</option>
								<option value="Perlis">Perlis</option>
								<option value="Kedah">Kedah</option>
								<option value="Perak">Perak</option>
								<option value="Pulau Pinang">Pulau Pinang</option>
								<option value="Kelantan">Kelantan</option>
								<option value="Terengganu">Terengganu</option>
								<option value="Pahang">Pahang</option>
								<option value="W.P. Kuala Lumpur">W.P. Kuala Lumpur</option>
								<option value="Putrajaya">Putrajaya</option>
								<option value="Labuan">Labuan</option>
								<option value="Negeri Sembilan">Negeri Sembilan</option>
								<option value="Melaka">Melaka</option>
								<option value="Johor">Johor</option>
								<option value="Sabah">Sabah</option>
								<option value="Sarawak">Sarawak</option>
							</select>
						</div>

						<div class="form-group">
							<label for="postalcode">Postal Code</label>
							<input type="number" class="form-control" id="postalcode" name="postalcode"
								value="{{ Auth::user()->postal_code }}" required>
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" id="phone" name="phone"
								value="{{ Auth::user()->phone }}">
						</div>
						<div class="form-group">
							<label for="bank_name">Bank Name:</label>
							<select name="bank_name" id="bank_name" type="text" class="form-control"
								value="{{ Auth::user()->bank_name }}" required>
								<option value="{{ Auth::user()->id }}" selected disabled hidden>{{ Auth::user()->bank_name }}</option>
								<option value="Ambank">Ambank</option>
								<option value="Bank Islam">Bank Islam</option>
								<option value="Maybank">Maybank</option>
								<option value="RHB Bank">RHB Bank</option>
								<option value="CIMB">CIMB</option>
							</select>
						</div>
						<div class="form-group">
							<label for="card_number">Card Number:</label>
							<input type="number" class="form-control" name="card_number" id="card_number" maxlength="16"
								min="1111111111111111" max="9999999999999999" value="{{ Auth::user()->card_number }}">
						</div>
						<div class="form-group">
							<label for="expiry_date">Expiry Date:</label>
							<input type="text" placeholder="mm/yy" class="form-control"
								name="expiry_date" id="expiry_date" value="{{ Auth::user()->expiry_date }}">
						</div>
						<div class="form-group">
							<label for="cvv2">CVV2:</label>
							<input type="number" class="form-control" name="cvv2" id="cvv2" min="111" max="999"
								maxlength="3" value="{{ Auth::user()->cvv2 }}">
						</div>
						@else
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
								required>
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
								required>
						</div>
						<div class="form-group">
							<label for="street">Street</label>
							<input type="text" class="form-control" id="street" name="street"
								value="{{ old('street') }}" required>
						</div>
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}"
								required>
						</div>
						<div class="form-group">
							<label for="state">State</label>
							<input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}"
								required>
						</div>
						<div class="form-group">
							<label for="postal_code">Postal Code</label>
							<input type="text" class="form-control" id="postal_code" name="postal_code"
								value="{{ old('postal_code') }}" required>
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
								required>
						</div>
						<div class="form-group">
							<label for="bank_name">Bank Name:</label>
							<select name="bank_name" id="bank_name" type="text" class="form-control"
								value="{{ old('bank_name') }}" required>
								<option selected disabled hidden>-Choose a bank-</option>
								<option value="Ambank">Ambank</option>
								<option value="Bank Islam">Bank Islam</option>
								<option value="Maybank">Maybank</option>
								<option value="RHB Bank">RHB Bank</option>
								<option value="CIMB">CIMB</option>
							</select>
						</div>
						<div class="form-group">
							<label for="card_number">Card Number:</label>
							<input type="number" class="form-control" name="card_number" id="card_number" maxlength="16"
								min="1111111111111111" max="9999999999999999" value="{{ old('card_number') }}">
						</div>
						<div class="form-group">
							<label for="expiry_date">Expiry Date:</label>
							<input type="text" placeholder="mm/yy" class="form-control"
								name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}">
						</div>
						<div class="form-group">
							<label for="cvv2">CVV2:</label>
							<input type="number" class="form-control" name="cvv2" id="cvv2" min="111" max="999"
								maxlength="3" value="{{ old('cvv2') }}">
						</div>
						@endif

						<div class="spacer"></div>

						<button type="submit" id="complete-order" class="btn btn-primary py-3 px-4">Complete
							Order</button>
					</form><!-- END -->
				</div>
				<div class="col-xl-5">
					<?php
					$total = 0; 
					$charge = 5; 
					$grand = 0;
					?>
					<table class="table-borderless table-responsive">
						<tr align="center">
							<th><b>Product Name</b></th>
							<th><b>Qty</b></th>
							<th><b>Price</b></th>
							<th><b>Subtotal</b></th>
						</tr>
						@if(session('cart'))
						@foreach(session('cart') as $item => $id)
						<?php $total += $id['price'] * $id['quantity'] ?>
						<?php $grand += $total + ($total * $charge)/100 ?>
						<tr>
							<td>{{ $id['name'] }}</td>
							<td align="center">{{ $id['quantity'] }}</td>
							<td align="center">RM{{ number_format($id['price'], 2) }}</td>
							<td align="center">RM{{ number_format($id['quantity'] * $id['price'], 2) }}</td>
						</tr>
						@endforeach
						@endif
					</table>
					<div class="row mt-5 pt-3">
						<div class="col-md-12 d-flex mb-5">
							<div class="cart-detail cart-total p-3 p-md-4" align="center">
								<h3 class="billing-heading mb-4">Cart Total</h3>
								<p class="d-flex">
									<span>Subtotal</span>
									<span>RM {{ number_format($total, 2) }}</span>
								</p>
								<p class="d-flex">
									<span>Delivery</span>
									<span>{{ $charge }}%</span>
								</p>
								<hr>
								<p class="d-flex total-price">
									<span>Total</span>
									<span>RM {{ number_format($grand, 2) }}</span>
								</p>
							</div>
						</div>
					</div>
				</div> <!-- .col-md-8 -->
			</div>
		</div>
	</section> <!-- .section -->

	@include('layouts.footer')

	<!-- loader -->
	@include('layouts.scripts')


</body>

</html>