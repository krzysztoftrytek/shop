@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($message = Session::get('error'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="container">
            @if ( Session::has('product_already_exist'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('product_already_exist') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @php
                    Session::forget('product_already_exist');
                @endphp
            @endif
            <div class="container">
                @if (Session::has('success_added'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success_added') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-md-8 order-md-2 col-lg-9">
                            <div class="container-fluid">
                                <div class="row   mb-5">
                                    <div class="col-12">
                                        <div
                                            class="dropdown text-md-left text-center float-md-left mb-3 mt-3 mt-md-0 mb-md-0">
                                            <form class="input-group mb-5" method="get"
                                                  action="{{ url('/welcome/search') }}">
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
                                        <div class="btn-group float-md-right ml-3">
                                            <button type="button" class="btn btn-lg btn-light"><span
                                                    class="fa fa-arrow-left"></span></button>
                                            <button type="button" class="btn btn-lg btn-light"><span
                                                    class="fa fa-arrow-right"></span></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-6 col-md-6 col-lg-4 mb-3">
                                            <div class="card h-100 border-0">
                                                <div class="card-img-top image_size">
                                                    @if(!is_null($product->image))
                                                        <img src="{{ asset('storage/'. $product->image) }}"
                                                             class="img-fluid mx-auto d-block" alt="Card image">
                                                    @else
                                                        <img src="{{ asset('storage/products/default.jpg')}}"
                                                             class="img-fluid mx-auto d-block" alt="Card image">
                                                    @endif
                                                </div>
                                                <div class="card-body text-center">
                                                    <h4 class="card-title">
                                                        <a href="{{ route('shop.show', $product->id) }}"
                                                           class=" font-weight-bold text-dark text-uppercase small">
                                                            {{ $product->name }}</a>
                                                    </h4>
                                                    <h5 class="card-price small text-warning">
                                                        <i>
                                                            {{ $product->price }} </i>
                                                    </h5>
                                                </div>
                                                <div class="card-footer text-xl-center add-cart">
                                                    <p class="btn-holder">
                                                        <a href="{{route('addToCart', $product->id) }}"
                                                           class="btn btn-warning btn-block text-center"
                                                           role="button">Add to cart</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row sorting mb-5 mt-5">
                                    <div class="col-12">
                                        <a class="btn btn-light">
                                            <i class="fas fa-arrow-up mr-2"></i> Back to top</a>
                                        <div class="btn-group float-md-right ml-3">
                                            <button type="button" class="btn btn-lg btn-light"><span
                                                    class="fa fa-arrow-left"></span></button>
                                            <button type="button" class="btn btn-lg btn-light"><span
                                                    class="fa fa-arrow-right"></span></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
                            <form method="get" action="{{ url('/welcome/filters') }}">
                                <h3 class="mt-0 mb-5">Showing <span class="text-primary">{{ $products->count()}}</span>
                                    Products
                                </h3>
                                <h6 class="text-uppercase font-weight-bold mb-3">Categories</h6>

                                @foreach( $categories as $category)
                                    <div class="mt-2 mb-2 pl-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="filter[categories][]"
                                                   id="{{ $category->id }}"
                                                   value="{{ $category->id }}">
                                            <label class="custom-control-label"
                                                   for="{{ $category->id }}">{{ $category->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Price</h6>
                                <div class="price-filter-control">
                                    <input type="number" class="form-control w-50 pull-left mb-2"
                                           name="price_min"
                                           @if(isset($min))
                                           value="{{ $min  }}"
                                           @else
                                           value="20"
                                           @endif id="price-min-control">
                                    <input type="number" class="form-control w-50 pull-right"
                                           name="price_max"
                                           @if(isset($max))
                                           value="{{ $max  }}"
                                           @else
                                           value="5000"
                                           @endif
                                           id="price-max-control">
                                </div>
                                <div class="divider mt-5 mb-5 border-bottom border-secondary">
                                    <button class="btn btn-lg btn-block btn-primary mt-5 filter_button"
                                            id="filter_button">Update Results
                                    </button>
                                </div>
                            </form>
                            <div class="mt-5">

                            </div>
                        </div>

                    </div>
                    <div class="justify-content-end d-flex">{{ $products->links() }} </div>
                </div>
                <div>
                </div>

                <script src="/public/assets/jquery.js/"></script>
            </div>
        </div>
    </div>

@endsection

