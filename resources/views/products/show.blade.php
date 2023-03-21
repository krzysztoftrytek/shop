@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ $product->name }}" disabled>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                    <textarea class="form-control" name="description" disabled
                                              autofocus>{{ $product->description }}
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
                                       disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price"
                                   class="col-md-4 col-form-label text-md-end">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number"
                                       class="form-control" name="price"
                                       value="{{ $product->price }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category"
                                   class="col-md-4 col-form-label text-md-end">Category</label>
                            <div class="col-md-6">
                                <select id="category_id" type="number"
                                        class="form-control" name="category_id" disabled>
                                    <option value=""> {{ $product->category->name}}
                                           </option>
                                </select>
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
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

