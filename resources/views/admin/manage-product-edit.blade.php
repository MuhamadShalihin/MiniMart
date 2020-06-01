@extends('layouts.master')

@section('title')
Update Product
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
                            <form action="/products-update/{{ $products->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $products->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" value="{{ $products->slug }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" value="{{ $products->price }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" value="{{ $products->image }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="description" name="description" value="{{ $products->description }}" class="form-control">
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