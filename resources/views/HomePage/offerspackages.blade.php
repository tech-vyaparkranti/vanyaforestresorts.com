@extends('layouts.webSite')
@section('title', 'Offers & Packages')
@section('meta_description', 'Discover exclusive offers and packages at Trinantara Resort & Spa, Jim Corbett. From
    romantic getaways to family vacations, enjoy luxury stays, exciting activities, and incredible deals tailored just for
    you.')
@section('meta_keywords', 'Destination Wedding in jim Corbett, adventure activities in jim Corbett, Holiday packages jim
    Corbett, Family Stay in Jim Corbett, Best Resort in Jim Corbett, 5 star resort in jim corbett')
@section('content')

    <div id="about">
        <div class="default-content service-page pt-4 pb-3">
            <div class="destinations pb-2 pt-2 mb-4">
                <div class="custom-container form-check-all">
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
                    <div class="site-title text-center pb-5">
                        <h1><label>Offers & </label> Packages</h1>
                    </div>
                    <div class="row g-4 justify-content-center">
                      @if(isset($offer_packages) && count($offer_packages) > 0)
                            @foreach ($offer_packages as $item)
                              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="{{ asset($item->image) }}" alt="{{ $item->heading_top }}" />
                                    </div>
                                    <div class="border-bottom">
                                        <h5 class="text-center  py-2">{{ $item->heading_top }}
                                        </h5>
                                    </div>
                                    <div class="p-2">
                                        {!! $item->heading_middle !!}
                                        {{-- <ul> --}}
                                            {{-- <li>Accommodation in luxurious rooms</li>
                                            <li>Conference hall with audio-visual equipment</li>
                                            <li> Customized team-building activities</li>
                                            <li> Fine dining and refreshments </li>
                                            <li> Recreational facilities (pool, gym)</li> --}}
                                            {{-- <li>{{ $item->heading_middle }}</li> --}}
                                        {{-- </ul> --}}
                                        <div class="d-flex justify-content-center mb-2 flex-fill">
                                            <a href="{{ route('contactUs') }}" class="book-amenities">Contact US</a>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            @endforeach
                        @else
                            <!-- Package 1 -->
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/corporateevent5.jpg" alt="Banquet Hall" />
                                    </div>
                                    <div class="border-bottom">
                                        <h5 class="text-center  py-2">Empower Your Team: Corporate Retreat at  VanyaForestResort
                                        </h5>
                                    </div>
                                    <div class="p-2">
                                        <ul>
                                            <li>Accommodation in luxurious rooms</li>
                                            <li>Conference hall with audio-visual equipment</li>
                                            <li> Customized team-building activities</li>
                                            <li> Fine dining and refreshments </li>
                                            <li> Recreational facilities (pool, gym)</li>
                                        </ul>
                                        <div class="d-flex justify-content-center mb-2 flex-fill">
                                            <a href="{{ route('contactUs') }}" class="book-amenities">Contact US</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Package 2 -->
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/destination.jpeg" alt="Beauty Parlour" />
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <h5 class="text-center  py-2">Celebrate Eternal Love: Wedding Bliss at VanyaForestResort
                                        </h5>
                                    </div>
                                    <div class=" p-2">
                                        <ul>
                                            <li>Exclusive venue with decorations</li>
                                            <li> Customized wedding menu
                                            </li>
                                            <li>Accommodation for bride, groom, and family
                                            </li>
                                            <li>Dedicated wedding coordinator
                                            </li>
                                            <li>Complimentary welcome drinks</li>
                                        </ul>
                                        <div class="d-flex justify-content-center mb-2 flex-fill">
                                            <a href="{{ route('contactUs') }}" class="book-amenities">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Package 3 -->
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/freetraveler.jpg" alt="Executive Room" />
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <h5 class="text-center  py-2">
                                            Escape to Serenity: Relaxation Package at VanyaForestResort
                                        </h5>
                                    </div>
                                    <div class=" p-2">
                                        <ul>
                                            <li>Luxurious room accommodation</li>
                                            <li>Breakfast and dinner
                                            </li>
                                            <li>Guided nature walk/jungle safari
                                            </li>
                                            <li>Complimentary Wi-Fi
                                            </li>
                                            <li>Access to recreational facilities</li>
                                        </ul>
                                        <div class="d-flex justify-content-center mb-2 flex-fill">
                                            <a href="{{ route('contactUs') }}" class="book-amenities">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/family.jpg" alt="Beauty Parlour" />
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <h5 class="text-center  py-2">Create Memories: Family Fun at VanyaForestResort</h5>
                                    </div>
                                    <div class=" p-2">
                                        <ul>
                                            <li>Accommodation in family rooms/suites</li>
                                            <li>Kids' play area and activities</li>
                                            <li>Family-friendly dining options</li>
                                            <li>Outdoor games and recreational facilities</li>
                                            <li>Complimentary kids' meals</li>
                                        </ul>
                                        <div class="d-flex justify-content-center mb-2 flex-fill">
                                            <a href="{{ route('contactUs') }}" class="book-amenities">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/romanticpackage.jpg"
                                            alt="Beauty Parlour" />
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <h5 class="text-center  py-2">Rekindle Love: Romantic Escape at VanyaForestResort</h5>
                                    </div>
                                    <div class=" p-2">
                                        <ul>
                                            <li>Luxurious room accommodation</li>
                                            <li>Candlelit dinner</li>
                                            <li>Private poolside cabana</li>
                                            <li>Complimentary champagne and chocolates</li>
                                            <li>Special room decorations</li>
                                        </ul>
                                        <div class="d-flex justify-content-center mb-2 flex-fill">
                                            <a href="{{ route('contactUs') }}" class="book-amenities">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/honeymoonpackage.jpg"
                                            alt="Beauty Parlour" />
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <h5 class="text-center  py-2">Blissful Beginnings: Honeymoon Package at VanyaForestResort
                                        </h5>
                                    </div>
                                    <div class=" p-2">
                                        <ul>
                                            <li> Luxurious room accommodation</li>
                                            <li>Romantic dinner setup</li>
                                            <li>Complimentary champagne and chocolates</li>
                                            <li>Complimentary small cake</li>
                                            <li>Special room decorations</li>
                                        </ul>
                                        <div class="d-flex justify-content-center mb-2 flex-fill">
                                            <a href="{{ route('contactUs') }}" class="book-amenities">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
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
    top: 390px !important;
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
