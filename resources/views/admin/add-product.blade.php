@extends('layouts.master')

@section('title')
Add Product
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Products' List</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->image }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a href="#" class="btn btn-success">Update</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="col-12 d-flex justify-content-center pt-4">
                            <ul>
                                <li class="{{ '/products-list' == request()->path() ? 'active' : '' }}">{{ $products->links() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Products</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <h6>Product Name:</h6>
                            <input type="text" class="form-control" id="catName" name="catName" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Slug:</h6>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>
                        <div class="form-group">
                            <h6>Price: </h6>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <h6>Image: </h6>
                            <input type="file" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <h6>Description</h6>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection