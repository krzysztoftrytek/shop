@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    <div class="tab-pane  fade  active show" id="orders" role="tabpanel"
         aria-labelledby="orders-tab">
        <h4 class="font-weight-bold mt-0 mb-4">Past Orders</h4>
    </div>
    </div>
    @foreach($orders as $order)
    <div class="container">
        <div class="row">
            <div class="col-md-9 mt-5">
                <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                    <div class="tab-content" id="myTabContent">

                        <div class="bg-white card  order-list shadow-sm">
                            <div class="gold-members p-4">
                                <a href="#">
                                </a>
                                <div class="media">
                                    <div class="media-body">

                                        <p class="text-gray mb-3"><i class="icofont-list"></i> Order ID:{{ $order->id }}</p>
                                                <p> {{ $order->created_at }}</p>

                                        <p class="mb-0 text-black text-primary pt-2"><span
                                                class="text-black font-weight-bold"> Total Paid:</span> {{ $order->price }}
                                        </p>
                                        <div class="float-right">
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('orders.show',$order->id) }}"><i
                                                    class="icofont-headphone-alt"></i> Show</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container mt-5">
        {{ $orders->links() }}
    </div>

@endsection
