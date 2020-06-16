@extends('layouts.styles')

@include('layouts.navbar')

<!-- END nav -->

@section('title')
Edit Users
@endsection


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Profile</h1>
                </div>
                <div class="card-body">
                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/profile-update" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" name="phone" value="{{ $users->phone }}" class="form-control"
                                        maxlength="12">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $users->email }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" name="street" value="{{ $users->street }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select id="state" type="text"
                                        class="form-control @error('state') is-invalid @enderror" name="state"
                                        value="{{ old('state') }}" required autocomplete="state">
                                        <option value="{{ $users->id }}" selected disabled hidden>
                                            {{ $users->state }}
                                        </option>
                                        <option value="Selangor">Selangor</option>
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
                                    <input type="number" name="postal_code" value="{{ $users->postal_code }}"
                                        class="form-control">
                                </div>
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="/home" class="btn btn-danger">Cancel</a>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')

@include('layouts.footer')

<!-- loader -->
@include('layouts.scripts')