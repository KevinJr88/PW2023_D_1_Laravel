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

.fillData {
    color: white;
    background-color: #292929;

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



<div class="container-xxl py-5 bg-dark mb-5">
    <section>
        <br>
        <div class="container bg-glass px-4 py-5  text-center text-lg-start my-5" style="overflow-y:auto">
            <div class="d-flex justify-content-center text-light">
                <h1 style="color: white">
                    Our Menu
                </h1>

            </div>
            <br>
            <div class="d-flex justify-content-center ">
                <a href="#" class="cat-menu mx-3 active">
                    All
                </a>
                <a href="{{ url('/burger') }}" class="cat-menu mx-3 ">
                    Burger
                </a>
                <a href="{{ url('/pizza') }}" class="cat-menu mx-3">
                    Pizza
                </a>
                <a href="{{ url('/noodle') }}" class="cat-menu mx-3">
                    Noodle
                </a>
                <a href="{{ url('/steak') }}" class="cat-menu mx-3">
                    Steak
                </a>
            </div>


            <div
                class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 py-5 d-flex justify-content-around ">
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="/images/makanan/chicken.png" alt="">
                    </div>
                    <div class="" style="padding:10px">
                        <h5>Classic Chicken Burger</h5>
                        <p>A classic burger with original recipe deep fried chicken, mayonnaise and lettuce, served with
                            hot
                            bun.</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$4</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="/images/makanan/doublebun.png" alt="">
                    </div>
                    <div class="" style="padding:10px">
                        <h5>Double Bun Burger</h5>
                        <p>served with fresh australia double beef patty,
                            original sauce, lettuce, cheddar cheese and triple hot bun.</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$6</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="/images/makanan/burger.png" alt="">
                    </div>
                    <div class="" style="padding:10px">
                        <h5>Meatload Burger</h5>
                        <p>Most favorite among customer. served with 200 Gram beef. cheddar cheese, tomato, letture and
                            favorite sauce.</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$8</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="/images/makanan/fish.png" alt="">
                    </div>
                    <div class="" style="padding:10px">
                        <h5>Fish Burger</h5>
                        <p>Fish burger served with Dori fish and original recipe, letture and mayonnaise.
                            very reccomend for kids menu.</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$6</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="/images/makanan/pizza3.png" alt="">
                    </div>
                    <div class="" style="padding:10px">
                        <h5>Classic Papperoni Pizza</h5>
                        <p>Fresh dough from handmade Italian original recipe.
                            A Classis pork papperoni with mozzarella cheese</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$45</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="/images/makanan/pizza4.png" alt="">
                    </div>
                    <div class="" style="padding:10px">
                        <h5>Seafood Pizza</h5>
                        <p>Fresh dough from handmade Italian original recipe. served with
                            fish, shrimp, and cheedar cheese</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$45</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="https://static.vecteezy.com/system/resources/previews/027/144/740/non_2x/tasty-fried-noodles-on-transparent-background-png.png"
                            alt="">
                    </div>
                    <div class="" style="padding:10px;">
                        <h5>Fried Noodle</h5>
                        <p>Indonesian Fried Noodle served with chicken, soy sauce, sesame oil,
                            tradisional sauce and served with kerupuk</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$8</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="images/makanan/tot.png" alt="">
                    </div>
                    <div class="" style="padding:10px;">
                        <h5>Tonkotsu Ramen</h5>
                        <p>Tonkotsu ramen is based upon pork bones. Additional broth ingredients can include onion,
                            garlic,
                            spring onions,
                            ginger, pork back fat, pig's trotters, oil and chicken carcasses which was cooked for 8
                            hours.
                        </p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$10</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="images/makanan/shio.png" alt="">
                    </div>
                    <div class="" style="padding:10px;">
                        <h5>Shio Ramen</h5>
                        <p>Broth made with plenty of salt and any combination of chicken, vegetables, fish, and seaweed.
                            the soup remains light and clear.</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$10</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="images/makanan/seafood.png" alt="">
                    </div>
                    <div class="" style="padding:10px;">
                        <h5>Seafood Ramen</h5>
                        <p>Ramen broth made with plenty of salt with tradisional light soy sauce, shrimp, seaweed, fish
                            stock</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$10</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col card sizeCard fillData" style="padding:0px">
                    <div class="img-box">
                        <img src="/images/makanan/kentang.png" alt="">
                    </div>
                    <div class="" style="padding:10px">
                        <h5>Chips</h5>
                        <p>Fresh potato from local farmer in Indonesia and served deep fried until golden brown.
                            very reccomend for side dish.</p>
                        <div class="d-flex justify-content-between w-100 p-2">
                            <h5>$5</h5>
                            <a href="{{ url('menuCheckout') }}">
                                <div
                                    style="border-radius: 50px; width: 35px; height: 35px; background-color: orange; padding: 5px 10px 8px 8px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                                        class="bi bi-cart-plus-fill" viewBox="0 -2 18 18" style="color:white;">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
</div>
@endsection