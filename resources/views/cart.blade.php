@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('removed_product_from_cart'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('removed_product_from_cart') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            @if(Session::has('empty_cart'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('empty_cart') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                {{--            <th style="width:8%">Quantity</th>--}}
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0 ?>

            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity'] ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img
                                        src="{{ asset('storage/'. $details['photo']) }}"
                                        width="100" height="100" class="img-responsive"/>
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Subtotal" class="text-center">
                            ${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <form method="GET" action="/cart/update/{{ $id }}">
                                <input type="number" name="quantity" min="1" value="{{ $details['quantity'] }}"
                                       class="form-control quantity"/>
                                <button type="submit" class="btn btn-danger btn-sm remove-from-cart"><i
                                        class="fa fa-trash-o">Update</i></button>
                            </form>

                            <form method="POST" action="/remove-from-cart/delete/{{ $id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm remove-from-cart"><i
                                        class="fa fa-trash-o">Delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-center">
                    <button type="submit"
                            class="btn btn-lg btn-primary text-uppercase d-flex justify-content-center mt-5">
                        Buy now
                    </button>
                </div>
            </form>
            </tbody>
            <tfoot>

            <tr>
                <td><a href="{{ url('/welcome') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
