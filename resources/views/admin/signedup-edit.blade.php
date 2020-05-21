@extends('layouts.master')

@section('title')
Edit Users
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Role for Users</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/users-signedup-update/{{ $users->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="username" value="{{ $users->name }}" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" name="phone" value="{{ $users->phone }}" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                        <select name="usertype" class="form-control" >
                                            <option value="admin">Admin</option>
                                            <option value="vendor">Vendor</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $users->email }}" class="form-control" >
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/userslist" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection