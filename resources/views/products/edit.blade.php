@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $product->name }}" required autocomplete="name" autofocus>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description"
                                              required autocomplete="description" autofocus>{{ $product->description }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="amount"
                                       class="col-md-4 col-form-label text-md-end">Amount</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number"
                                           class="form-control "
                                           name="amount" value="{{ $product->amount }}" required
                                           autocomplete="amount" autofocus min="1">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price"
                                       class="col-md-4 col-form-label text-md-end">Price</label>

                                <div class="col-md-6">
                                    <input id="price" type="number"
                                           class="form-control" name="price"
                                           value="{{ $product->price }}" required autocomplete="price">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category_id"
                                       class="col-md-4 col-form-label text-md-end">Category</label>

                                <div class="col-md-6">
                                    <select id="category_id" type="number"
                                            class="form-control" name="category_id">
                                        @foreach( $categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if(!is_null($product->category) && $product->category->id === $category->id) selected @endif>
                                                    {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-end">Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file"
                                           class="form-control" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mt-4 ">
                                <div class="col-md-6">
                                    @if(!is_null($product->image))
                                        <img src="{{ asset('storage/'. $product->image) }}"
                                             class="img-fluid mx-auto d-block" alt="Card image">
                                    @else
                                        <img src="{{ asset('storage/products/default.jpg')}}"
                                             class="img-fluid mx-auto d-block" alt="Card image">
                                    @endif
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Product') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
