@extends('UserView.dashboard') @section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table" style="table-layout: auto;">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th style="display: none;" class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $length = count($detailCarts);
                            @endphp
                            <input type="hidden" id="detailCartsLength" value="{{ $length }}">
                            @foreach ($detailCarts as $item)
                            <tr class="table-body-row">
                                <input type="hidden" id="detailCartId{{$loop->index}}" value="{{ $item->id }}">
                                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                <td class="product-image"><img src="{{ asset($item->menu->image) }}" alt=""></td>
                                <td class="product-name">{{$item->menu->name}}</td>
                                <td style="display: none;" class="product-price" id="productPrice{{$loop->index}}">{{$item->menu->price}}</td>
                                <td class="product-quantity">
                                    <input type="number" id="quantityInput{{$loop->index}}" value="{{$item->quantity}}" placeholder="{{$item->quantity}}" onchange="updateSubTotal({{$loop->index}}); updateTotal()" onload="updateSubTotal({{$loop->index}}); updateTotal()">
                                </td>
                                <td class=" product-total" id="productTotal{{$loop->index}}"></td>
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
                                <td id="subtotal"></td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Tax: </strong></td>
                                <td id="tax"></td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td id="total"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <!-- <a href="#" class="boxed-btn">Update Cart</a> -->
                        <form action="{{route('createOrder')}}" method="POST">
                            @csrf
                            <!-- <a onclick="checkout()" class="boxed-btn black"><Button>Check Out</Button></a> -->
                            <button onclick="checkout()" type="submit">Check Out</button>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var csrfToken = "{{ csrf_token() }}";
</script>
<script>
    window.onload = function() {
        // Call the updateSubTotal function for each input
        var length = document.getElementById('detailCartsLength').value;
        for (let index = 0; index < length; index++)
            updateSubTotal(index);
        updateTotal();
    };

    function updateSubTotal(index) {
        var quantity = document.getElementById('quantityInput' + index).value;
        var price = document.getElementById('productPrice' + index).innerText;
        document.getElementById('productTotal' + index).innerText = quantity * price;

    }

    function updateTotal() {
        var length = document.getElementById('detailCartsLength').value;
        var subtotal = 0;
        for (let index = 0; index < length; index++) {
            var quantity = document.getElementById('quantityInput' + index).value;
            var price = document.getElementById('productPrice' + index).innerText;
            document.getElementById('productTotal' + index).innerText = quantity * price;
            subtotal +=
                price * quantity;
        }
        document.getElementById('subtotal').innerText = subtotal;
        document.getElementById('tax').innerText = subtotal * 0.1;
        var total = subtotal * 1.1;
        document.getElementById('total').innerText = total.toFixed(2);
    }

    function checkout() {
        // Update the database with the current quantities
        console.log('ngetest');
        var length = document.getElementById('detailCartsLength').value;
        for (let index = 0; index < length; index++) {
            var quantity = document.getElementById('quantityInput' + index).value;
            var detailCartId = document.getElementById('detailCartId' + index).value;

            // Make an AJAX request to update the quantity in the database
            // Replace 'your_update_route' with the actual route to update the quantity
            // You may also want to add CSRF token verification
            // Example:
            // var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Note: This example assumes you have a route named 'updateQuantity' in your Laravel routes file.
            $.ajax({
                url: '/updateQuantity',
                type: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                data: JSON.stringify({
                    detailCartId: detailCartId,
                    quantity: quantity,
                }),
                success: function(data) {
                    console.log('Quantity updated successfully:', data);
                    // Optionally, you can update the UI or perform additional actions here
                },
                error: function(error) {
                    console.error('Error updating quantity:', error.responseText);
                }
            });
        }

        // Optionally, you can redirect the user to a confirmation page or perform other actions
    }
</script>
@endsection