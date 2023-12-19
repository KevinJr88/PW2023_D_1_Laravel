@extends('UserView.dashboard') @section('content')
<style>
.form {
    font-size: 1.2em;
}

.gambar {
    /* width: 100%; */
    aspect-ratio: 4/3;
    object-fit: fill;
    border: 2px solid black;
    border-radius: 20px;
    width: 100%;
}

.sizeCard {
    width: 300px;
}

.sizeCard img {
    width: 100%;
    border-radius: 5px 5px 0px 35px;
}




.cat-menu {
    text-decoration: none;
    color: white;
    font-size: 18px;
    padding: 5px;
}

/* .active {
    background-color: #2b2b2b;
    color: white;
    border-radius: 10px;
    padding: 5px 15px 5px 15px;

} */

h1 {
    font-family: 'Dancing Script', cursive;
}

h5 {
    color: white;
}

.fillData {
    color: white;
    background-color: #292929;
    border-radius: 8px;
    font-size: 13px;
}


/* Style the scrollbar track */


.img-box {
    background: #f1f2f3;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    height: 215px;
    border-radius: 0 0 0 45px;
    margin: -1px;
    padding: 25px;
}

.img-box img {
    width: 150px;
    height: 150px;
    transition: transform 0.3s;
}

.img-box img:hover {
    transform: scale(1.35);
}
</style>


<div class="container-xxl py-5 mb-5 background-menu ">
    <section>
        <div class="container bg-glass px-4 py-5  text-center text-lg-start my-5" style="overflow-y:auto">
            <div class="d-flex justify-content-center text-light">
                <h1 style="color: white">
                    Our Menu
                </h1>

            </div>
            <br>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5" style="color:white;">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                            href="#tab-1" style="color:white; font-size:20px">
                            All
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2"
                            style="color:white; font-size:20px">
                            Burger
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                            href="#tab-3" style="color:white; font-size:20px">
                            Pizza
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                            href="#tab-4" style="color:white; font-size:20px">
                            Noodle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                            href="#tab-5" style="color:white; font-size:20px">
                            Steak
                        </a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div
                            class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 py-5 d-flex justify-content-around ">
                            @foreach ($menu as $item)
                            <div class="col card sizeCard fillData" style="padding:0px">
                                <div class="img-box">
                                    <img src="{{ asset('public/menu/' . $item['image']) }}" alt="">
                                </div>
                                <div class="" style="padding:10px;">
                                    <h5>{{ $item->name}}</h5>
                                    <p>{{ $item->desc}}</p>
                                    <div class="d-flex justify-content-between w-100 p-2">
                                        <h5>${{$item->price}}</h5>
                                        <form method="POST" action="{{ route('cart.store', ['id' => $item->id]) }}">
                                            @csrf
                                            <button type="submit" style="border: none; background-color: transparent;">
                                                <div
                                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                        fill="currentColor" class="bi bi-cart-plus-fill"
                                                        viewBox="0 -2 18 18" style="color:white;">
                                                        <path
                                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div
                            class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 py-5 d-flex justify-content-around ">
                            @foreach ($menu as $item)
                            @if($item->category == 'Burger')
                            <div class="col card sizeCard fillData" style="padding:0px">
                                <div class="img-box">
                                    <img src="{{asset('public/menu/' . $item['image']) }}" alt="">
                                </div>
                                <div class="" style="padding:10px;">
                                    <h5>{{ $item->name}}</h5>
                                    <p>{{ $item->desc}}</p>
                                    <div class="d-flex justify-content-between w-100 p-2">
                                        <h5>${{$item->price}}</h5>
                                        <a href="{{ url('menuCheckout') }}">
                                            <div
                                                style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                    fill="currentColor" class="bi bi-cart-plus-fill"
                                                    viewBox="0 -2 18 18" style="color:white;">
                                                    <path
                                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div
                            class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 py-5 d-flex justify-content-around ">
                            @foreach ($menu as $item)
                            @if($item->category == 'Pizza')
                            <div class="col card sizeCard fillData" style="padding:0px">
                                <div class="img-box">
                                    <img src="{{ asset('public/menu/' . $item['image']) }}" alt="">
                                </div>
                                <div class="" style="padding:10px;">
                                    <h5>{{ $item->name}}</h5>
                                    <p>{{ $item->desc}}</p>
                                    <div class="d-flex justify-content-between w-100 p-2">
                                        <h5>${{$item->price}}</h5>
                                        <a href="{{ url('menuCheckout') }}">
                                            <div
                                                style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                    fill="currentColor" class="bi bi-cart-plus-fill"
                                                    viewBox="0 -2 18 18" style="color:white;">
                                                    <path
                                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane fade show p-0">
                        <div
                            class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 py-5 d-flex justify-content-around ">
                            @foreach ($menu as $item)
                            @if($item->category == 'Noodle')
                            <div class="col card sizeCard fillData" style="padding:0px">
                                <div class="img-box">
                                    <img src="{{ asset('public/menu/' . $item['image']) }}" alt="">
                                </div>
                                <div class="" style="padding:10px;">
                                    <h5>{{ $item->name}}</h5>
                                    <p>{{ $item->desc}}</p>
                                    <div class="d-flex justify-content-between w-100 p-2">
                                        <h5>${{$item->price}}</h5>
                                        <a href="{{ url('menuCheckout') }}">
                                            <div
                                                style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                    fill="currentColor" class="bi bi-cart-plus-fill"
                                                    viewBox="0 -2 18 18" style="color:white;">
                                                    <path
                                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-5" class="tab-pane fade show p-0">
                        <div
                            class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 py-5 d-flex justify-content-around ">
                            @foreach ($menu as $item)
                            @if($item->category == 'Steak')
                            <div class="col card sizeCard fillData" style="padding:0px">
                                <div class="img-box">
                                    <img src="{{ asset('public/menu/' . $item['image']) }}" alt="">
                                </div>
                                <div class="" style="padding:10px;">
                                    <h5>{{ $item->name}}</h5>
                                    <p>{{ $item->desc}}</p>
                                    <div class="d-flex justify-content-between w-100 p-2">
                                        <h5>${{$item->price}}</h5>
                                        <a href="{{ url('menuCheckout') }}">
                                            <div
                                                style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                    fill="currentColor" class="bi bi-cart-plus-fill"
                                                    viewBox="0 -2 18 18" style="color:white;">
                                                    <path
                                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!-- Modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel menuId">Menu Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="selected-menu-id" name="selected_menu_id">
                <h2 id="menu-name"></h2>
                <p id="menu-desc">Description: </p>
                <p id="menu-price">Price: $</p>
                <!-- Tambahkan informasi lain yang diperlukan -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>






    </section>
</div>



@endsection