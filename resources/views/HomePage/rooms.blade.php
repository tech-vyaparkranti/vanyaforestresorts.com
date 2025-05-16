@extends('layouts.webSite')

@section('title', 'Luxury Rooms & Suites')
@section('meta_description', 'Explore the luxurious rooms at Trinantara Resort & Spa in Jim Corbett. Experience comfort, elegance and stunning views with our premium accommodations')
@section('meta_keywords', 'Premium Rooms, Luxury Accommodation in Jim Corbett, Best Resort in Jim Corbett, Trinantara Resort & Spa, Riverside resort in Jim Corbett, Resort in Jim Corbett national Park, Luxury Resort in Jim Corbett')

@section('content')

<div id="about">
  <div class="default-content pt-4 pb-3 our-service-page">
      <div class="container form-check-all">
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
              <h1><label>Rooms &</label> Suites</h1>
          </div>

          <div class="order mt-4">
              <div class="tab">

                <button class="tablinks active" data-origin="PremiumRoom">Premium Room</button>
                <button class="tablinks" data-origin="CottageRoom">Cottage Room</button>
                <button class="tablinks" data-origin="FamilySuites">Family Suites</button>
                <button class="tablinks" data-origin="PlungPoolRoom">Plung Poll Suites</button>
               

              </div>
          </div>
          <div class="tab-content-sec mt-4 mb-5">                 
                      <div data-target="PremiumRoom" class="tabcontent service-section" style="display: block">
                          <div class="service-container">
                              <div class="service-image">
                                  <img src="{{ asset($premium_room_image ?? './assets/img/premiumroom1.jpg') }}" alt="" class="img-fluid">
                              </div>
                              <div class="service-content">
                                  {!! $premium_room_content ?? '<p class="service-p"><b>Indulge in luxury and comfort in our Premium Rooms, where every detail is meticulously designed to exceed your expectations.(300 Square Feet)</b></p>
                                  <p class="service-p"><b>Luxurious Amenities:</b><ul>
                                      <li>King-size bed for ultimate comfort</li>
                                      <li>Air conditioning for a relaxing ambiance</li>
                                      <li>Flat-screen TV for entertainment</li>
                                      <li>Mini refrigerator for refreshments</li>
                                      <li>Almirah with safety locker for secure storage</li>  
                                  </ul></p>
                                  <p class="service-p"><b>Convenient Features:</b><ul>
                                    <li>Plush sofa for unwinding</li>
                                    <li>Convenient table for work or leisure</li>
                                    <li>Immaculate bathroom for rejuvenation</li> 
                                </ul></p>
                                <p class="service-p"><b>Breathtaking Views:</b><ul>
                                    <li>Sparkling pool views</li>
                                    <li>Serene forest views</li>
                                </ul></p>
                                <p class="service-p"><b>Unforgettable Experience:</b><ul>
                                    <li>Perfect blend of relaxation and luxury</li>
                                    <li> Spacious retreat for ultimate comfort</li>
                                    <li>Meticulously designed for an exceptional stay</li>
                                </ul></p>' !!}
                                 
                              </div>
                          </div>
                          <div class="service-gallery swiper">
                              <div class="swiper-wrapper">
                                @if(isset($premium_room)&& count($premium_room)>0)
                                    @foreach ($premium_room as $item )
                                    <div class="swiper-slide">
                                        <a data-fancybox="gallery-a" href="{{ asset($item->image) }}" class="service-items">
                                            <img src="{{ asset($item->image) }}" width="" height="" alt="restaurant" class="img-fluid"/>
                                        </a>
                                    </div>
                                    @endforeach
                                @else
                                  <div class="swiper-slide">
                                      <a data-fancybox="gallery-a" href="./assets/img/cottageroom1.jpg" class="service-items">
                                          <img src="./assets/img/cottageroom1.jpg" width="" height="" alt="restaurant" class="img-fluid"/>
                                      </a>
                                  </div>
                                  <div class="swiper-slide">
                                      <a data-fancybox="gallery-a" href="./assets/img/premiumroom2.jpg" class="service-items">
                                          <img src="./assets/img/premiumroom2.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                      </a>
                                  </div>
                                  <div class="swiper-slide">
                                      <a data-fancybox="gallery-a" href="./assets/img/plungpool.jpg" class="service-items">
                                          <img src="./assets/img/plungpool.jpg" width="" height="" alt="restaurant"  class="img-fluid"/>
                                      </a>
                                  </div>
                                  <div class="swiper-slide">
                                      <a data-fancybox="gallery-a" href="./assets/img/cottageroom.jpg" class="service-items">
                                          <img src="./assets/img/cottageroom.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                      </a>
                                  </div>
                                  <div class="swiper-slide">
                                      <a data-fancybox="gallery-a" href="./assets/img/familysuites.jpg" class="service-items">
                                          <img src="./assets/img/familysuites.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                      </a>
                                  </div>
                                @endif
                              </div>
                              <div class="swiper-button-prev slide-nav"></div>
                              <div class="swiper-button-next slide-nav"></div>
                              <div class="swiper-pagination custom-pagination swiper-pagination-bullets-dynamic"></div>
                          </div>
                      </div>
                      <div data-target="CottageRoom" class="tabcontent service-section">
                          <div class="service-container">
                              <div class="service-image">
                                  <img src="{{ asset($cottage_room_image ?? './assets/img/cottageroom.jpg') }}" alt="" class="img-fluid">
                              </div>
                              <div class="service-content">
                                {!! $cottage_room_image ?? '<p class="service-p"><b>Experience luxury and comfort in our charming Cottage Rooms, meticulously designed to surpass your expectations.(350 Square Feet)</b></p>
                                  <p class="service-p"><b>Luxurious Amenities:</b><ul>
                                      <li> King-size bed for ultimate comfort</li>
                                      <li>Air conditioning for a relaxing ambiance</li>
                                      <li>Flat-screen TV for entertainment</li>
                                      <li>Mini refrigerator for refreshments</li>
                                      <li>Almirah with safety locker for secure storage</li>  
                                  </ul></p>
                                  <p class="service-p"><b>Convenient Features:</b><ul>
                                    <li>Plush sofa for unwinding</li>
                                    <li>Convenient table for work or leisure</li>
                                    <li>Spotless bathroom for rejuvenation</li> 
                                </ul></p>
                                <p class="service-p"><b>Private Oasis:</b><ul>
                                    <li>Private balcony with stunning garden views</li>
                                    <li>Serene ambiance amidst lush green surroundings</li>
                                </ul></p>
                                <p class="service-p"><b>Unforgettable Experience:</b><ul>
                                    <li>Spacious retreat for ultimate comfort</li>
                                    <li> Meticulously designed for an exceptional stay</li>
                                    <li>Perfect escape from city life</li>
                                </ul></p>' !!}
                              </div>
                          </div>
                          <div class="service-gallery swiper">
                              <div class="swiper-wrapper">
                                @if(isset($cottage_room)&& count($cottage_room)>0)
                                    @foreach ($cottage_room as $item )
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallery-a" href="{{ asset($item->image) }}" class="service-items">
                                                <img src="{{ asset($item->image) }}" width="" height="" alt="restaurant" class="img-fluid"/>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                  <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/cottageroom1.jpg" class="service-items">
                                        <img src="./assets/img/cottageroom1.jpg" width="" height="" alt="restaurant" class="img-fluid"/>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/premiumroom2.jpg" class="service-items">
                                        <img src="./assets/img/premiumroom2.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/plungpool.jpg" class="service-items">
                                        <img src="./assets/img/plungpool.jpg" width="" height="" alt="restaurant"  class="img-fluid"/>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/cottageroom.jpg" class="service-items">
                                        <img src="./assets/img/cottageroom.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/familysuites.jpg" class="service-items">
                                        <img src="./assets/img/familysuites.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
                                </div>
                                @endif
                              </div>
                              <div class="swiper-button-prev slide-nav"></div>
                              <div class="swiper-button-next slide-nav"></div>
                              <div class="swiper-pagination custom-pagination swiper-pagination-bullets-dynamic"></div>
                          </div>
                      </div>
                      <div data-target="PlungPoolRoom" class="tabcontent service-section">
                          <div class="service-container">
                              <div class="service-image">
                                  <img src="{{ asset($plung_poll_image ?? './assets/img/plungpool.jpg') }}" alt="" class="img-fluid">
                              </div>
                              <div class="service-content">
                                {!! $plung_poll_content ?? ' <p class="service-p"><b>Plung Poll Suites(800 Square Feet)</b></p>
                                <p>Indulge in family fun with our Family Plunge Pool Room, designed for unforgettable moments together. You can stay 4 Adults and 2 kid in this room. Relax in the comfort of two king-size beds and unwind on the cozy sofa while enjoying entertainment on the TV. With two washrooms, there is ample space for everyone to freshen up. Step outside to your private plunge pool, or soak in the beauty of nature from the balcony overlooking the garden. Create lasting memories in this spacious and inviting retreat.</p>
                                  <p class="service-p"><b>Additional Features:</b><ul>
                                      <li>Private plunge pool for exclusive relaxation</li>
                                      <li>Expanded space for enhanced comfort</li>
                                      
                                       
                                  </ul></p>' !!}
                               
                                  
                              </div>
                          </div>

                          <div class="service-gallery swiper">
                              <div class="swiper-wrapper">
                                @if(isset($plung_poll)&& count($plung_poll)>0)
                                    @foreach ($plung_poll as $item )
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallery-a" href="{{ asset($item->image) }}" class="service-items">
                                                <img src="{{ asset($item->image) }}" width="" height="" alt="restaurant" class="img-fluid"/>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                  <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/cottageroom1.jpg" class="service-items">
                                        <img src="./assets/img/cottageroom1.jpg" width="" height="" alt="restaurant" class="img-fluid"/>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/premiumroom2.jpg" class="service-items">
                                        <img src="./assets/img/premiumroom2.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/plungpool.jpg" class="service-items">
                                        <img src="./assets/img/plungpool.jpg" width="" height="" alt="restaurant"  class="img-fluid"/>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/cottageroom.jpg" class="service-items">
                                        <img src="./assets/img/cottageroom.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/familysuites.jpg" class="service-items">
                                        <img src="./assets/img/familysuites.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
                                </div>
                                @endif
                              </div>
                              <div class="swiper-button-prev slide-nav"></div>
                              <div class="swiper-button-next slide-nav"></div>
                              <div class="swiper-pagination custom-pagination swiper-pagination-bullets-dynamic"></div>
                          </div>
                      </div>
                      <div data-target="FamilySuites" class="tabcontent service-section">
                        <div class="service-container">
                            <div class="service-image">
                                <img src="{{ asset($family_suite_image ?? './assets/img/familysuites.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="service-content">
                               {!! $family_suite_content ?? ' <h3 class="service-p" style="font-size: 32px">Family Suites</h3>
                                <p class="service-p"><b>Experience luxury and comfort in our charming Cottage Rooms, meticulously designed to surpass your expectations.(600 Square Feet)</b></p>
                                <p class="service-p"><b>Luxurious Amenities:</b><ul>
                                    <li>2 king-size beds for ultimate comfort</li>
                                    <li>Cozy sofa for family bonding</li>
                                    <li>Flat-screen TV for entertainment</li>
                                    <li>2 washrooms for added convenience</li>
                                     
                                </ul></p>
                                <p class="service-p"><b>Convenient Features:</b><ul>
                                  <li>Spacious retreat accommodating 4 adults and 2 kids</li>
                                  <li>Ample storage space</li>
                                   
                              </ul></p>
                              <p class="service-p"><b>Serene Ambiance:</b><ul>
                                  <li> Balcony overlooking lush green gardens</li>
                                  <li>Soothing natural surroundings</li>
                              </ul></p>
                              <p class="service-p"><b>Unforgettable Experience:</b><ul>
                                  <li>Perfect for family vacations</li>
                                  <li>Luxurious amenities for relaxation</li>
                                  <li> Ample space for quality time</li>
                              </ul></p>' !!}
                            </div>
                        </div>

                        <div class="service-gallery swiper">
                            <div class="swiper-wrapper">
                                @if(isset($family_suite)&& count($family_suite)>0)
                                    @foreach ($family_suite as $item )
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallery-a" href="{{ asset($item->image) }}" class="service-items">
                                                <img src="{{ asset($item->image) }}" width="" height="" alt="restaurant" class="img-fluid"/>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/cottageroom1.jpg" class="service-items">
                                        <img src="./assets/img/cottageroom1.jpg" width="" height="" alt="restaurant" class="img-fluid"/>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/premiumroom2.jpg" class="service-items">
                                        <img src="./assets/img/premiumroom2.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/plungpool.jpg" class="service-items">
                                        <img src="./assets/img/plungpool.jpg" width="" height="" alt="restaurant"  class="img-fluid"/>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/cottageroom.jpg" class="service-items">
                                        <img src="./assets/img/cottageroom.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery-a" href="./assets/img/familysuites.jpg" class="service-items">
                                        <img src="./assets/img/familysuites.jpg" width="" height="" alt="restaurant" class="img-fluid" />
                                    </a>
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
