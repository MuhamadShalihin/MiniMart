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
            <div class="row" align="center">
                <div class="col-md-12 ftco-animate">
                    <h3>Your order has been confirmed</h3>
                    <br>
                    <a href="/" class="btn btn-primary py-3 px-4">Back to Home</a>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <!-- loader -->
    @include('layouts.scripts')



</body>

</html>