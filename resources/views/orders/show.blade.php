@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="text-xl-center">ORDER NR: {{ $order->id }}</h1>
    </div>
    <?php $total = 0; ?>
    @foreach($order->products as $product)
       <?php $subtotal = $product->amount * $product->price; ?>
       <?php $total += $product->amount * $product->price; ?>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product{{ $product->id }}</th>
                <th style="width:10%">Price</th>
                <th style="width:10%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img  src="{{ asset('storage/'. $product['image']) }}"
                                                               width="100" height="100" class="img-responsive"/></div>

                        <div class="col-sm-9">
                            <h4 class="nomargin"> {{ $product->name }} </h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price"> {{ $product->price }}</td>
                <td data-th="Price"> {{ $product->amount }}</td>
                <td data-th="Subtotal" class="text-center">{{ $subtotal }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    @endforeach
    <div class="container mt-3">
        <h2 class="text-xl-center">TOTAL:{{ $order->price }}</h2>
    </div>
@endsection
