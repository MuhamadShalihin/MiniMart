@extends('layouts.master')

@section('title')
Update Category
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Update Products</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/categories-update/{{ $categories->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $categories->cat_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" value="{{ $categories->slug }}" class="form-control">
                                </div>
                                <button class="btn btn-success">Update</button>
                                <a href="/categories-list" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection