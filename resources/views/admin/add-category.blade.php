@extends('layouts.master')

@section('title')
Add Category
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categories' List</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>&nbsp;</th>
                            <td>&nbsp;</td>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->cat_name }}</td>
                                <td>{{ $category->slug }}</td>
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
            </div>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Categories</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('add-category.addCategory') }}" method="post">
                        <div class="form-group">
                            <h6>Category Name:</h6>
                            <input type="text" class="form-control" id="catName" name="catName" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Slug:</h6>
                            <input type="text" class="form-control" id="slug" name="slug" required>
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