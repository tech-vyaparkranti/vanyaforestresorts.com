@extends('layouts.webSite')
@section('title', '5 Star Resort in Vanya Resort - Vanya Forest  Resort & Spa')
@section('meta_keywords',
    'Best Resort in Vanya Resort, Vanya Forest  Resort & Spa, Riverside resort in Vanya Resort, Resort
    in Vanya Resort national Park,')
@section('meta_description',
    'Enjoy your stay at our 5 star resort in Vanya Resort which offer elegant accommodation and
    best in class amenities - Vanya Forest  Resort & Spa')

    @php
    $counterBg = \DB::table('website_elements')
        ->where('element', 'counter_bg_image')
        ->value('element_details');
@endphp

@section('content') {{-- @include('include.navigation') --}}
    @include('include.slider')
    <!-- aboutus Section -->
    <div class="destinations pt-5 pb-3">
        <div class="custom-container">
            <div class="site-title text-center Vanya Forest resort-heading
    ">
                <h1><label>About</label> VanyaForestResort</h1>
                {{--
      <p class="text-center">
        Rajhans International, Bhagalpur’s first luxury hotel, is this city's
        corporate and social centerpiece.
      </p>
      --}}
            </div>
            <div class="about-rajhans row pt-2">
                <div class="col-md-12">
                    <div class="about-rajhans-content midd-content text-center">
                        <p>
                            {!! $about_us_home_page_content ??
                                'See why so many travelers make
                                                                                                                                                                                    VanyaForestResort    their hotel of choice when visiting
                                                                                                                                                                                    Vanya Resort. Providing an ideal mix of value, comfort and convenience,
                                                                                                                                                                                    it offers a family-friendly setting with an array of amenities
                                                                                                                                                                                    designed for travelers like you. Rooms at VanyaForestResort
                                                                                                                                                                                    International offer a flat screen TV and air conditioning providing
                                                                                                                                                                                    exceptional comfort and convenience. A 24 hour front desk, room
                                                                                                                                                                                    service, and 24 hour check-in are some of the conveniences offered
                                                                                                                                                                                    at this hotel. A lounge will also help to make your stay even more
                                                                                                                                                                                    special.' !!}
                        </p>
                        <a href="{{ route('aboutUs') }}">More details</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destinations Section End -->
    <section id="donate-section" class=" zig-zag-bottom nin pt-4">
        <div class="custom-container">
            <div class="site-title text-center pb-2">
                <h2><label>VanyaForestResort</label> Restaurant<span></span></h2>

            </div>
            <div class="row pt-3 align-items-center">
                <div class="col-lg-6 col-md-6  midd-content text-center">
                    <p>{!! $home_restaurant_content ??
                        'VanyaForestResort, a renowned culinary destination where every meal is a feast! Our extensive
                                                                                                                            buffet offers a diverse selection of mouth-watering dishes, catering to every palate. Join us at
                                                                                                                             VanyaForestResort for a buffet
                                                                                                                            experience that will tantalize your taste buds and leave you wanting more.' !!}</p>
                    <!-- button -->
                    <a class="btn  mb-5 aos-init aos-animate" href="{{ route('contactUs') }}" data-aos="fade-up">Contact
                        us</a>
                </div>
                <!-- /col -->
                <div class="col-lg-6 col-md-6 ">
                    <!--image -->
                    <img loading="lazy"
                        src="{{ asset($home_restaurant_image ?? './assets/img/Vanya Forest -restaurants.jpg') }}"
                        alt="Vanya Forest  Restaurant" class="img-fluid">
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>
    <!-- What we offer? Section -->
    <div class="destinations premium-accomodation pt-5 pb-3">
        <div class="custom-container">
            <div class="site-title pb-5 text-center">
                <h2>Featured Rooms & Suites<span></span></h2>
                <p class="text-center">
                    {!! $home_featured_rooms_subheading ?? ' Explore the world seamlessly with our tailored hotel experiences.' !!}

                </p>
            </div>
            <div class="accomodation-section">
                <div class="accomodation-cards">
                    <div class="accomodation-image">
                        <img src="{{ asset($home_premium_room_image ?? './assets/img/premiumroom1.jpg') }}" alt=""
                            class="img-fluid" />
                    </div>
                    <div class="accomodation-content">
                        <h3>{!! $home_premium_room_heading ?? 'Premium Room' !!}</h3>

                        {{-- <ul>
            <li>
              <i class="fa-solid fa-user-large"></i
              ><i class="fa-solid fa-indian-rupee-sign"></i>{!!
              $home_premium_room_single_rate ?? '2499' !!}
            </li>
            <li>
              <i class="fa-solid fa-user-group"></i
              ><i class="fa-solid fa-indian-rupee-sign"></i>{!!
              $home_premium_room_double_rate ?? '3099' !!}
            </li>
          </ul> --}}
                        <p class="pt-3 pb-2 text-justify" id="para1">
                            {!! $home_premium_room_services ??
                                'Experience luxury and comfort in our Premium Rooms, where every detail is designed to exceed your expectations. With 36 spacious rooms boasting king-size beds, AC, TV, mini refrigerator, and an almirah with a safety locker, your
                                                                                                                                                                                                    comfort is our priority. Relax on the large sofa or at the table, or unwind in the immaculate bathroom. Enjoy stunning views of both the pool and the serene forest, making your stay a truly unforgettable experience.
                                                                                                                                                                        ' !!}
                        </p>

                        <a class="book-btn" href="https://asiatech.in/booking_engine/index3?token=Njk2NA==">Book Now</a>
                    </div>
                </div>
                
                <div class="accomodation-cards">
                    <div class="accomodation-image">
                        <img src="{{ asset($home_plung_pool_room_image ?? './assets/img/plungpool.jpg') }}" alt=""
                            class="img-fluid" />
                    </div>
                    <div class="accomodation-content">
                        <h3>{!! $home_plung_pool_room_heading ?? 'Plung Pool Suites' !!}</h3>

                        {{-- <ul>
            <li>
              <i class="fa-solid fa-user-large"></i
              ><i class="fa-solid fa-indian-rupee-sign"></i>{!!
              $home_plung_pool_room_rate ?? '4599' !!}
            </li>
          </ul> --}}
                        <p class="pt-3 pb-2 text-justify" id="para3">
                            {!! $home_plung_pool_room_services ??
                                'Indulge in family fun with our Family Plunge Pool Room, designed for unforgettable moments together. You can stay 4 Adults and 2 kid in this room. Relax in the comfort of two king-size beds and unwind on the cozy sofa while enjoying
                                                                                                                                                                                                    entertainment on the TV. With two washrooms, there is ample space for everyone to freshen up. Step outside to your private plunge pool, or soak in the beauty of nature from the balcony overlooking the garden. Create lasting
                                                                                                                                                                                                    memories in this spacious and inviting retreat.
                            
                                                                                                                                                                                                    ' !!}
                        </p>

                        <a class="book-btn" href="https://asiatech.in/booking_engine/index3?token=Njk2NA==">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- What we offer? Section End -->
    {{-- other verticals starts --}}
    <div class="destinations other-services  pb-2 pt-5 mb-4">
        <div class="custom-container">
            <div class="site-title pb-2 mb-3 text-center">
                <h2>Amenities<span></span></h2>
                <p class="text-center">
                    Explore the world seamlessly with our tailored hotel experiences.
                </p>
            </div>

            <div class="swiper we-offer">
                <div class="swiper-wrapper" id="destinations">
                    @foreach ($home_services as $item)
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <img src="{{ asset($item->image) }}" class="img-fluid" width="" height=""
                                    alt="Destinations" />
                                <div class="services-no">
                                    <span class="destinations-title">{{ $item->heading_top }}</span>
                                    <p><a href="tel:+917070091217">{{ $item->heading_middle }}</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="view-button text-center pt-4">
                <a href="{{ route('amenities') }}">View More</a>
            </div>


        </div>
    </div>
    {{-- other verticals ends --}}
    <div id="counter-section" class="page parallax-bg" style="background-position: 50% 50%">
        <!-- Counter starts -->
        <div id="counter" class="container">
            <div class="col-lg-10 offset-lg-1">
                <div class="row">
    <div class="col-md-4 pb-2 pb-xl-0 aos-init aos-animate" data-aos="zoom-in">
        <div class="counter">
            <div class="counter-value plus" 
                 data-count="{{ preg_replace('/\D/', '', $total_room_count) }}" 
                 data-type="room">
                <span>{!! $total_room_count ?? '24' !!}</span>
            </div>
            <p class="title">Total Room's</p>
        </div>
    </div>

    <div class="col-md-4 pb-2 pb-xl-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
        <div class="counter">
            <div class="counter-value" 
                 data-count="{{ preg_replace('/\D/', '', $banquet_hall_sqft) }}" 
                 data-type="banquet">
                <span>{!! $banquet_hall_sqft ?? '5500' !!}</span>
            </div>
            <p class="title">Banquet Hall in sqft</p>
        </div>
    </div>

    <div class="col-md-4 pb-2 pb-xl-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
        <div class="counter">
            <div class="counter-value" 
                 data-count="{{ preg_replace('/\D/', '', $total_lawn) }}" 
                 data-type="lawn">
                <span>{!! $total_lawn ?? '2 Acre' !!}</span>
            </div>
            <p class="title">Lawn in Acre</p>
        </div>
    </div>
</div>

                <!-- /row -->
            </div>
            <!-- /col-lg -->
        </div>
        <!-- /counter -->
    </div>

    {{-- special offer start --}}
    <div class="destinations   pt-5 ">
        <div class="custom-container">
            <div class="site-title text-center pb-2">
                <h2><label>Special Offers</label> </h2>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Package 1 -->
                <div class="swiper offer-package">
                    <div class="swiper-wrapper" id="destinations">
                        @if (isset($offer_packages) && count($offer_packages) > 0)
                            @foreach ($offer_packages as $item)
                                <div class="swiper-slide mb-4">
                                    <div class="package-item">
                                        <div class="overflow-hidden">
                                            <img class="img-fluid" src="{{ asset($item->image) }}"
                                                alt="{{ $item->heading_top }}" />
                                        </div>
                                        <div class="border-bottom">
                                            <h5 class="text-center  py-2">{{ $item->heading_top }}</h5>
                                        </div>
                                        <div class="p-2">
                                            {!! $item->heading_middle !!}
                                            <div class="d-flex justify-content-center mb-2 flex-fill">
                                                <a href="{{ route('contactUs') }}" class="book-amenities">Contact US</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide mb-4">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/corporateevent5.jpg"
                                            alt="Banquet Hall" />
                                    </div>
                                    <div class="border-bottom">
                                        <h5 class="text-center  py-2">Empower Your Team: Corporate Retreat at
                                            VanyaForestResort
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
                            <div class="swiper-slide mb-4">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/destination.jpeg"
                                            alt="Beauty Parlour" />
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <h5 class="text-center  py-2">Celebrate Eternal Love: Wedding Bliss at
                                            VanyaForestResort
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
                            <div class="swiper-slide mb-4">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/freetraveler.jpg"
                                            alt="Executive Room" />
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
                            <div class="swiper-slide mb-4">
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
                            <div class="swiper-slide mb-4">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/romanticpackage.jpg"
                                            alt="Beauty Parlour" />
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <h5 class="text-center  py-2">Rekindle Love: Romantic Escape at VanyaForestResort
                                        </h5>
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
                            <div class="swiper-slide mb-4">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="./assets/img/honeymoonpackage.jpg"
                                            alt="Beauty Parlour" />
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <h5 class="text-center  py-2">Blissful Beginnings: Honeymoon Package at
                                            VanyaForestResort
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
            <div class="site-title text-center pt-2">
                <h4>Enjoy <label>10%</label> discount on all spa packages during your stay</h4>
            </div>
        </div>
    </div>
    {{-- special offers end --}}
    {{-- testimonial start --}}
    <section class="testimonial  ov-hidden">
        <div class="custom-container pt-3 pb-5">
            <div class="site-title pb-4 text-center">
                <h2 class="text-center">Our Guest Reviews <span></span></h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 mt-2 mb-3">
                    <div class="swiper guest_review" data-aos="fade-up">
                        <div class="swiper-wrapper">
                            @if (isset($review) && count($review) > 0)
                                @foreach ($review as $item)
                                    @php
                                        $urls = preg_split('/\s*,\s*/', $item->heading_middle);
                                        if (!function_exists('getYouTubeVideoId')) {
                                            function getYouTubeVideoId($url)
                                            {
                                                preg_match(
                                                    "/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]*\/\S+\/|(?:v|e(?:mbed)?)\/|\S+\/?|\S+\/?\/?))?([a-zA-Z0-9_-]{11})/i",
                                                    $url,
                                                    $matches,
                                                );
                                                return isset($matches[1]) ? $matches[1] : null;
                                            }
                                        }
                                    @endphp
                                    @foreach ($urls as $originalUrl)
                                        @php
                                            $src = $originalUrl;
                                            if (strpos($src, 'autoplay=1') === false) {
                                                $separator = strpos($src, '?') === false ? '?' : '&';
                                                $videoId = getYouTubeVideoId($originalUrl);

                                                // $src .= $separator . 'autoplay=1&mute=1&controls=1&loop=1&playlist=' . $videoId;
                                                $src .= $separator . 'mute=1&controls=1&loop=1&playlist=' . $videoId;
                                            }
                                        @endphp

                                        <div class="swiper-slide">
                                            <div class="testimonials-block text-center">
                                                <div class="right-testimonial">
                                                    <iframe width="540" height="315" src="{{ $src }}"
                                                        frameborder="0" class="desktop-video"
                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @else
                                <div class="swiper-slide">
                                    <div class="testimonials-block text-center">
                                        <div class="right-testimonial">
                                            <iframe width="540" height="315"
                                                src="https://www.youtube.com/embed/S7cw5Ef6xwM?si=z-0FDnqr-VDxefqN"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonials-block text-center">
                                        <div class="right-testimonial">
                                            <iframe width="540" height="315"
                                                src="https://www.youtube.com/embed/S7cw5Ef6xwM?si=z-0FDnqr-VDxefqN"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonials-block text-center">
                                        <div class="right-testimonial">
                                            <iframe width="540" height="315"
                                                src="https://www.youtube.com/embed/S7cw5Ef6xwM?si=z-0FDnqr-VDxefqN"></iframe>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        </div>
                        <div class="swiper-button-prev slide-nav"></div>
                        <div class="swiper-button-next slide-nav"></div>
                        {{-- <div class="swiper-pagination custom-pagination swiper-pagination-bullets-dynamic"></div> --}}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="testimonial  ov-hidden">
        <div class="custom-container pt-3 pb-5">
            <div class="site-title pb-4 text-center">
                <h2 class="text-center">What our customers are saying <span></span></h2>
            </div>
            <div class="row">
                {{--
      <div class="col-md-4 col-sm-6"></div>
      --}}
                <div class="col-md-12 col-sm-12 mt-2 mb-3">
                    <div class="swiper testimonials" data-aos="fade-up">
                        <div class="swiper-wrapper">
                            @if (isset($testimonial) && count($testimonial) > 0)
                                @foreach ($testimonial as $item)
                                    <div class="swiper-slide">
                                        <div class="testimonials-block text-center">
                                            <div class="right-testimonial">
                                                <p>
                                                    <i class="fa-solid fa-quote-left"></i> {{ $item->heading_middle }}<i
                                                        class="fa-solid fa-quote-right"></i>
                                                </p>
                                                <span class="testimonials-title">{{ $item->heading_top }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="swiper-slide">
                                    <div class="testimonials-block text-center">
                                        <div class="right-testimonial">
                                            <p>
                                                <i class="fa-solid fa-quote-left"></i> Very well maintained,
                                                support staff was really very friendly. In mid of city
                                                hussle you will find this old but well maintained property
                                                which evolved with time with nice food and good service. You
                                                will never go wrong when it comes to cleaningness and guest
                                                service at Rajhans. <i class="fa-solid fa-quote-right"></i>
                                            </p>
                                            <span class="testimonials-title">Amit K</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonials-block text-center">
                                        <div class="right-testimonial">
                                            <p>
                                                <i class="fa-solid fa-quote-left"></i> Excellent service in
                                                all respect like room cleaness and tasty food . Hotel staffs
                                                are very well behaved and coperative. |Overall my stay was
                                                wonderful. Room was very clean and all staff is well behaved
                                                <i class="fa-solid fa-quote-right"></i>
                                            </p>
                                            <span class="testimonials-title">Sanjiv V</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonials-block text-center">
                                        <div class="right-testimonial">
                                            <p>
                                                <i class="fa-solid fa-quote-left"></i> It is the best hotel
                                                in bhagalpur as the hospitality and management is very good.
                                                The food in the restaurant is very delicious and the rooms
                                                are very luxurious as i visited here first time but the
                                                staffs and management don't let me disappointed<i
                                                    class="fa-solid fa-quote-right"></i>
                                            </p>
                                            <span class="testimonials-title">Sweety Kumari</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonials-block text-center">
                                        <div class="right-testimonial">
                                            <p>
                                                <i class="fa-solid fa-quote-left"></i> I have stayed for two
                                                days, nice ambiance, hotel staff was courtesies bedsheet
                                                were clean and food was good. Especially tea which was
                                                cooked in earthen pot.
                                                <i class="fa-solid fa-quote-right"></i>
                                            </p>
                                            <span class="testimonials-title">Rituraj rathore</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="swiper-button-prev slide-nav"></div>
                        <div class="swiper-button-next slide-nav"></div>
                        <div class="swiper-pagination custom-pagination swiper-pagination-bullets-dynamic"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- testimonial end --}}
    {{-- faq start --}}

    <section class="faqs">
        <div class="custom-container">
            <div class="site-title pb-4 text-center">
                <h2 class="text-center">
                    VanyaForestResort - FAQ<small>s</small> <span></span>
                </h2>
            </div>
            <div id="faqs">
                @if ($getHomeAllFaq->isNotEmpty())
                    @foreach ($getHomeAllFaq as $FaqRow)
                        <div class="accordion">
                            <div class="accordion__header">
                                <h2>{!! $FaqRow['faq_question'] !!}</h2>
                                <span class="accordion__toggle"></span>
                            </div>
                            <div class="accordion__body">
                                <p>{!! $FaqRow['faq_answer'] !!}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>
                                Which popular attractions are close to VanyaForestResort ?
                            </h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>Nearby attractions include Burhanath Mandir (0.3 miles).</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>
                                What are some of the property amenities at VanyaForestResort
                                International?
                            </h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>
                                Some of the more popular amenities offered include free breakfast,
                                an on-site restaurant, and a lounge.
                            </p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>
                                What food & drink options are available at VanyaForestResort
                                International?
                            </h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>
                                Guests can enjoy free breakfast, an on-site restaurant, and a lounge
                                during their stay.
                            </p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>Is parking available at VanyaForestResort ?</h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>Yes, free parking is available to guests.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>
                                What are some restaurants close to VanyaForestResort ?
                            </h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>
                                Conveniently located restaurants include Royal darbar, Metro Mirchi
                                Restaurant, and VanyaForestResort .
                            </p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>Does VanyaForestResort have airport transportation?</h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>
                                Yes, VanyaForestResort International offers airport transportation for
                                guests. We recommend calling ahead to confirm details.
                            </p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>Is VanyaForestResort International located near the city center?</h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>Yes, it is 0.6 miles away from the center of Bhagalpur.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>
                                Are any cleaning services offered at VanyaForestResort International?
                            </h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>Yes, dry cleaning and laundry service are offered to guests.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>Are pets allowed at VanyaForestResort International?</h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>
                                Yes, pets are typically allowed, but it's always best to call ahead
                                to confirm.
                            </p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>Does VanyaForestResort International offer any business services?</h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>
                                Yes, guests have access to a business center and meeting rooms
                                during their stay.
                            </p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__header">
                            <h2>
                                Which languages are spoken by the staff at VanyaForestResort
                                International?
                            </h2>
                            <span class="accordion__toggle"></span>
                        </div>
                        <div class="accordion__body">
                            <p>
                                The staff speaks multiple languages, including English and Hindi.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <div class="abouts">
        <div class="main-container custom-container mb-4">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="site-title text-center pt-4 mb-4 pb-4">
                        <h1>Our Blogs</h1>
                    </div>
                </div>
            </div>
            <div class="swiper pb-4 blog-section" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @if (isset($blogs) && count($blogs) > 0)
                        @foreach ($blogs as $blog)
                            <div class="swiper-slide">
                                <div class="blog-card mb-3">
                                    {{-- <a href="{{ route('blogDetail', ['slug' => $blog->slug]) }}"> --}}
                                    <div class="blog-card-container">
                                        <a href="{{ route('blogDetail', ['slug' => $blog->slug]) }}">
                                            <img src="{{ asset($blog->image) }}" alt="blog image">
                                        </a>
                                        <div class="card-content">
                                            <h4 class="blog_heading">{{ $blog->title }}</h4>
                                            <p class="blog-content">{{ $blog->short_content }}</p>
                                            <ul class="blog_social_links mb-3">
                                                <li><a href="{{ $blog->facebook_link }}"><i
                                                            class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="{{ $blog->instagram_link }}"><i
                                                            class="fa-brands fa-instagram"></i></a></li>
                                                <li><a href="{{ $blog->twitter_link }}"><i
                                                            class="fa-brands fa-x-twitter"></i></a></li>
                                                <li><a href="{{ $blog->youtube_link }}"><i
                                                            class="fa-brands fa-youtube"></i></a></li>
                                            </ul>
                                            <span><a href="{{ route('blogDetail', ['slug' => $blog->slug]) }}">Read
                                                    more</a></span>
                                        </div>
                                    </div>
                                    {{-- </a> --}}
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            <div class="blog-card mb-3">
                                <div class="blog-card-container">
                                    <img src="./assets/img/cottageroom1.jpg" alt="blog image">
                                    <div class="card-content">
                                        <h4 class="blog_heading">VanyaForestResort: Your Gateway to Adventure and
                                            Relaxation in
                                            Vanya</h4>
                                        <p class="blog-content">Being perfectly combined with thrills of adventure and
                                            peace at large,
                                            VanyaForestResort, offering thrilling safari visits, offers the guest
                                            relaxing
                                            atmospheres.
                                            Be it taking up wildlife of Vanya or just unwinding amidst luxury lodging,
                                            resort leaves a
                                            good memory and even guides through tenures to conditioning for nature-lover
                                            and
                                            adventure-lovers, in turn.</p>
                                        <ul class="blog_social_links mb-3">
                                            <li><a href="https://www.facebook.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="https://x.com/Vanya Forest rmr"><i
                                                        class="fa-brands fa-x-twitter"></i></a></li>
                                            <li><a href="https://www.youtube.com/@Vanya Forest resortandspa"><i
                                                        class="fa-brands fa-youtube"></i></a></li>
                                        </ul>
                                        {{-- <span><a href="{{ route('blogDetail', $blogs->id) }}">Read more</a></span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card mb-3">
                                <div class="blog-card-container">
                                    <img src="./assets/img/gallery2.jpg" alt="blog image">
                                    <div class="card-content">
                                        <h4 class="blog_heading">Family-Friendly Stays at Vanya Forest  Resort a Perfect
                                            holiday in
                                            Vanya Forest Resort</h4>
                                        <p class="blog-content">VanyaForestResort suits family recesses offering
                                            commodious
                                            lodgment
                                            and instigative conditioning for all periods. Its nature walks and jeep
                                            safaris
                                            make it
                                            possible to carry out all this safely and will be remembered as a life
                                            experience for the
                                            families enjoying quality time surrounded by astonishing geographies,
                                            wildlife,
                                            and
                                            top-league amenities designed purely for family comfort.</p>
                                        <ul class="blog_social_links mb-3">
                                            <li><a href="https://www.facebook.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="https://x.com/Vanya Forest rmr"><i
                                                        class="fa-brands fa-x-twitter"></i></a></li>
                                            <li><a href="https://www.youtube.com/@Vanya Forest resortandspa"><i
                                                        class="fa-brands fa-youtube"></i></a></li>
                                        </ul>
                                        {{-- <span><a href="{{ route('blogDetail', $blogs->id) }}">Read more</a></span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card mb-3">
                                <div class="blog-card-container">
                                    <img src="./assets/img/gallery2.jpg" alt="blog image">
                                    <div class="card-content">
                                        <h4 class="blog_heading">Family-Friendly Stays at VanyaForestResort a Perfect
                                            holiday in 
                                            Vanya Forest Resort</h4>
                                        <p class="blog-content">VanyaForestResort suits family recesses offering
                                            commodious
                                            lodgment
                                            and instigative conditioning for all periods. Its nature walks and jeep
                                            safaris
                                            make it
                                            possible to carry out all this safely and will be remembered as a life
                                            experience for the
                                            families enjoying quality time surrounded by astonishing geographies,
                                            wildlife,
                                            and
                                            top-league amenities designed purely for family comfort.</p>
                                        <ul class="blog_social_links mb-3">
                                            <li><a href="https://www.facebook.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="https://x.com/Vanya Forest rmr"><i
                                                        class="fa-brands fa-x-twitter"></i></a></li>
                                            <li><a href="https://www.youtube.com/@Vanya Forest resortandspa"><i
                                                        class="fa-brands fa-youtube"></i></a></li>
                                        </ul>
                                        {{-- <span><a href="{{ route('blogDetail', $blogs->id) }}">Read more</a></span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="blog-card mb-3">
                                <div class="blog-card-container">
                                    <img src="./assets/img/anniversaries.jpeg" alt="blog image">
                                    <div class="card-content">
                                        <h4 class="blog_heading">Romantic lams at VanyaForestResort an Idyllic Escape
                                            in Vanya Forest Resort
                                        </h4>
                                        <p class="blog-content">For couples looking to love, VanyaForestResort is the
                                            perfect isolated
                                            flight. Enjoy luxurious lodgement, private feasts under the stars, and
                                            peaceful
                                            walks
                                            through the scenic surroundings. With substantiated services and stirring
                                            views,
                                            the resort
                                            provides a serene, intimate setting for an indelible romantic retreat in
                                            Vanya Forest Resort.</p>
                                        <ul class="blog_social_links mb-3">
                                            <li><a href="https://www.facebook.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="https://x.com/Vanya Forest rmr"><i
                                                        class="fa-brands fa-x-twitter"></i></a></li>
                                            <li><a href="https://www.youtube.com/@Vanya Forest resortandspa"><i
                                                        class="fa-brands fa-youtube"></i></a></li>
                                        </ul>
                                        {{-- <span><a href="{{ route('blogDetail', $blogs->id) }}">Read more</a></span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card mb-3">
                                <div class="blog-card-container">
                                    <img src="./assets/img/gallery6.jpg" alt="blog image">
                                    <div class="card-content">
                                        <h4 class="blog_heading">VanyaForestResort Eco-Friendly Villas Sustainable
                                            Luxury in Vanya Forest Resort</h4>
                                        <p class="blog-content">VanyaForestResort Eco-friendly estates offer a
                                            luxurious yet sustainable stay. erected with environmentally conscious accoutrements,
                                            these estates blend ultramodern comfort with natural surroundings. Guests can enjoy the beauty
                                            of  Vanya Forest Resort National Park while being aware of their environmental impact, making it the
                                            perfect choice forego-conscious trippers</p>
                                        <ul class="blog_social_links mb-3">
                                            <li><a href="https://www.facebook.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/Vanya Forest resort"><i
                                                        class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="https://x.com/Vanya Forest rmr"><i
                                                        class="fa-brands fa-x-twitter"></i></a></li>
                                            <li><a href="https://www.youtube.com/@Vanya Forest resortandspa"><i
                                                        class="fa-brands fa-youtube"></i></a></li>
                                        </ul>
                                        {{-- <span><a href="{{ route('blogDetail', $blogs->id) }}">Read more</a></span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>


        </div>
    </div>

    <style>
        .flex-fill .text-primary {
            color: #041443 !important;
        }

        .flex-fill .btn-primary {
            background: #041443 !important;
        }

        .guest_review {
            overflow: hidden;
        }

        .right-testimonial iframe {
            width: 100%;
            height: 315px;
            filter: none !important;
        }

        @media(max-width:992px) {
            .right-testimonial iframe {
                width: 100% !important;
                height: 315px;
                display: block;
                filter: none !important;
            }
        }


        #counter-section {
    background: url('{{ asset($counterBg ?? './assets/img/counter.jpg') }}');
    background-size: cover;
    background-position: top;
}
    </style>
@endsection

@section('script')
    <script>
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter-value");

    // Custom animation durations by counter type
    const durations = {
        room: 10000,
        banquet: 100,
        lawn: 10000
    };

    const animateCounter = (counter, totalDuration) => {
        return new Promise((resolve) => {
            const target = parseInt(counter.getAttribute("data-count")) || 0;
            let count = 0;
            const speed = totalDuration / target;
            const increment = Math.ceil(target / (totalDuration / speed));

            const updateCounter = () => {
                count += increment;
                if (count < target) {
                    counter.querySelector("span").innerText = count;
                    setTimeout(updateCounter, speed);
                } else {
                    counter.querySelector("span").innerText = target;
                    if (counter.classList.contains("plus")) {
                        counter.querySelector("span").innerText = target + "+";
                    }
                    resolve();
                }
            };

            updateCounter();
        });
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const counterPromises = [];

                counters.forEach((counter) => {
                    const type = counter.getAttribute("data-type");
                    const duration = durations[type] || 2000;
                    counterPromises.push(animateCounter(counter, duration));
                });

                Promise.all(counterPromises).then(() => {
                    // All counters finished animating
                });

                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    counters.forEach((counter) => observer.observe(counter));

    AOS.init();
});
</script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="hotel"]', {
            //
        });
    </script>
    <script>
        $(".accordion__header").click(function(e) {
            e.preventDefault();
            var currentIsActive = $(this).hasClass("is-active");
            $(this).parent(".accordion").find("> *").removeClass("is-active");
            if (currentIsActive != 1) {
                $(this).addClass("is-active");
                $(this).next(".accordion__body").addClass("is-active");
            }
        });
        let site_url = "{{ url(' / ') }}";
    </script>
    <script src="js/homePage.js?v=2"></script>
    <script>
        // function truncateText(selector, wordLimit) {
        //   const element = document.querySelector(selector);
        //   const words = element.textContent.split(' ');

        //   if (words.length > wordLimit) {
        //     element.textContent = words.slice(0, wordLimit).join(' ') + '...';
        //   }
        // }

        // // Apply the truncation to each paragraph after 50 words
        // truncateText('#para1', 50);
        // truncateText('#para2', 50);
        // truncateText('#para3', 50);
    </script>

@endsection
