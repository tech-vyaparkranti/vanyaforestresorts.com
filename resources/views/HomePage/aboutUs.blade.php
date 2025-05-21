@extends('layouts.webSite')
@section('title', 'About Vanya Forest Resort & Spa')
@section('meta_description', 'Discover Vanya Forest Resort & Spa, the best luxury retreat in Jim Corbett. Our resort
    offers serene accommodation, spa services and premium hospitality')
@section('meta_keywords', 'Best Resort in Jim Corbett, Vanya Forest Resort & Spa, Riverside resort in Jim Corbett, Resort
    in Jim Corbett national Park, Luxury Resort in Jim Corbett')

@section('content')
    <div class="information-content">
        <ul class="m-auto list-unstyled custom-container">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="">About Us</a></li>
        </ul>
    </div>
    <div id="about">
        <div class="default-content pt-5 pb-3">
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
                <div class="site-title mt-200">
                    <h1 class="text-center">About Vanya Forest resort & spa</h2>
                </div>
                
                <div class="midd-content">
                    <p class="text-justify">{!! $about_us_content ??
                        ' <p class="text-justify"><b>Hotel Raj Hans International </b>offer a unique and expert experience to the modern hoteller. Expect an impeccable level of service from your first point of contact to your last moments of Tour.</p>
                                        <p class="text-justify">Serving since 2018 with our professional and cultural roots in India and armed with specialist knowledge of the Sub-Continent, we offer a unique and expert experience to the modern hoteller.</p>
                                        <p class="text-justify"><b>"Hotel Raj Hans International"</b> is India’s premier Destination Management Company and a reputed hotel designer offer a wide array of hotel experiences to the local hotel agent & foreign tour operator.</p>
                                        <p class="text-justify">At <b>Hotel Raj Hans International</b>, we make customer service and hoteller satisfaction priority. We are dedicated to ensuring that every step of the journey, down to the last detail, is taken care of with in-depth product knowledge and range of services offered, highly trained and motivated teams, an exclusive panel of knowledgeable guides.</p>
                                        <p class="text-justify">Having its presence in three major cities New Delhi, Agra and Varanasi and International office in Kathmandu and with Vast experience & knowledge in the hotel industry have made us a reliable choice for hotel partners. Today, we are considered as the most trusted hotel designer and we set up ourselves as a brand that delivers Luxury.</p>
                                        <p class="text-justify">"Hotel Raj Hans International" only believes in providing a comfortable journey along with a pleasurable stay and memorable trip to the holidaymakers. Right from the day the journey of our esteemed guest begins till the moment it ends, we make sure to offer only quality service and complete assistance to them. We are indulged in offering all types of hotel related services to individuals, groups, students, honeymoon couples, corporate executives, senior citizens, and others.</p>
                                        <p class="text-justify">Keeping these unique needs and expectations in mind, we offer niche specialist platforms for culture, history,religious , meetings & incentives, wildlife & adventure, and luxury.</p>' !!}</p>
                    <h3>Our Mission Statement</h3>
                    <p class="text-justify">{!! $mission ??
                        'Provide a unique hotel experience for our hotel partners in a sustainable, honest and transparent way. Our aim is to become trusted DMC providing a caring, personalized, 24x7, 365 days of the year, rapid response to emergency hotel related services.' !!}</p>
                    <h3>Our Vision Statement</h3>
                    <p class="text-justify">{!! $vision ??
                        '<b>Hotel Raj Hans International</b> vision that in coming days we wants to be a leading example of a tour operator demonstrating sustainable tourism. We wants to grow by offering more and a wider range of unique experience tours.' !!}</p>
                    <h3>Our Values</h3>
                    <p class="text-justify">{!! $value ??
                        'We start our journey from the slogan of <b>“Atithi Devo Bhavah”</b> with Honesty, Transparency, Quality, Personal, Professional & Sustainable community' !!}</p>
                </div>
                {{-- <div class="midd-section">
                  <div class="main-container">
                      <div class="team-section container">
                        <h3 class="text-center pb-3">Our Team</h3>
                              <div class="team-content row">
                                  <div class="team-image col-md-3 col-sm-12 col-12 mb-2">
                                      <img src="https://dummyimage.com/200x200/eddfed/fff" alt="team">
                                      <p>Team</p>
                                      <p>Position</p>
                                  </div>
                                  <div class="team-image col-md-3 col-sm-12 col-12 mb-2">
                                      <img src="https://dummyimage.com/200x200/eddfed/fff" alt="team">
                                      <p>Team</p>
                                      <p>Position</p>
                                  </div>
                                  <div class="team-image col-md-3 col-sm-12 col-12 mb-2">
                                      <img src="https://dummyimage.com/200x200/eddfed/fff" alt="team">
                                      <p>Team</p>
                                      <p>Position</p>
                                  </div>
                                  <div class="team-image col-md-3 col-sm-12 col-12 mb-2">
                                      <img src="https://dummyimage.com/200x200/eddfed/fff" alt="team">
                                      <p>Team</p>
                                      <p>Position</p>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div> --}}
                <div class="destinations other-services pb-2 pt-5 mb-4">
                    <div class="custom-container">
                        <div class="site-title pb-2 mb-3 text-center">
                            <h2>Gallery<span></span></h2>

                        </div>

                        <div class="swiper we-offer">
                            <div class="swiper-wrapper" id="destinations">
                                @if(isset($about_gallery)&& count($about_gallery)>0)
                                    @foreach ($about_gallery as $item)
                                    <div class="swiper-slide mb-4">
                                        <div class="destinations-block">
                                            <img src="{{ asset($item->image) }}" class="img-fluid" width=""
                                                height="" alt="Destinations" />
    
                                        </div>
                                    </div> 
                                    @endforeach
                                @else
                                <div class="swiper-slide mb-4">
                                    <div class="destinations-block">
                                        <img src="./assets/img/premiumroom.jpg" class="img-fluid" width=""
                                            height="" alt="Destinations" />

                                    </div>
                                </div>
                                <div class="swiper-slide mb-4">
                                    <div class="destinations-block">
                                        <img src="./assets/img/gallery4.jpg" class="img-fluid" width="" height=""
                                            alt="Destinations" />

                                    </div>
                                </div>
                                <div class="swiper-slide mb-4">
                                    <div class="destinations-block">
                                        <img src="./assets/img/dining.jpg" class="img-fluid" width="" height=""
                                            alt="Destinations" />

                                    </div>
                                </div>
                                <div class="swiper-slide mb-4">
                                    <div class="destinations-block">
                                        <img src="./assets/img/gallery6.jpg" class="img-fluid" width="" height=""
                                            alt="Destinations" />


                                    </div>
                                </div>
                                <div class="swiper-slide mb-4">
                                    <div class="destinations-block">
                                        <img src="./assets/img/plungpool.jpg" class="img-fluid" width=""
                                            height="" alt="Destinations" />

                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>


                        {{--
                      <div class="swiper hotels">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="home-services">
                              <img src="./assets/img/rooms.jpg" alt="" />
                              <p>Rooms</p>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="home-services">
                              <img src="./assets/img/restaurants-vector.jpg" alt="" />
                              <p>Resturants</p>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="home-services">
                              <img src="./assets/img/banquet-vector.jpg" alt="" />
                              <p>Banquet Halls</p>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="home-services">
                              <img src="./assets/img/ice-cream-parlour--1.jpg" alt="" />
                              <p>Ice Cream Parlour</p>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="home-services">
                              <img src="./assets/img/saloon-1.jpg" alt="" />
                              <p>Gents Saloon</p>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="home-services">
                              <img src="./assets/img/beauty-parlour-1.jpg" alt="" />
                              <p>Ladies Beauty Parlour</p>
                            </div>
                          </div>
                        </div>
                        <div class="swiper-pagination"></div>
                      </div>
                      --}}
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
