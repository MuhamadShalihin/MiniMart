@extends('layouts.master')

@section('title')
Manage Category
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
                            @foreach ($categories->sortByDesc('id') as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->cat_name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="/categories-edit/{{ $category->id }}" class="btn btn-success">Update</a>
                                </td>
                                <td>
                                    <form action="/categories-delete/{{ $category->id }}" method="POST">
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
            </div>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Categories</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/categories-added') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h6>Category Name:</h6>
                            <input type="text" class="form-control" id="cat_name" name="cat_name" required>
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