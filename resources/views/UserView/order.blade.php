@extends('UserView.dashboard') @section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">LATEST ORDER DETAIL</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Order</li>
            </ol>
        </nav>
    </div>
</div>

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        @if(!$order)
            <h1 class="text-center">You Havent Ordered Yet</h1>
        @else
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th style="display: none;" class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $details = $order->cart->detailCart;
                            $totalPrice = 0;
                            @endphp

                            @foreach( $details as $item)
                            <tr class="table-body-row">
                                <input type="hidden" id="detailCartId{{$loop->index}}" value="{{ $item->id }}">
                                <td class="product-image"><img src="{{ asset($item->menu->image) }}" alt=""></td>
                                <td class="product-name">{{$item->menu->name}}</td>
                                <td style="display: none;" class="product-price" id="productPrice{{$loop->index}}">{{$item->menu->price}}</td>
                                <td class="product-quantity">
                                    <input type="number" id="quantityInput{{$loop->index}}" value="{{$item->quantity}}" placeholder="{{$item->quantity}}" disabled>
                                </td>
                                <td class=" product-total" id="productTotal{{$loop->index}}">{{ $item->menu->price * $item->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <br>
            <br>


            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td id="subtotal">{{$order->total/110 * 100}}</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Tax: </strong></td>
                                <td id="tax">{{$order->total/110 * 10}}</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td id="total">{{$order->total}}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
    @endif
</div>

@endsection