<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-active-color="danger">
      <div class="logo">
        <h3 class="simple-text logo-normal">Admin's Panel</h3>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ 'dashboard' == request()->path() ? 'active' : '' }}">
            <a href="dashboard">
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ 'userslist' == request()->path() ? 'active' : '' }}">
            <a href="/userslist">
              <p>Registered Users</p>
            </a>
          </li>
          <li class="{{ 'orders-list' == request()->path() ? 'active' : '' }}">
            <a href="/orders-list">
              <p>Customers' Order</p>
            </a>
          </li>
          <li class="{{ 'categories-list' == request()->path() ? 'active' : '' }}">
            <a href="/categories-list">
              <p>Add Category</p>
            </a>
          </li>
          <li class="{{ 'products-list' == request()->path() ? 'active' : '' }}">
            <a href="/products-list">
              <p>Add Product</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      @include('layouts.admin-navbar')
      <!-- End Navbar -->
      
      <div class="content">

        @yield('content')
        
      </div>
      
    </div>
  </div>
  <!--   Core JS Files   -->
  @include('layouts.admin-scripts')
</body>

</html>
