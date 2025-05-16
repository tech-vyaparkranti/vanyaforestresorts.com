@extends('layouts.webSite')
@section('title', 'Weddings & Events in Jim Corbett')
@section('meta_description', 'Host your dream event or wedding at Trinantara Resort & Spa, Jim Corbett. With stunning venues, world-class services, and a scenic backdrop, make your special occasion truly memorable.')
@section('meta_keywords', 'Destination Wedding, Wedding in jim corbett, best destination wedding venue in india, corporate events, group activities, Wedding Resort in Jim Corbett')
@section('content')

<div id="about">
  <div class="default-content pt-4 pb-3 our-service-page">
  <div class="site-title text-center pb-2">
              {{-- <h1>Events <label> & Wedding</label></h1> --}}
          </div>
      <div class="container form-check-all">
      <div class="banner-eventform-container">
        <h5 class="pb-2">Don't Miss Out - Check Your Discount Today </h5>
        <form class="banner-eventform" method="POST" action="{{ route('weddingeventform.store') }}">
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
                <select id="guests" name="guests" class="form-control" required>
                    <option value="">select no. of guest</option>
                    <option value="0-25">0-25</option>
                    <option value="25-50">25-50</option>
                    <option value="50-100">50-100</option>
                    <option value="100-150">100-150</option>
                    <option value="150-200">150-200</option>
                    <option value="200-250">200-250</option>
                    <option value="250-300">300 +</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="occasion">Occasion</label>
                <select id="occasion" name="occasion" class="form-control" required>
                    <option value="">Select Occasion</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Ring ceremony">Ring ceremony</option>
                    <option value="Roka ceremony">Roka ceremony</option>
                    <option value="Reception">Reception</option>
                    <option value="Family Gathering">Family Gathering</option>
                    <option value="Birthday">Birthday</option>
                    <option value="Office meeting">Office meeting</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="budget">Budget</label>
                <input type="text" id="budget" name="budget" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="food_preference">Food Preference</label>
                <select id="food_preference" name="food_preference" class="form-control" required>
                    <option value="">Select Food Preference</option>
                    <option value="veg">Veg</option>
                    <option value="non-veg">Non-Veg</option>
                    <option value="Jain">Jain</option>
                    <option value="veg-nonveg">veg-nonveg</option>
                    <option value="Jain-veg">Jain-veg</option>
                </select>
            </div>
            
            
            
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" class="form-control" pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    </div>
          
          
          <div class="order mt-4">
              <div class="tab">

                <button class="tablinks active" data-origin="Weddings">Weddings & Social Events</button>
                <button class="tablinks" data-origin="CorporateRetreats">Corporate Events</button>
                <button class="tablinks" data-origin="OutdoorEvents">Outdoor Events</button>
                {{-- <button class="tablinks" data-origin="PrivateParties">Private Parties</button> --}}
                <button class="tablinks" data-origin="OtherEvents">Other Events</button>
                <button class="tablinks" data-origin="IndoorEvents">Indoor Events</button>
                <button class="tablinks" data-origin="SeasonalEvents">Seasonal Events</button>
                <button class="tablinks" data-origin="ThemedEvents">Themed Events</button>
              </div>
          </div>
            <div class="tab-content-sec mt-4 mb-5">
                <div class="custom-container">
                      <div data-target="Weddings" class="tabcontent service-section" style="display: block">
                        <div class="event-collarge">
                            @if(isset($wedding_and_social_events) && count($wedding_and_social_events)>0)
                                @foreach ($wedding_and_social_events as $item )
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
                                            <a href="{{ route('weddingEnquiry')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                    <div class="row d-flex align-items-center service-gallery" id="Modular-Kitchen">
                                        <div class="col-md-6 col-sm-6 mb-4 service-images">
                                            <div class="package-collarge-container">
                                                <div class="package-collarge-item ">
                                                    <a href="#">
                                                        <img src="./assets/img/destination.jpeg" alt="Collarge" class="img-fluid">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-4 service-text">
                                            <h3 class="destinations-title mh-auto">Destination Weddings</h3>
                                            <p>Destination weddings provide couples with the opportunity to say "I do" in stunning, far-flung locations, creating unforgettable experiences. These intimate celebrations combine love, adventure, and breathtaking scenery for a truly unique occasion.</p>
                                            <a href="{{ route('weddingEnquiry')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center service-gallery" id="Bedroom">
                                        <div class="col-md-6 col-sm-6 mb-4 service-images">
                                            <div class="package-collarge-container mt-5">
                                                <div class="package-collarge-item">
                                                    <a href="#">
                                                        <img src="./assets/img/reception.jpeg" alt="Collarge" class="img-fluid">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-4 service-text">
                                            <h3 class="destinations-title mh-auto">Receptions</h3>
                                            <p>Receptions are the joyous celebrations that follow a wedding ceremony, where friends and family gather to toast the newlyweds. It’s a time for laughter, dancing, and creating lasting memories as the couple begins their new life together.</p>
                                            <a href="{{ route('weddingEnquiry')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                        <div class="col-md-6 col-sm-6 mb-4 service-images">
                                            <div class="package-collarge-container mt-5">
                                                <div class="package-collarge-item">
                                                    <a href="#">
                                                        <img src="./assets/img/engagement.jpeg" alt="Collarge" class="img-fluid">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-4 service-text">
                                            <h3 class="destinations-title mh-auto">Engagement Parties</h3>
                                            <p>Engagement parties are a festive way to celebrate a couple’s commitment, bringing together friends and family to share in the excitement. It’s a fun occasion filled with love, laughter, and anticipation for the journey toward the wedding day.</p>
                                            <a href="{{ route('weddingEnquiry')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center service-gallery" id="children-room">
                                        <div class="col-md-6 col-sm-6 mb-4 service-images">
                                            <div class="package-collarge-container mt-5">
                                                <div class="package-collarge-item">
                                                    <a href="#">
                                                        <img src="./assets/img/anniversaries.jpeg" alt="Collarge" class="img-fluid">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-4 service-text">
                                            <h3 class="destinations-title mh-auto">Anniversaries</h3>
                                            <p>Anniversaries are special milestones that celebrate the enduring love and commitment between couples. They provide an opportunity to reflect on cherished memories, renew vows, and create new traditions together.
                                            </p>
                                            <a href="{{ route('weddingEnquiry')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
                                        <div class="col-md-6 col-sm-6 mb-4 service-images">
                                            <div class="package-collarge-container mt-5">
                                                <div class="package-collarge-item">
                                                    <a href="#">
                                                        <img src="./assets/img/birthdaycelebration.jpg" alt="Collarge" class="img-fluid">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-4 service-text">
                                            <h3 class="destinations-title mh-auto">Birthday Celebrations</h3>
                                            <p>Birthday celebrations are joyful occasions to honour another year of life, surrounded by loved ones and festivities. Whether it's a small gathering or a grand party, it's a time to celebrate individuality, create memories, and enjoy moments of happiness.</p>
                                            <a href="{{ route('weddingEnquiry')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center service-gallery" id="office">
                                        <div class="col-md-6 col-sm-6 mb-4 service-images">
                                            <div class="package-collarge-container mt-5">
                                                <div class="package-collarge-item">
                                                    <a href="#">
                                                        <img src="./assets/img/familyreunion.jpg" alt="Collarge" class="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-4 service-text">
                                            <h3 class="destinations-title mh-auto"> Family Reunions</h3>
                                            <p>Family reunions are heartwarming gatherings that bring relatives together to reconnect, share memories, and strengthen bonds. These events are filled with laughter, love, and the joy of rekindling old relationships while creating new ones.</p>
                                            <a href="{{ route('weddingEnquiry')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center service-gallery" id="office">
                                        <div class="col-md-6 col-sm-6 mb-4 service-images">
                                            <div class="package-collarge-container mt-5">
                                                <div class="package-collarge-item">
                                                    <a href="#">
                                                        <img src="./assets/img/mehndi.jpeg" alt="Collarge" class="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-4 service-text">
                                            <h3 class="destinations-title mh-auto">Mehndi/Katha ceremonies</h3>
                                            <p>Mehndi and Katha ceremonies are vibrant pre-wedding traditions that celebrate love, culture, and family. The Mehndi ceremony involves applying intricate henna designs, while the Katha ceremony is a spiritual gathering, often marked by storytelling, prayers, and joyous celebration.</p>
                                            <a href="{{ route('weddingEnquiry')}}" type="button" class="book-amenities" >Contact Us</a>
                                        </div>
                                    </div>
                            @endif
                        </div>
                      </div>
                      <div data-target="CorporateRetreats" class="tabcontent service-section">
                        <div class="event-collarge">
                            @if(isset($corporate_events) && count($corporate_events)>0)
                                @foreach ($corporate_events as $item )
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
                                                    <img src="./assets/img/businesscenter.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Conferences</h3>
                                        <p>Conferences are professional events where experts, thought leaders, and industry peers come together to share knowledge, exchange ideas, and network. These gatherings foster learning, collaboration, and innovation, offering opportunities for growth and development.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Bedroom">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/teambuilding.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Team Building Retreats</h3>
                                        <p>Team building retreats are immersive experiences designed to strengthen collaboration, communication, and trust among team members. These retreats combine activities, challenges, and relaxation to enhance teamwork, boost morale, and improve productivity in a refreshing environment.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/productlaunches.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Product Launches</h3>
                                        <p>Product launches are exciting events where companies unveil new products to the market, generating buzz and anticipation. These occasions combine presentations, demonstrations, and promotions to showcase the product’s features and create lasting impressions with customers and media.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="children-room">
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
                                        <h3 class="destinations-title mh-auto">Board Meetings</h3>
                                        <p>Board meetings are formal gatherings where company leaders discuss key strategies, make important decisions, and evaluate organizational performance. These meetings provide a platform for governance, planning, and ensuring the company’s long-term success.
                                        </p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/incentivetrips.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Incentive Trips</h3>
                                        <p>Incentive trips are reward-based getaways offered to employees or teams as recognition for outstanding performance. These trips combine relaxation and adventure, motivating individuals while fostering team spirit and loyalty to the organization.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/trainingsession.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Training Sessions</h3>
                                        <p>Training sessions are structured events designed to enhance skills, knowledge, and performance in a specific area. These sessions provide opportunities for personal and professional growth, empowering participants with the tools and insights to excel in their roles.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/offsite.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Off-site Meetings</h3>
                                        <p>Off-site meetings are professional gatherings held outside the usual workplace, designed to foster focus, creativity, and team collaboration. These meetings offer a refreshing change of environment, encouraging productive discussions, strategic planning, and stronger team dynamics.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </div>
                      <div data-target="OutdoorEvents" class="tabcontent service-section">
                        <div class="event-collarge">
                            @if(isset($outdoor_events) && count($outdoor_events)>0)
                                @foreach ($outdoor_events as $item )
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
                                                    <img src="./assets/img/destination.jpeg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Outdoor Weddings</h3>
                                        <p>Outdoor weddings offer a romantic and scenic setting, allowing couples to exchange vows amidst nature’s beauty. Whether in a garden, on a beach, or in the mountains, these weddings provide a stunning backdrop for a memorable and intimate celebration.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Bedroom">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/poolside.jpeg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Poolside Parties</h3>
                                        <p>Poolside parties combine relaxation and fun, offering a vibrant atmosphere for socializing and enjoying the sun. With music, cocktails, and refreshing swims, these gatherings create a lively and festive setting for friends and family to unwind and celebrate.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/lawngame.png" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto"> Lawn Games & Activities</h3>
                                        <p>Lawn games and activities bring a fun and playful element to outdoor events, encouraging friendly competition and group engagement. From cornhole to badminton, these games create a lively atmosphere, perfect for bonding and enjoying the outdoors with family and friends.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="children-room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/campfire2.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Bonfire Nights</h3>
                                        <p>Bonfire nights create a cozy and magical atmosphere, where friends and family gather around a crackling fire to share stories, enjoy warmth, and stargaze. These gatherings often include music, roasted marshmallows, and a sense of connection with nature under the night sky.
                                        </p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/campfire1.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Stargazing Sessions</h3>
                                        <p>Stargazing sessions offer a serene experience of gazing at the night sky, often guided by experts to explore constellations, planets, and celestial events. These sessions inspire awe and wonder, providing a peaceful escape while connecting with the vastness of the universe.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/outdoor-cinema.avif" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Outdoor Movie Screenings</h3>
                                        <p>Outdoor movie screenings offer a unique and relaxed way to enjoy films under the stars, combining entertainment with the beauty of nature. Whether in a park or a backyard, these events create a cozy, communal atmosphere for movie lovers to share the experience with friends and family.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/teambuilding.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Team Building Activities</h3>
                                        <p>Team building activities like obstacle courses foster collaboration, problem-solving, and trust among team members. These engaging challenges promote teamwork and communication, helping groups bond, improve morale, and develop skills in a fun, dynamic environment.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </div>
                      <div data-target="OtherEvents" class="tabcontent service-section">
                        <div class="event-collarge">
                            @if(isset($other_events) && count($other_events)>0)
                                @foreach ($other_events as $item )
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
                                                    <img src="./assets/img/yoga1.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Yoga & Wellness Retreats</h3>
                                        <p>Yoga and wellness retreats offer a peaceful escape to rejuvenate the mind, body, and spirit. These retreats combine yoga, meditation, and wellness practices in serene locations, promoting relaxation, personal growth, and overall well-being.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Bedroom">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/yoga4.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto"> Meditation Camps</h3>
                                        <p>Meditation camps provide a tranquil setting for individuals to deepen their mindfulness practice and achieve inner peace. These immersive retreats focus on meditation techniques, mental clarity, and personal reflection, helping participants to reduce stress and enhance emotional well-being.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/adventure.avif" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Adventure Activities</h3>
                                        <p>Adventure activities offer thrilling experiences that challenge the body and mind, from hiking and rock climbing to zip-lining and kayaking. These activities foster excitement, teamwork, and personal growth, all while exploring the great outdoors.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="children-room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/bird-watching2.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Nature Walks & Bird Watching</h3>
                                        <p>Nature walks and bird watching provide peaceful opportunities to connect with the natural world, observe wildlife, and enjoy the beauty of the outdoors. These activities promote relaxation, mindfulness, and a deeper appreciation for the environment.
                                        </p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/bird-watching1.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Photography Workshops</h3>
                                        <p>Photography workshops offer hands-on learning experiences to enhance skills in capturing stunning images. These workshops cover various techniques, from composition to lighting, allowing participants to refine their craft and gain creative inspiration.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/foodfestival.webp" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Food & Wine Festivals</h3>
                                        <p>Food and wine festivals celebrate culinary excellence, offering a delightful experience of tasting, discovering, and savouring a wide variety of dishes and wines. These events bring together food lovers and experts, creating a vibrant atmosphere of exploration and indulgence.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/culturalevent.webp" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Cultural Events</h3>
                                        <p>Cultural events, such as music and dance performances, celebrate diverse traditions and artistic expression. These vibrant gatherings offer a rich experience of entertainment, fostering a deeper understanding and appreciation of different cultures through live performances and creative showcases.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </div>
                      <div data-target="IndoorEvents" class="tabcontent service-section">
                        <div class="event-collarge">
                            @if(isset($indoor_events) && count($indoor_events)>0)
                                @foreach ($indoor_events as $item )
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
                                                    <img src="./assets/img/businesscenter.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto"> Indoor Conferences</h3>
                                        <p>Indoor conferences provide a focused, professional environment for networking, learning, and idea exchange. With structured sessions, workshops, and keynote speakers, these events allow attendees to gain valuable insights, collaborate, and stay informed about industry trends.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Bedroom">
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
                                        <h3 class="destinations-title mh-auto">Meeting Rooms for smaller groups</h3>
                                        <p>Meeting rooms for smaller groups offer an intimate and focused setting for discussions, brainstorming, and decision-making. These spaces are ideal for fostering collaboration, allowing teams to engage in productive conversations without distractions in a comfortable, professional environment.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/dining.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Private Dining Events</h3>
                                        <p>Private dining events offer an exclusive and intimate setting for guests to enjoy gourmet meals in a personalized atmosphere. Whether for business, celebrations, or special occasions, these events provide exceptional service and a tailored menu to create memorable dining experiences.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="children-room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/carom.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Indoor Games</h3>
                                        <p>Indoor games like table tennis, foosball, and darts provide fun, competitive entertainment in a comfortable setting. These activities promote teamwork, relaxation, and friendly competition, making them perfect for both casual gatherings and team-building events.
                                        </p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
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
                                        <h3 class="destinations-title mh-auto">Fitness Center & Spa Events</h3>
                                        <p>Fitness centre and spa events offer a rejuvenating experience combining physical wellness and relaxation. These events often include fitness classes, wellness workshops, and spa treatments, providing participants with a holistic approach to health, stress relief, and self-care.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/offsite.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto"> Indoor Team Building Activities </h3>
                                        <p>Indoor team-building activities like escape rooms, trivia challenges, and problem-solving games encourage collaboration and creative thinking. These engaging experiences help teams strengthen communication, enhance problem-solving skills, and build trust in a fun, interactive environment</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/trainingsession.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Training Sessions</h3>
                                        <p>Training sessions are structured opportunities for individuals or teams to develop new skills, improve performance, and expand knowledge in specific areas. These sessions often include hands-on learning, expert guidance, and practical exercises to ensure effective growth and development.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </div>
                      <div data-target="SeasonalEvents" class="tabcontent service-section">
                        <div class="event-collarge">
                            @if(isset($seasonal_events) && count($seasonal_events)>0)
                                @foreach ($seasonal_events as $item )
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
                                                    <img src="./assets/img/diwaliparty.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">New Year's Eve Parties</h3>
                                        <p>New Year's Eve parties are vibrant celebrations marking the end of one year and the beginning of another. Filled with music, dancing, and festive toasts, these parties offer a joyful atmosphere for ringing in the new year with friends, family, and loved ones.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Bedroom">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/christmasparty.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Christmas Celebrations</h3>
                                        <p>Christmas celebrations are joyful occasions filled with festive decorations, gift exchanges, and gatherings of loved ones. These celebrations blend tradition, warmth, and goodwill, creating a magical atmosphere of joy, togetherness, and festive cheer.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/diwaliparty1.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Diwali Parties</h3>
                                        <p>Diwali parties are vibrant celebrations filled with lights, music, delicious food, and traditional rituals. These festive gatherings bring family and friends together to celebrate the triumph of light over darkness, sharing joy, sweets, and the spirit of togetherness.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="children-room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/holiparty.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Holi Celebrations</h3>
                                        <p>Holi celebrations are lively and colourful festivals of joy, where people come together to throw vibrant powders, dance, and celebrate the arrival of spring. The festivities promote unity, love, and happiness, creating an atmosphere of carefree fun and cultural tradition.
                                        </p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/summercamp.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto"> Summer Camps for kids</h3>
                                        <p>Summer camps for kids provide a fun and educational environment, offering activities like sports, arts, and nature exploration. These camps foster teamwork, creativity, and personal growth, while giving children the opportunity to make lasting friendships and create unforgettable memories.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/monsoonretreats.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Monsoon Retreats</h3>
                                        <p>Monsoon retreats offer a peaceful escape to nature, where guests can relax and rejuvenate while enjoying the soothing sounds of rain. These retreats often include wellness activities, cozy accommodations, and serene landscapes, making them perfect for unwinding and reconnecting with oneself during the rainy season.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="office">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/winterfestival.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto"> Winter Festivals</h3>
                                        <p>Winter festivals are magical celebrations that embrace the season’s chill with festive lights, music, food, and winter-themed activities. These events offer a cozy, joyful atmosphere, perfect for enjoying outdoor ice skating, holiday markets, and warm drinks with friends and family.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </div>
                      <div data-target="ThemedEvents" class="tabcontent service-section">
                        <div class="event-collarge">
                            @if(isset($themed_events) && count($themed_events)>0)
                                @foreach ($themed_events as $item )
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
                                                    <img src="./assets/img/junglethemed.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Jungle-themed Parties</h3>
                                        <p>Jungle-themed parties immerse guests in a wild adventure, featuring lush decorations, animal-inspired costumes, and tropical elements. With vibrant greenery, jungle sounds, and exotic treats, these parties offer a fun and exciting atmosphere for an unforgettable experience.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Bedroom">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/wildlife.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Wildlife-themed Weddings</h3>
                                        <p>Wildlife-themed weddings celebrate the beauty of nature and the animal kingdom, incorporating elements like lush greenery, animal-inspired decor, and outdoor settings. These unique weddings provide a stunning, eco-friendly backdrop, creating an unforgettable experience for nature-loving couples and guests.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="Hall-Room-Dining-Room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/vintagethemed.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Vintage-themed Events</h3>
                                        <p>Vintage-themed events evoke the charm and elegance of past eras, featuring retro décor, classic music, and period-inspired attire. These events offer a nostalgic atmosphere, where guests can enjoy timeless style, old-fashioned cocktails, and a sense of stepping back in time.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="children-room">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/outdoorthemed.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Outdoor Adventure-themed Parties</h3>
                                        <p>Outdoor adventure-themed parties bring the thrill of nature and exploration to life, with activities like hiking, campfire stories, and treasure hunts. These events are perfect for adventure enthusiasts, combining fun challenges, outdoor games, and a sense of adventure in a scenic setting.
                                        </p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center service-gallery" id="tv-cabinet">
                                    <div class="col-md-6 col-sm-6 mb-4 service-images">
                                        <div class="package-collarge-container mt-5">
                                            <div class="package-collarge-item">
                                                <a href="#">
                                                    <img src="./assets/img/culturalthemed.jpg" alt="Collarge" class="img-fluid">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 mb-4 service-text">
                                        <h3 class="destinations-title mh-auto">Cultural-themed Events</h3>
                                        <p>Cultural-themed events, such as the Uttarakhand cultural festival, celebrate the rich traditions, music, dance, and cuisine of a particular region. These events offer immersive experiences that highlight local heritage, fostering appreciation and connection to diverse cultures through vibrant performances and authentic customs.</p>
                                        <a href="{{ route('contactUs')}}" type="button" class="book-amenities" >Contact Us</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </div>

                      <div class="service-content">
                        <h3 class="service-p"><b>Capacity:</b></h3>
                           
                        <p>{!! $events_capacity_content ?? ' <ul>
                            <li>Conference Hall: 150-200 pax</li>
                            <li>Lawn: 800-1000 pax</li>
                            <li>Poolside: 150-200 pax</li>
                            <li>Indoor Dining: 150-200 pax</li>  
                            </ul>' !!}</p>
                    </div>
                </div>
            </div>
            

          <div class="contact_detail custom-container">
            <div class="col-md-4 form-details ">
               <div class="event-query-form query-form">
                <div class="site-title text-center pb-2">
                    <h2><label>Enquiry</label> Now<span></span></h2>
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
            <div class="index-contact">
                <img src="{{ asset($events_page_image ?? './assets/img/index-contact.jpg') }}" alt="">
            </div>
           </div>
      </div>
  </div>
</div>
<style>
    .contact_detail{
        display: grid;
        grid-template-columns: repeat(2,1fr);

    }
    .contact_detail .index-contact img{
        max-width: 660px;

        min-height: 520px;

    }
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
    .banner-eventform-container {
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
    .banner-eventform {
        display: flex;
        flex-wrap: wrap; /* Allow wrapping on smaller screens */
        gap: 15px; /* Space between items */
        justify-content: space-between; /* Spread items evenly */
        align-items: center; /* Align items vertically */
        text-align: justify;
    }
    .banner-eventform .form-group {
    flex: 1;
    font-size: 18px;
    min-width: 220px;
    margin-bottom: 0;
}
    
    /* Full-width button */
    .banner-eventform .form-group.button-group {
        flex: 0 0 100%; /* Button takes full row */
    }
    
    /* Styling for input fields */
    .banner-eventform .form-control {
        width: 100%; /* Ensure full width */
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }
    @media (max-width: 992px) {
    .banner-eventform .btn {
        max-width: 145px !important;
        min-width: 145px !important;
        /* margin-bottom: 60px; */
    }
}
    /* Styling for the button */
    .banner-eventform .btn {
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
    .banner-eventform-container {
    position: absolute;
    top: 264px !important;
    right:5% !important;
    left:5% !important;
}
.banner-eventform .form-group {
    flex: 1;
    font-size: 18px;
    min-width: 155px !important;
    margin-bottom: 0;
}
.banner-eventform {
    gap: 8px !important;
}
.banner-eventform .btn {

    max-width: 145px !important;
    min-width: 145px !important;
}
}
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .banner-eventform-container {
    max-width: 100%;
    left: 5%;
    top: 422px !important;
    right: 5%;
    padding: 15px;
}

.tab {
    overflow: hidden;
    border: 1px solid rgb(var(--blue-color));
    background-color: rgb(var(--blue-color));
    margin: auto;
    margin-top: 17vh;
    border-radius: 8px;
    white-space: nowrap;
    overflow: auto;
}
.banner-eventform {
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
        
        .banner-eventform .form-group {
            flex: 1 1 100%; /* Stack inputs on small screens */
        }
        
        .banner-eventform .form-group.button-group {
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
<script>
    let site_url = '{{ url('/') }}';
    function SubmitFormData(){
        let enquiry_name = $("#enquiry_name").val();
        if(!enquiry_name){
            errorMessage("Full name is required.");
            return false;
        }
        let enquiry_email = $("#enquiry_email").val();
        if(!enquiry_email){
            errorMessage("Email is required.");
            return false;
        }
        let enquiry_mobile = $("#enquiry_mobile").val();
        if(!enquiry_mobile){
            errorMessage("Mobile number is required.");
            return false;
        }
        // let services = $("#enquiry_service").val();
        // if(!services){
        //     errorMessage("Services is required.");
        //     return false;
        // }

        let message = $("#enquiry_message").val();
        if(!message){
            errorMessage("Message is required.");
            return false;
        }
        let captcha_enquiry_form = $("#captcha_enquiry_form").val();
        if(!captcha_enquiry_form){
            errorMessage("Captcha is required.");
            return false;
        }
        $("#submitEnquiry").prop("disabled",true);
        $.ajax({
        type: 'POST',
        url: '{{ route("saveHotelEnquiryFormData") }}',
        data: {
        "_token":"{{ csrf_token() }}",
        "name": enquiry_name,
        "email":enquiry_email,
        "phone_number":enquiry_mobile,
        // "services":services,
        "message":message,
        "captcha":captcha_enquiry_form
        },
        success: function (response) {
            $("#submitEnquiry").prop("disabled",false);
            if (response.status) {
                successMessage(response.message);
                window.location.reload();
            }else{
                refreshCapthca('captcha_img_id_enquiry_form','captcha_enquiry_form');
                errorMessage(response.message);
            }
        },
        failure: function (response) {
            errorMessage(response.message??"Something went wrong.");
            $("#submitEnquiry").prop("disabled",false);
            refreshCapthca('captcha_img_id_enquiry_form','captcha_enquiry_form');
        }
    });
    }
</script>
<script>
    $(document).ready(function() {
        $(".banner-eventform").on("submit", function(e) {
            e.preventDefault(); // Prevent the default form submission
            
            var form = new FormData(this); // Use FormData to include file uploads if needed

            $.ajax({
                type: 'POST',
                url: '{{ route('weddingeventform.store') }}', // Ensure this route points to your controller
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show success message with SweetAlert
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Optionally clear the form if needed
                                $(".banner-eventform")[0].reset();

                                // Reload the page after 5 seconds (optional)
                                setTimeout(function() {
                                    window.location.reload();
                                }, 5000);
                            }
                        });
                    } else {
                        // Show error message if the response.success is false
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Show error message for AJAX errors
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while processing the form. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    console.error('AJAX Error:', status, error);
                }
            });
        });
    });

    
</script>

@endsection
