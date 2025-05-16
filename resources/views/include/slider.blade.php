<!-- main Video Section -->
<div class="video-banner">
    <div class="video-block">
        {{-- <video autoplay muted loop playsinline preload="metadata" class="desktop-video">
            <source src="assets/video/video-two.mp4" type="video/mp4">
        </video>
        <video autoplay muted loop playsinline preload="metadata" hidden class="mobile-video">
            <source src="assets/video/video-two.mp4" type="video/mp4">
        </video> --}}
        <div class="swiper main-slider">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slide)
                <div class="swiper-slide swiper-slide-next">
                    <img class="img-fluid" width="" height="" alt="Image" src="{{ asset($slide->image) }}"/>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="main-banner-form">
        <div class="main-form-container">
            <h3>Get a Free quote</h3>
            <form action="javascript:"  id="submitQuote" enctype="multipart/form-data">
                @csrf 
                <div class="group-grid">
                    <div class="group-grid-item form-group">
                        <input type="text" autocomplete="off" required class="form-control" name="full_name"
                            placeholder="Full Name" />
                    </div>
                    <div class="group-grid-item form-group">
                        <input type="tel" autocomplete="off" required class="form-control" name="phone"
                            placeholder="Mobile No" />
                    </div>
                </div>
                <div class="group-grids">
                    <div class="group-grid-item form-group">
                        <input type="email" autocomplete="off" required class="form-control" name="email"
                            placeholder="Email ID" />
                    </div>
                    
                </div>
                <div class="group-grids">
                    <div class="group-grid-item form-group">
                        <textarea rows="5" class="form-control" name="message" required placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="submit-btn">
                    <button type="submit" name="submit" id="submitQuote_button">Request a free quote</button>
                </div>
            </form>
        </div>
    </div> --}}
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
    
    <div class="container video-main-content">
        <div class="video-content">
            {!! $slider_content ?? ' <h3>Experience Luxury <br>
                and Comfort</h3>
            <p>Explore More Services</p>' !!}
           
            {{-- <a href="{{ route('contactUs') }}" aria-label="Explore The World">Get in touch</a> --}}
        </div>
    </div>
    
</div>
<style>
.video-main-content{position: relative;margin: 0 auto;}

.main-slider  .swiper-wrapper img {
  /* transition: 3s ease-in-out; */
  transform: scale(1.1);
  opacity: 1;
}
.main-slider  .swiper-wrapper .swiper-slide.swiper-slide-prev img {
  opacity: 1;
}
.main-slider  .swiper-wrapper .swiper-slide.swiper-slide-next img {
  /* transition: 10s ease-in-out; */
  opacity: 0.5;
  transform: scale(1);
}



.main-slider  .swiper-wrapper .swiper-slide.swiper-slide-active img{
    animation: swiper-transition 8s;
}
@keyframes swiper-transition{
    0%{
        transform: scale(1);
        opacity:0;
    }
    50%{
        transform: scale(1.05);
        opacity:1;
    }
    100%{
        transform: scale(1);
        opacity:0;
    }
}
     @media(max-width: 767px){
  .main-slider  .swiper-wrapper .swiper-slide img{
    min-height: 600px
  }
  .video-block > .main-slider, .video-block > video {position: static;}
  .video-banner,.video-block{height: 100%;padding-bottom: 0}
  .main-slider  .swiper-wrapper .swiper-slide.swiper-slide-prev img {object-position: right;}
  .main-slider  .swiper-wrapper .swiper-slide.swiper-slide-next img {object-position: left;}
}
</style>
<style>
    .banner-form-container {
    position: absolute;
    top: 79%;
    left: 10%;
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.85);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 1270px;
    z-index: 10;
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
        margin-bottom: 60px;
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
    top: 88% !important;
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
    top: 69% !important;
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
    
    
