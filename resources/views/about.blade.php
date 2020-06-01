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
    <div align="center">
        <div class="col-lg-6 mb-5 ftco-animate">
            <img src="{{ asset('assets/images/bs freshmart.png') }}" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 product-details pl-md-5 ftco-animate">
            <h6>The BS market or also know as BS Freshmart, which started as a family business, specializes in wholesale seafood for the vegetable market and restaurants in Malaysia. Today, it has flourished into a retail chain with many branches.</h6>
        </div>
    </div>
	
	@include('layouts.footer')

	<!-- loader -->
	@include('layouts.scripts')

</body>

</html>