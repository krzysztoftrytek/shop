@extends('layouts.app')

@section('content')
    <div class="ms-5">
        <a class="btn btn-primary" href="{{ route('products.index') }}">Products</a>
        <a class="btn btn-primary" href="{{ route('users.index') }}">Users</a>
    </div>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($message = Session::get('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($message = Session::get('updated'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <form class="input-group mb-5" method="get"
                  action="{{ url('/products/search') }}">
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
    </div>
    <div class="container">
        <a class="btn btn-info btn-sm" href="{{ route('products.create') }}">Add Product</a>
        <table class="table table_wrapper">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product -> amount }}</td>
                    @if(!is_null($product->category))
                        <td>{{ $product->category->name }}</td>
                    @else
                        <td>None</td>
                    @endif
                    <td class="crud_image">
                        <div>
                            @if(!is_null($product->image))
                                <img src="{{ asset('storage/'. $product->image) }}"
                                     class="img-fluid mx-auto d-block" alt="Card image">
                            @else
                                <img src="{{ asset('storage/products/default.jpg')}}"
                                     class="img-fluid mx-auto d-block" alt="Card image">
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn-info btn btn-sm"> Update</a>
                            <a href="{{ route('products.show', $product->id) }}" class="btn-warning btn btn-sm">
                                Show</a>
                            <form method="POST" action="/products/delete/{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger btn btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
