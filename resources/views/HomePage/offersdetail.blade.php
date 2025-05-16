@extends('layouts.webSite')
@section('title', 'offers-detail')
@section('content')

<div id="about">
    <section class="BeachFront mt-5">
        <div class="container">
            <div class="row form-check-all">
            <div class="banner-form-container">
        <h5 class="pb-2">Don't Miss Out - Check Your Discount Today </h5>
        <form class="banner-form">
            @csrf
            <div class="form-group">
                <label for="checkin">Check-in Date</label>
                <input type="date" id="checkin" name="checkin" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="checkout">Check-out Date</label>
                <input type="date" id="checkout" name="checkout" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="guests">No. of Guests</label>
                <input type="number" id="guests" name="guests" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" class="form-control" pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
                <div class="col-lg-8 col-md-7">
                    <div class="d-flex flex-column ">
                        <div class="d-flex flex-column gap-lg-4 aos-init aos-animate" data-aos="fade-down">
                            <h2>Beachfront Suite</h2>
                            <p>Two Levels / Private PoolFull /
                                    Kitchen
                            </p>
                            <div class="d-flex align-items-center flex-wrap gap-3 ">
                                <div class="d-flex align-items-center gap-2"><span>4 Guests</span>/</div>
                                <div class="d-flex align-items-center gap-2"><span>15 ft</span>/</div>
                                <div class="d-flex align-items-center gap-2"><span>2 King Beds</span>/</div>
                                <div class="d-flex align-items-center gap-2"><span>2
                                        Bathrooms</span></div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mx-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip.</p>
                            <p>
                                Lorem ipsum dolor sit amet unde omnis iste natus error sit voluptatem accusantium
                                doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia
                                voluptas
                                sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
                                ratione
                                voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor
                                sit
                                amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt
                                ut
                                labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis
                                nostrum exercitationem ullam corporis suscipit laboriosam.
                            </p>
                            <p>Lorem ipsum dolor sit amet quidem rerum facilis est et expedita distinctio. Nam
                                libero
                                tempore, cum soluta
                                nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat
                                facere
                                possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem
                                quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et
                                voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic
                                tenetur
                                a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut
                                perferendis doloribus asperiores repellat.</p>
                        </div>
                        <figure>
                            <img src="./assets/img/roomdetail.webp" alt="roomdetail">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div>
                        <div data-aos="fade-down" class="aos-init aos-animate">
                            <h4>Family-friendly Amenities</h4>
                            <div class="d-flex flex-column pt-lg-5">
                                
                                    <p>Kids Swimming Pool</p>
                                
                                <hr>
                                
                                    <p>Extra Beds/Baby Crib</p>
                                
                                <hr>
                                
                                    <p>Washing Machine</p>
                                
                                <hr>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-lg-3 aos-init aos-animate" data-aos="flip-left">
                            <div class="d-flex flex-column w-100 ps-md-3 pt-md-3 pb-md-3 position-relative">
                                <img src="./assets/img/roomstay.webp" alt="stay">
                                
                            </div>
                            <div class="d-flex flex-column gap-2 h-100 justify-content-center ">
                                <h5>Enjoy Your Stay</h5>
                                <p>Lorem ipsum dolor sit amet, consect adipiscing elit.</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex flex-column gap-2 w-100 aos-init aos-animate" data-aos="fade-up">
                                <a href="" class="hover2"><i class="fa-solid fa-phone-volume"></i> Call</a>
                                <a href="https://live.ipms247.com/booking/book-rooms-hotelrajhansinternational" class="hover2"> Book  Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <section class="OurRoom mt-0">
        <div class="container">
            <div>
                <h2>Similar Rooms</h2>
            </div>
            <div class="row pt-lg-3 mt-lg-3 pt-4">
                <div class="col-md-4">
                    <div class="d-flex flex-column gap-3 aos-init aos-animate" data-aos="flip-left">
                        <figure><img src="./assets/img/rooms-1.jpg" alt="image"></figure>
                        <h5>Premium Room</h5>
                        <div class="d-flex align-items-center flex-wrap gap-3 ">
                            <div class="d-flex align-items-center gap-2"><span>4 Guests</span></div>
                            <div class="d-flex align-items-center gap-2"><span>2 King Beds</span></div>
                            <div class="d-flex align-items-center gap-2"><span>2 Bathrooms</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor nulla
                            incididunt ut labore et dolore magna aliqua. Ut enim ad ex minim veniam, quis
                            exercitation.</p>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column gap-3 aos-init aos-animate" data-aos="flip-right">
                        <figure>
                            <img src="./assets/img/rooms-6.jpg" alt="image">
                        </figure>
                        <h5>Cottage Room</h5>
                        <div class="d-flex align-items-center flex-wrap gap-3">
                            <div class="d-flex align-items-center gap-2"><span>4 Guests</span></div>
                            <div class="d-flex align-items-center gap-2"><span>2 King Beds</span></div>
                            <div class="d-flex align-items-center gap-2"><span>2 Bathrooms</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor nulla
                            incididunt ut labore et dolore magna aliqua. Ut enim ad ex minim veniam, quis
                            exercitation.</p>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column gap-3 aos-init aos-animate" data-aos="flip-left">
                        <figure><img src="./assets/img/rooms-4.jpg" alt="image"></figure>
                        <h5>Beachfront Suite</h5>
                        <div class="d-flex align-items-center flex-wrap gap-3">
                            <div class="d-flex align-items-center gap-2"><span>4 Guests</span></div>
                            <div class="d-flex align-items-center gap-2"><span>2 King Beds</span></div>
                            <div class="d-flex align-items-center gap-2"><span>2 Bathrooms</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor nulla
                            incididunt ut labore et dolore magna aliqua. Ut enim ad ex minim veniam, quis
                            exercitation.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
<style>
    .hover2 {
    display: inline-block;
    position: relative;
    overflow: hidden;
    border: 1px solid #8A1B61;
    color: #8A1B61;
    z-index: 1;
    padding: 10px 35px;
    transition: all 0.9s ease;
    text-align: center;
}
.hover2:hover {
    color: #ffff !important;
    background-color: #8A1B61
}
.OurRoom figure img{
    width:400px;
}
</style>
<style>
    .banner-form-container {
    position: absolute;
    top: 240px;
    /* left: 10%; */
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.85);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 1270px;
    /* z-index: 10; */
}
    
    /* Flex layout for the form */
    .banner-form {
        display: flex;
        flex-wrap: wrap; /* Allow wrapping on smaller screens */
        gap: 15px; /* Space between items */
        justify-content: space-between; /* Spread items evenly */
        align-items: center; /* Align items vertically */
        text-align: justify;
    }
    .banner-form .form-group {
    flex: 1;
    font-size: 18px;
    min-width: 220px;
    margin-bottom: 0;
}
    
    /* Full-width button */
    .banner-form .form-group.button-group {
        flex: 0 0 100%; /* Button takes full row */
    }
    
    /* Styling for input fields */
    .banner-form .form-control {
        width: 100%; /* Ensure full width */
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }
    @media (max-width: 992px) {
    .banner-form .btn {
        max-width: 145px !important;
        min-width: 145px !important;
        /* margin-bottom: 60px; */
    }
}
    /* Styling for the button */
    .banner-form .btn {
    padding: 10px;
    background-color: rgb(var(--yellow-color));
    color: #fff;
    border: none;
    border-radius: 5px;
    max-width: 200px;
    min-width: 200px;
    cursor: pointer;
    font-size: 16px;
}
@media(max-width:992px){
    .banner-form-container {
    position: absolute;
    top: 264px !important;
    right:5% !important;
    left:5% !important;
}
.banner-form .form-group {
    flex: 1;
    font-size: 18px;
    min-width: 155px !important;
    margin-bottom: 0;
}
.banner-form {
    gap: 8px !important;
}
.banner-form .btn {

    max-width: 145px !important;
    min-width: 145px !important;
}
}
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .banner-form-container {
    max-width: 100%;
    left: 5%;
    top: 422px !important;
    right: 5%;
    padding: 15px;
}
.banner-form {
    display: flex;
    flex-wrap: wrap;
    gap: 5px !important;
    justify-content: space-between;
    align-items: center;
    text-align: justify;
}
.form-group textarea.form-control, .form-group select.form-control, .form-group input.form-control {
    padding: 6px 6px !important;
}
        
        .banner-form .form-group {
            flex: 1 1 100%; /* Stack inputs on small screens */
        }
        
        .banner-form .form-group.button-group {
            flex: 1 1 100%; /* Ensure button spans full width */
        }
    }
    </style>
@endsection