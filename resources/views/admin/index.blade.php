@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="ms-5">
            <a class="btn btn-primary" href="{{ route('products.index') }}">Products</a>
            <a class="btn btn-primary" href="{{ route('users.index') }}">Users</a>
        </div>
    </div>
@endsection
