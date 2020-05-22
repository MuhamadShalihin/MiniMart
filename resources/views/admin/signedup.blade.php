@extends('layouts.master')

@section('title')
Registered Users
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">Registered Users</h4>
                    <br />
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <th>&nbsp;</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Level</th>
                            <th>Email</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>&nbsp;</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->user_level }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="/users-edit/{{ $user->id }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="/users-delete/{{ $user->id }}" method="POST">
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
</div>
@endsection

@section('scripts')

@endsection