@extends('layouts.webSite')
@section('title', 'Amenities & Activities')
@section('meta_description', 'Discover the exceptional amenities at Vanya Forest Resort & Spa, Jim Corbett. From spa and swimming pool to fine dining and adventure activities.')
@section('meta_keywords', 'Spa & Wellness, Spa Resort in Jim Corbett, Best Resort in Jim Corbett, Vanya Forest Resort & Spa, Riverside resort in Jim Corbett, Resort in Jim Corbett national Park, Luxury Resort in Jim Corbett')
@section('content')

<div id="about">
  <div class="default-content pt-4 pb-3 our-service-page">
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
          <div class="site-title text-center pb-2">
              <h1><label>Amenities & Activities</label></h1>
          </div>
          
          <div class="order mt-4">
              <div class="tab">
                <button class="tablinks active" data-origin="Amenities">Amenities</button>
                <button class="tablinks" data-origin="Activities">Recreational Activities</button>
              </div>
          </div>
          <div class="tab-content-sec mt-4 mb-5">
                  <div class="custom-container">
                      <div data-target="Amenities" class="tabcontent service-section" style="display: block">
                        <div class="event-collarge">
                            @if(isset($amenities)&& count($amenities)>0)
                                @foreach ($amenities as $item)
                                    <div class="row d-flex align-items-center service-gallery" id="Modular-Kitchen">
                                        <div class="col-md-6 col-sm-6 mb-4 service-images">
                                            <div class="package-collarge-container">
                                                <div class="package-collarge-item ">
                                                    <a href="#">
                                                        <img src="{{ asset($item->image) }}" alt="Collarge" class="img-fluid">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-4 service-text">
                                            <h3 class="destinations-title mh-auto">{{ $item->heading_top }}</h3>
                                            <p>{{ $item->heading_middle }}</p>
                                            <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row d-flex align-items-center service-gallery" id="Modular-Kitchen">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container">
                                            <div class="package-collarge-item ">
                                                <a href="#">
                                                    <img src="./assets/img/premiumroom.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Luxurious Rooms & Suites</h3>
                                        <p>Our luxurious rooms and suites feature sophisticated design, exquisite furnishings, and top-tier amenities. Each space is meticulously crafted to provide ultimate comfort and privacy, ensuring a lavish stay. With expansive layouts and breathtaking views, every room offers a premium experience tailored to your needs. </p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Bedroom">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/restaurant.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Multi-cuisine Restaurant</h3>
                                        <p>Our multi-cuisine restaurant offers a diverse menu, featuring global Flavors and culinary traditions. From gourmet international dishes to local specialties, each meal is crafted with fresh, high-quality ingredients. Enjoy a memorable dining experience in an elegant ambiance, perfect for any occasion.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/bar.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Bar & Lounge</h3>
                                        <p>The Bar & Lounge offers a stylish and relaxed setting, serving an extensive selection of premium spirits, cocktails, and wines. Guests can unwind with expertly crafted drinks while enjoying soothing music and a chic atmosphere. It’s the perfect spot for socializing or a quiet evening out.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="children-room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/pool2.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Outdoor Swimming Pool</h3>
                                        <p>The outdoor swimming pool provides a refreshing retreat with stunning views and a serene atmosphere. Surrounded by lush landscaping, it's the perfect place to relax, swim, or sunbathe. Whether for exercise or leisure, the pool offers an exceptional experience in a tranquil outdoor setting.
                                        </p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/fitness2.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Fitness Center & Gym</h3>
                                        <p>The Fitness Centre & Gym is equipped with state-of-the-art exercise machines, free weights, and cardio equipment. Designed to cater to all fitness levels, it offers a motivating space for workouts. Whether you prefer strength training or cardio, the gym provides everything needed for an invigorating session.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/spa2.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Spa & Wellness Center</h3>
                                        <p>The Spa & Wellness Centre offers a range of rejuvenating treatments, including massages, facials, and body therapies. Designed for ultimate relaxation, it features serene spaces and expert therapists dedicated to enhancing your well-being. Unwind and refresh with luxurious services tailored to soothe both body and mind.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/businesscenter.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Conference Hall & Meeting Rooms</h3>
                                        <p>The Conference Hall & Meeting Rooms are equipped with modern technology, offering a professional setting for business events. Whether hosting a large conference or intimate meeting, these versatile spaces provide comfort, privacy, and efficient services. Ideal for corporate gatherings, they ensure a productive and seamless experience.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>    
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/businesscenter1.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Business Center</h3>
                                        <p>The Business Centre is fully equipped with high-speed internet, printing, and scanning services, designed to meet all professional needs. Whether for a quick meeting or administrative tasks, it provides a quiet and efficient environment. It’s the perfect space for business travellers to stay productive and connected.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/wifi.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Wi-Fi Connectivity</h3>
                                        <p>Wi-Fi connectivity is available throughout the property, offering fast and reliable internet access. Whether in your room, the lobby, or public areas, stay connected effortlessly for work, entertainment, or communication. Enjoy seamless browsing and streaming with secure and high-speed wireless connections at all times.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/parking.png" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Parking Facility</h3>
                                        <p>The property offers convenient parking facilities with ample space for guests. Secure and accessible, the parking area ensures peace of mind for those traveling by car. Whether for short-term or extended stays, our parking service is designed to accommodate your needs with ease and comfort.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/hotel-room-service.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">24-hour Room Service</h3>
                                        <p>Our 24-hour room service provides convenient access to a wide range of delicious meals and refreshments. Whether craving a midnight snack or a full-course meal, enjoy dining in the comfort and privacy of your room at any time. Dedicated staff ensures prompt and efficient service around the clock.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/laundary.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Laundry & Dry Cleaning</h3>
                                        <p>Our Laundry & Dry-Cleaning service offers quick and efficient cleaning of clothes with high-quality care. Whether for everyday garments or delicate fabrics, we ensure your items are treated professionally. Enjoy the convenience of prompt pick-up and delivery, keeping your wardrobe fresh and ready throughout your stay.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/traveldesk.webp" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Travel Desk</h3>
                                        <p>The Travel Desk offers expert assistance with booking tours, transportation, and sightseeing activities. Our knowledgeable staff provides tailored recommendations, ensuring a seamless travel experience. Whether arranging airport transfers or local excursions, the Travel Desk is your go-to resource for all travel needs during your stay.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/locker.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Safety Lockers</h3>
                                        <p>Safety lockers are available to securely store your valuables during your stay. Designed for convenience and peace of mind, these lockers are located in each room or at the front desk. Enjoy your time without worry, knowing your important items are safe and easily accessible when needed.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </div>

                    <div data-target="Activities" class="tabcontent service-section">
                        <div id="about">
                            <div class="default-content service-page pt-4 pb-3">
                                <div class="container">
                                    <div class="event-collarge">
                                        @if(isset($recreational)&& count($recreational)>0)
                                            @foreach ($recreational as $item)
                                            <div class="row d-flex align-items-center service-gallery" id="Modular-Kitchen">
                                                <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                    <div class="event-collarge-container">
                                                        <div class="event-collarge-item ">
                                                            <a href="#">
                                                                <img src="{{ asset($item->image) }}" alt="{{ $item->heading_top }}" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="event-collarge-item">
                                                            <a href="#">
                                                                <img src="{{ asset($item->image2) }}" alt="{{ $item->heading_top }}" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="event-collarge-item">
                                                            <a href="#">
                                                                <img src="{{ asset($item->image3) }}" alt="{{ $item->heading_top }}" class="img-fluid">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                    <h3 class="destinations-title mh-auto">{{ $item->heading_top }}</h3>
                                                    <p>{{ $item->heading_middle }}</p>
                                                    <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                        <div class="row d-flex align-items-center service-gallery" id="Modular-Kitchen">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container">
                                                    <div class="event-collarge-item ">
                                                        <a href="#">
                                                            <img src="./assets/img/junglesafari1.webp" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/junglesafari2.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/junglesafari.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto">Jungle Safari</h3>
                                                <p>The Jungle Safari offers an exciting adventure through lush landscapes, where guests can explore diverse wildlife. Expert guides lead you on a thrilling tour, showcasing animals in their natural habitat. Experience the beauty and thrill of the wilderness, creating unforgettable memories in a pristine, untamed environment.</p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center service-gallery" id="Bedroom">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container mt-5">
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/trekking1.avif" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/trekking.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/trekking2.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto"> Trekking & Hiking</h3>
                                                <p>Trekking and hiking experiences offer thrilling adventures through scenic trails, featuring breathtaking landscapes and natural beauty. Explore lush forests, rugged mountains, and picturesque valleys with expert guides who ensure your safety and enjoyment. Perfect for outdoor enthusiasts, these activities provide an exhilarating way to connect with nature.</p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container mt-5">
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/bird-watching1.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/bird-watching2.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/bird-watching.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto">Bird Watching</h3>
                                                <p>Bird watching offers a peaceful and immersive experience in nature, allowing guests to observe diverse bird species in their natural habitat. With expert guides and prime locations, you'll have the opportunity to spot rare and beautiful birds. It's a serene and educational activity perfect for nature enthusiasts.</p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center service-gallery" id="children-room">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container mt-5">
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/naturewalks.webp" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/naturewalks1.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/naturewalks2.avif" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto">Nature Walks</h3>
                                                <p>Nature walks offer a tranquil experience, guiding guests through scenic landscapes and lush environments. Led by knowledgeable guides, these walks provide insight into local flora, fauna, and ecosystems. Perfect for nature lovers, it's an opportunity to reconnect with the outdoors while enjoying the beauty of natural surroundings.
                                                </p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container mt-5">
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/yoga1.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/yoga2.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/yoga4.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto">Yoga & Meditation Sessions</h3>
                                                <p>Yoga and meditation sessions provide a peaceful environment for relaxation and mindfulness. Led by experienced instructors, these sessions help enhance flexibility, reduce stress, and promote mental clarity. Perfect for rejuvenating both body and mind, they offer a serene escape to restore balance and well-being.</p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center service-gallery" id="office">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container mt-5">
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/cricket3.jpeg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/bicycling2.jpeg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/cricket1.jpeg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto">Outdoor Games</h3>
                                                <p>Outdoor games like cricket, football, and other recreational activities offer guests a fun and active way to enjoy the open air. With spacious grounds and excellent facilities, these games provide an exciting opportunity for friendly competition and teamwork. Perfect for all ages, they encourage fitness and enjoyment in a lively atmosphere.</p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center service-gallery" id="office">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container mt-5">
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/tabletennis.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/chess.avif" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/carom.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto">Indoor Games</h3>
                                                <p>Indoor games offer a fun and engaging way to stay active while staying inside. They help improve focus, coordination, and social interaction among players. Whether it's chess, table tennis, or board games, indoor activities provide entertainment and skill development.</p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center service-gallery" id="office">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container mt-5">
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/pool1.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/pool2.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/pool4.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto">Poolside Lounge</h3>
                                                <p>The Poolside Lounge offers a relaxed, stylish setting to unwind by the water. Enjoy refreshing cocktails, light snacks, and comfortable seating as you bask in the sun or take in the scenic views. It’s the perfect spot to socialize, relax, or simply enjoy a peaceful moment by the pool.</p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center service-gallery" id="office">
                                            <div class="col-md-8 col-sm-8 mb-4 service-images">
                                                <div class="event-collarge-container mt-5">
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/campfire1.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/campfire2.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="event-collarge-item">
                                                        <a href="#">
                                                            <img src="./assets/img/camfire.jpg" alt="Collarge" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-4 service-text">
                                                <h3 class="destinations-title mh-auto">Campfire & Stargazing</h3>
                                                <p>Campfire & stargazing experiences provide a magical outdoor setting to relax and connect with nature. Gather around the fire, enjoy warm drinks, and share stories under the night sky. As the stars illuminate above, expert guides help you spot constellations, creating a serene and unforgettable evening.</p>
                                                <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                            </div>
                                        </div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
          </div>
          {{-- <div class="events-details">
            <hr>
            <ul class="event-service-list m-0 p-0">
                <li><i class="fa-solid fa-bed"></i>
                    <span>Stay</span>
                    <p>Complementary bed for guest drivers</p>
                </li>
                <li>
                    <i class="fa-solid fa-mug-saucer"></i>
                    <span>Breakfast</span>
                    <p>Daily breakfast service included for guests staying at the hotel or attending the event.</p>
                </li>
                <li>
                    <i class="fa-solid fa-wifi"></i>
                    <span>WiFi</span>
                    <p>Complimentary high-speed internet access available throughout the hotel and event spaces.</p>
                </li>
                <li>
                    <i class="fa-solid fa-square-parking"></i>
                    <span>Parking</span>
                    <p>Free or discounted parking options provided for event attendees or overnight guests.</p>
                </li> --}}
                {{-- <li>
                    <i class="fa-solid fa-dumbbell"></i>
                    <span>Fitness Center Access</span>
                    <p>Access to the hotel's fitness center included for guests staying at the hotel.</p>
                </li>
                <li>
                    <i class="fa-solid fa-person-swimming"></i>
                    <span>Swimming Pool Access</span>
                    <p>Use of the hotel's swimming pool facilities included for guests during their stay.</p>
                </li> --}}
                {{-- <li>
                    <i class="fa-solid fa-business-time"></i>
                    <span>Business Center Access</span>
                    <p>Complimentary access to business center facilities such as computers, printers, and meeting rooms.</p>
                </li>
                <li>
                    <i class="fa-solid fa-mug-hot"></i>
                    <span>Coffee/Tea Service</span>
                    <p>Complimentary coffee and tea service available in designated areas for event attendees.</p>
                </li>
                <li>
                    <i class="fa-brands fa-nfc-directional"></i>
                    <span>Welcome Reception</span>
                    <p>Welcome drinks complementary while guest check in</p>
                </li>
                <li>
                    <i class="fa-solid fa-bell-concierge"></i>
                    <span>Housekeeping Service</span>
                    <p>Daily housekeeping service included for guests staying overnight.</p>
                </li>
                <li>
                    <i class="fa-solid fa-hotel"></i>
                    <span>Room Upgrades</span>
                    <p>Opportunity for room upgrades for event organizers or VIP guests, subject to availability.</p>
                </li>
                <li>
                    <i class="fa-regular fa-clock"></i>
                    <span>Late Checkout</span>
                    <p>Check in /check out time - 12:00 Noon</p>
                </li>
                <li>
                    <i class="fa-solid fa-children"></i>
                    <span>Children's Activities</span>
                    <p>Complimentary children's activities or childcare services available for families attending the event.</p>
                </li>
            </ul>

        </div> --}}
      </div>
  </div>

</div>
<style>
  .service-gallery .swiper-slide img.img-fluid {
/* max-width: 274px;
min-width: 273px; */
width:100%;
max-height: 183px;
min-height: 182px;
object-fit: cover;
object-position: top;
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
<script>
  var origins = document.querySelectorAll("button[data-origin]");

for (let i = 0; i < origins.length; i++) {
origins[i].addEventListener('click', function(e) {
// Get all elements with data-origin defined
var allOrigins = document.querySelectorAll("*[data-origin]");
for (i = 0; i < allOrigins.length; i++) {
    allOrigins[i].classList.remove("active");
}

// Get all elements with data-target defined
var allTargets = document.querySelectorAll("*[data-target]");
for (i = 0; i < allTargets.length; i++) {
    allTargets[i].style.display = "none";
}

//Only get elements of which the data-target attribute matches the value of the data-origin of the clicked  element
var targets = document.querySelectorAll("*[data-target='"+e.target.dataset.origin+"']");
for (i = 0; i < targets.length; i++) {
    targets[i].style.display = "block";
}

e.target.classList.add("active");
});
}
</script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
 Fancybox.bind('[data-fancybox="gallery-a"]',{});
 Fancybox.bind('[data-fancybox="gallery-b"]',{});
 Fancybox.bind('[data-fancybox="gallery-c"]',{});
 Fancybox.bind('[data-fancybox="gallery-d"]',{});
 Fancybox.bind('[data-fancybox="gallery-e"]',{});
</script>
@endsection

