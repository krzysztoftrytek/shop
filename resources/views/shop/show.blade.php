@extends('layouts.app')

@section('content')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container pt-5">
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
        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            <div><a href="#"><img class="img-fluid" src="{{ asset('storage/'. $product->image) }}"></a>
                            </div>
                        </div> <!-- slider-product.// -->
                        <div class="img-small-wrap">
                            <div class="item-gallery"></div>
                            <div class="item-gallery"><img src="https://s9.postimg.org/tupxkvfj3/image.jpg"></div>
                            <div class="item-gallery"><img src="https://s9.postimg.org/tupxkvfj3/image.jpg"></div>
                            <div class="item-gallery"><img src="https://s9.postimg.org/tupxkvfj3/image.jpg"></div>
                        </div> <!-- slider-nav.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{ $product->name }}</h3>

                        <p class="price-detail-wrap">
	<span class="price h3 text-warning">
		<span class="currency">US $</span><span class="num">{{ $product->price }}</span>
	</span>
                        </p> <!-- price-detail-wrap .// -->
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>{{ $product->description }}</p></dd>
                        </dl>
                        <dl class="param param-feature">
                            <dt>Model#</dt>
                            <dd>12345611</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>Color</dt>
                            <dd>Black and white</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>Delivery</dt>
                            <dd>Russia, USA, and Europe</dd>
                        </dl>  <!-- item-property-hor .// -->

                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="param param-inline">
                                    <dt></dt>
                                    <dd>
                                        <select class="form-control form-control-sm" style="width:70px;">
                                                <option>

                                                </option>
                                        </select>
                                    </dd>
                                </dl>  <!-- item-property .// -->
                            </div> <!-- col.// -->
                            <div class="col-sm-7">
                                <dl class="param param-inline">
                                    <dt>Size:</dt>
                                    <dd>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio2" value="option2">
                                            <span class="form-check-label">SM</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio2" value="option2">
                                            <span class="form-check-label">MD</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio2" value="option2">
                                            <span class="form-check-label">XXL</span>
                                        </label>
                                    </dd>
                                </dl>  <!-- item-property .// -->
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr>
                        <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
                        <a href="{{route('addToCart', $product->id) }}" class="btn btn-lg btn-outline-primary text-uppercase"> <i
                                class="fas fa-shopping-cart"></i> Add to cart </a>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->


    </div>
    <!--container.//-->
@endsection
