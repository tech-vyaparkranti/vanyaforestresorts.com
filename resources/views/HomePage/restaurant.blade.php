@extends('layouts.webSite')
@section('title', 'Restaurants')
@section('content')
<div class="information-content">
    <ul class="m-auto list-unstyled custom-container">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="">Restaurants</a></li>
    </ul>
</div>
    <div id="about">
        <div class="default-content pt-5 pb-3">
            <div class="custom-container">
                <div class="site-title pb-3">
                    <h2 class="text-center">Rajhans Restaurants</h2>
                </div>
                <div id="about">
                    <div class="default-content pt-4 pb-3">
                        <div class="custom-container event-container">
                            <div class="row event-row">
                                <div class="col-md-8">
                                    {{-- Events Main Banner --}}
                                    <div class="events-main-banner">
                                        <img src="./assets/img/resturants.jpg" alt="Hotel" class="img-fluid" />
                                    </div>
                                    {{-- Events Main Banner End--}}
                                    {{-- scope of events --}}
                                    <div class="events-details">
                                        <h2 class="event-title">Trinantararesort International - Restaurants</h2>
                                        <p class="event-dis">See why so many travelers make Trinantararesort International their hotel of choice when visiting Bhagalpur. Providing an ideal mix of value, comfort and convenience, it offers a family-friendly setting with an array of amenities designed for travelers like you.<br> Rooms at Trinantararesort International offer a flat screen TV and air conditioning providing exceptional comfort and convenience.<br> A 24 hour front desk, room service, and 24 hour check-in are some of the conveniences offered at this hotel. A lounge will also help to make your stay even more special. If you are driving to Trinantararesort International, free parking is available. <br>For those interested in checking out Vaasupujya Bhagwan Mahavir Jain Mandir (1.9 mi) while visiting Bhagalpur, Trinantararesort International is a short distance away.<br> If you’re looking for an Indian restaurant, consider a visit to Royal darbar, Celebration, or Metro mirchi reataurant, which are all conveniently located a short distance from Trinantararesort International.<br>
                                        Plus, during your trip, don't forget to check out an architectural building, such as Rabindra Bhawan.<br>
                                        We’re sure you’ll enjoy your stay at Trinantararesort International as you experience all of the things Bhagalpur has to offer. </p>
                                        <hr>
                                        <ul class="event-service-list m-0 p-0">
                                            <li><i class="fa-solid fa-bed"></i>
                                                <span>Stay</span>
                                                <p>Complimentary accommodation for event organizers or guests, with options for discounted room blocks.</p>
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
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-dumbbell"></i>
                                                <span>Fitness Center Access</span>
                                                <p>Access to the hotel's fitness center included for guests staying at the hotel.</p>
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-person-swimming"></i>
                                                <span>Swimming Pool Access</span>
                                                <p>Use of the hotel's swimming pool facilities included for guests during their stay.</p>
                                            </li>
                                            <li>
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
                                                <p>A welcome reception or cocktail hour included as part of the event package.</p>
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
                                                <p>Extended checkout times offered for guests staying overnight, subject to availability.</p>
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-children"></i>
                                                <span>Children's Activities</span>
                                                <p>Complimentary children's activities or childcare services available for families attending the event.</p>
                                            </li>
                                        </ul>
                                        <p class="event-note"><b>Please Note:</b> **Rates are exclusive of TAXES || Complimentary morning Buffet Breakfast || Extra Bed : 1000/-</p>
                                        <hr>
                                        <div class="highlights">
                                            <h3>Trip Highlights</h3>
                                            <ul>
                                                <li>Explore Mount Titlis in a ROTAIR, the world's first cable car that revolves 360 degrees and offers a breathtaking view of the snow-clad Alps.</li>
                                                <li>Feel the touch of the snowy breeze on your face as you ascend smoothly and safely over snowfields in an Ice Flyer at Titlis.</li>
                                                <li>Be amazed by the magnificent beauty of Rhine Falls, Europe's largest waterfall, and hear the mighty roar as you go on a boat ride.</li>
                                                <li>Fascinate your inner soccer enthusiast as you witness the legendary FIFA museum.</li>
                                            </ul>
                                            <h3>Stay Categorys</h3>
                                            <ul>
                                                <li>Executive</li>
                                                <li>Deluxe</li>
                                                <li>Royal Suit</li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- scope of events End --}}
                                    {{-- Gallery Section --}}
                                    <div class="events-details">
                                        <h3>Event glimpse</h3>
                                    </div>
                                    <div class="event-gallery">
                                        <a data-fancybox="hotel" class="event-gallery-item picture-item swiper-slide" href="./assets/img/deluxe.jpg">
                                            <div class="img-container">
                                                <img class="img-fluid" src="./assets/img/deluxe.jpg" width="200" height="150" alt="" />
                                                <div class="gallery-content overlay">
                                                    <h3>Deluxe Rooms</h3>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </a>
                                        <a data-fancybox="hotel" class="event-gallery-item picture-item swiper-slide" href="./assets/img/ExecutiveRoom.jpg">
                                            <div class="img-container">
                                                <img  class="img-fluid" src="./assets/img/ExecutiveRoom.jpg" width="200" height="150" alt="" />
                                                <div class="gallery-content overlay">
                                                    <h3>Executive Room</h3>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </a>
                                        <a data-fancybox="hotel" class="event-gallery-item picture-item swiper-slide" href="./assets/img/RoyalSuite.jpg">
                                            <div class="img-container">
                                                <img class="img-fluid" src="./assets/img/RoyalSuite.jpg" width="200" height="150" alt="" />
                                                <div class="gallery-content overlay">
                                                    <h3>Royal Suite</h3>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- Gallery Section End --}}
                                    
                                </div>
                                <div class="col-md-4 form-details">
                                    <div class="event-query-form query-form">
                                        <div class="site-title pb-1">
                                            <h2 class="text-center">Book Now</h3>
                                        </div>
                                        <div class="query-form-section row">
                                            <div class="col-md-6 col-sm-6 col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input placeholder="Full Name" type="text" name="name" id="enquiry_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">E-mail ID</label>
                                                    <input placeholder="Email" type="email" name="email" id="enquiry_email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Mobile No</label>
                                                    <input placeholder="Phone No" type="tel" name="phone_number" id="enquiry_mobile" class="form-control">
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Services</label>
                                                    <select class="form-control" name="services" id="enquiry_service">
                                                        <option>Select Services</option>
                                                        <option>Educational School Tours</option>
                                                        <option>Leadership and Management Skill Programs</option>
                                                        <option>Corporate Individual & Group Tours</option>
                                                        <option>Adventure Tourism</option>
                                                        <option>Apartment & Villa Vacations</option>
                                                        <option>Participate in International Conventions</option>
                                                        <option>International Rail Holidays</option>
                                                        <option>Individual Family Tours</option>
                                                        <option>International & Domestic Tours</option>
                                                        <option>International & Domestic Flight Bookings</option>
                                                        <option>Visa Assistance</option>
                                                        <option>Travel Insurance</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Message</label>
                                                    <textarea placeholder="Message" name="message" class="form-control" id="enquiry_message" rows="3" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <x-input-with-label-element id="captcha_enquiry_form" type="text" label="Captcha" name="captcha" required placeholder="Captcha"></x-input-with-label-element>
                                            <div class="col-md-8 col-sm-12 mb-3">
                                                <div class="row">
                                                    <div class="col-md-12 pt-4">
                                                        <img  class="img-thumbnail h-100" src="{{ captcha_src() }}" id="captcha_img_id_enquiry_form">
                                                        <button type="button" class="btn default-btn btn-block font-weight-bold"
                                                            onclick="refreshCapthca('captcha_img_id_enquiry_form','captcha_enquiry_form')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group mt-2">
                                                    <button type="submit" onclick="SubmitFormData()" id="submitEnquiry" class="btn submit-form">Submit <i class="fa-solid fa-paper-plane"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
                <script>
                    Fancybox.bind('[data-fancybox="hotel"]', {
                    //
                  });   
                </script>
            </div>
        </div>
    </div>
@endsection