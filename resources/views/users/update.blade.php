@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                           class="form-control @error('city') is-invalid @enderror" name="address[city]"
                                         value="{{ $user->address->city }}" required autocomplete="name" autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip code</label>

                                <div class="col-md-6">
                                    <input id="zip_code" type="text"
                                           class="form-control @error('zip_code') is-invalid @enderror" name="address[zip_code]"
                                           required autocomplete="name" autofocus>

                                    @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="street" class="col-md-4 col-form-label text-md-end">Street</label>

                                <div class="col-md-6">
                                    <input id="street" type="text"
                                           class="form-control @error('street') is-invalid @enderror" name="address[street]"
                                           required autocomplete="name" autofocus>

                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="street_no" class="col-md-4 col-form-label text-md-end">Street number</label>

                                <div class="col-md-6">
                                    <input id="street_no" type="text"
                                           class="form-control @error('street_no') is-invalid @enderror" name="address[street_no]"
                                            autocomplete="name" autofocus>

                                    @error('street_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="home_no" class="col-md-4 col-form-label text-md-end">Home number </label>

                                <div class="col-md-6">
                                    <input id="home_no" type="text"
                                           class="form-control @error('address.home_no') is-invalid @enderror" name="address[home_no]"
                                              autocomplete="name" autofocus>

                                    @error('address.home_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
