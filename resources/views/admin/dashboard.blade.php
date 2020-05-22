@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-3 col-md-10 col-sm-10">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-10 col-md-10">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-globe text-warning"></i>
              </div>
            </div>
            <div class="col-10 col-md-10">
              <div class="numbers">
                <p class="card-category">Users</p>
                <p class="card-title">{{ \DB::table('users')->count() }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <a href="/userslist" style="text-decoration: none;">
            <div class="stats">
              <i class="fa fa-refresh"></i>
              Update now
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-10 col-sm-10">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-10 col-md-10">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-favourite-28 text-primary"></i>
              </div>
            </div>
            <div class="col-10 col-md-10">
              <div class="numbers">
                <p class="card-category">Orders List</p>
                <p class="card-title">{{ \DB::table('billing_details')->count() }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <a href="/orders-list" style="text-decoration: none;">
            <div class="stats">
              <i class="fa fa-refresh"></i>
              Update now
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-10 col-sm-10">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-10 col-md-10">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-vector text-danger"></i>
              </div>
            </div>
            <div class="col-10 col-md-10">
              <div class="numbers">
                <p class="card-category">Categories</p>
                <p class="card-title">{{ \DB::table('categories')->count() }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <a href="/categories-list" style="text-decoration: none;">
            <div class="stats">
              <i class="fa fa-refresh"></i>
              Update now
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-10 col-sm-10">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-10 col-md-10">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-money-coins text-success"></i>
              </div>
            </div>
            <div class="col-10 col-md-10">
              <div class="numbers">
                <p class="card-category">Products</p>
                <p class="card-title">{{ \DB::table('products')->count() }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <a href="/products-list" style="text-decoration: none;">
            <div class="stats">
              <i class="fa fa-refresh"></i>
              Update now
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">Users Behavior</h5>
          <p class="card-category">24 Hours performance</p>
        </div>
        <div class="card-body ">
          <canvas id=chartHours width="400" height="100"></canvas>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-history"></i> Updated 3 minutes ago
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection