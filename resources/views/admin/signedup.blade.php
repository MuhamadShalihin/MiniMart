@extends('layouts.master')

@section('title')
Registered Users
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain table-plain-bg">
            <div class="card-header ">
                <h4 class="card-title">Registered Users</h4>
                <br />
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Level</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->user_level }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <a href="/users-edit/{{ $row->id }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="/users-delete/{{ $row->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection