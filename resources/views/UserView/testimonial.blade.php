@extends('UserView.dashboard') @section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Testimonial</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Sensational dining experience! The flavors at Flavorscape are truly extraordinary, and the
                    attention to detail in each dish is impeccable. A must-visit for food enthusiasts!</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/alex.png"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Alexander Olivio</h5>
                        <small>CTO of Transcorp</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Exceptional service and a delectable menu make Flavorscape a standout dining destination.
                    From
                    the first bite to the last, every dish is a masterpiece.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/yoga.png"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Yoga Vinanda Sembiring</h5>
                        <small>Senior Lawyer</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>An absolute gem! Flavorscape captivates with its delightful ambiance and a menu that promises
                    a
                    gastronomic adventure. Each dish is a celebration of taste and creativity.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Elizabeth Hanna</h5>
                        <small>CEO of Digimaya Group</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Outstanding culinary journey! Flavorscape exceeded all expectations with its diverse menu and
                    impeccable presentation. Every visit is a delightful exploration of flavors.
                </p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Renatta Moeloek</h5>
                        <small>Celebrity Chef</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection