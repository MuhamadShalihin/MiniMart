@extends('layouts.master')

@section('title')
Update Customers' Order
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Update Customers' Order</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/customersorder-update/{{ $orders->user->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $orders->user->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $orders->user->email }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" name="street" value="{{ $orders->user->street }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $orders->user->state }}" required>
                                        <option value="{{ $orders->user->id }}" selected disabled hidden>
                                            {{ $orders->user->state }}
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
                                    <label>Postal Code</label>
                                    <input type="number" name="postal_code" value="{{ $orders->user->postal_code }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ $orders->user->phone }}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/products-list" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection