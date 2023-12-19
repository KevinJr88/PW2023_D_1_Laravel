@extends('UserView.dashboard') @section('content')
<style>
.bg-glass {
    background-color: rgba(0, 0, 0, 0.1) !important;
    box-shadow: 0 0 10px #000;
}

.form {
    font-size: 1.2em;
}
</style>
<div class="container-xxl py-5 bg-dark hero-header mb-5">

    <section>
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-3">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10"></div>
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <div>
                                <h1 class="mb-3 text-center text-light">Register</h1>
                            </div>
                            @if (session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                            @endif
                            <form class="post" action="{{route('actionRegister')}}" method="POST">
                                @csrf

                                <div class="form-floating mb-2 py-1">
                                    <input type="text" name="name" class="form-control" id="floatingInputNama"
                                        placeholder="Nama" required />
                                    <label for="floatingInputNama">Full Name</label>
                                </div>
                                <div class="form-floating mb-2 py-1">
                                    <input type="text" name="username" class="form-control" id="floatingInputUsername"
                                        placeholder="Username" required />
                                    <label for="floatingInputUsername">Username</label>
                                </div>
                                <div class="form-floating mb-2 py-1">
                                    <input type="email" name="email" class="form-control" id="floatingInputEmail"
                                        placeholder="Email" required />
                                    <label for="floatingInputEmail">Email</label>
                                </div>
                                <div class="form-floating mb-2 py-1">
                                    <input type="number" name="phone" class="form-control" id="floatingInputPhone"
                                        placeholder="Telepon" required style="width: 100%;" />
                                    <label for="floatingInputPhone">Phone Number</label>
                                </div>
                                <div class="form-floating mb-2 py-1">
                                    <input type="address" name="address" class="form-control" id="floatingInputAddress"
                                        placeholder="Address" required />
                                    <label for="floatingInputAdress">Address</label>
                                </div>

                                <div class="form-floating mb-2 py-1">
                                    <input type="password" name="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" required />
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <button type="submit" style="width: 100%;"
                                    class="btn btn-block btn-primary mb-1 mt-3 py-2">
                                    Register
                                </button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>

@endsection