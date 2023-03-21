@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="ms-5">
    <a class="btn btn-primary" href="{{ route('products.index') }}">Products</a>
    <a class="btn btn-primary" href="{{ route('users.index') }}">Users</a>
    </div>
    <div class="container">
        <form class="input-group mb-5" method="get"
              action="{{ url('/users/search') }}">
            <input
                class="form-control py-2 border-left-0 border" type="search"
                id="example-search-input"
                name="search"/>
            <span
                class="input-group-append">
                 <button
                     class="btn btn-outline-secondary border-left-0 border">Search</button>
                 </span>
        </form>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">

                    ID
                </th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="d-flex">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn-info btn btn-sm"> Update</a>
                        <form method="POST" action="/users/delete/{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger btn btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
