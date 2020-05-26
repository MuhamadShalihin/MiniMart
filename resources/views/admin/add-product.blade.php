@extends('layouts.master')

@section('title')
Add Product
@endsection

@section('content')
@if (session()->has('status'))
<div class="alert alert-success">
    {{ session()->get('status') }}
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
                            <th>Category</th>
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
                                <td>{{ $product->category->cat_name ?? "" }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->image }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a href="#" class="btn btn-success">Update</a>
                                </td>
                                <td>
                                    <form action="/product-delete/{{ $product->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this row?');">Delete</button>
                                    </form>
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
                    <form action="/products-added" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h6>Product Name:</h6>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Slug:</h6>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Categories:</h6>
                            <select name="category" id="category" class="form-control">
                                <option selected disabled>- Choose a category -</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Price: </h6>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Image: </h6>
                            <br>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Description</h6>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection