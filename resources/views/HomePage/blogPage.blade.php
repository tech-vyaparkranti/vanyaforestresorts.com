@extends('layouts.webSite')
@section('title', 'Blog')
@section('meta_description', 'Discover the exceptional amenities at Trinantara Resort & Spa, Jim Corbett. From spa and swimming pool to fine dining and adventure activities.')
@section('meta_keywords', 'Spa & Wellness, Spa Resort in Jim Corbett, Best Resort in Jim Corbett, Trinantara Resort & Spa, Riverside resort in Jim Corbett, Resort in Jim Corbett national Park, Luxury Resort in Jim Corbett')
@section('content')
<div id="about">
    <div class="default-content pt-4 pb-3 our-service-page">
        <div class="custom-container">

            <div class="main-container form-check-all">
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
                            <input type="tel" id="mobile" name="mobile" class="form-control" pattern="[0-9]{10}"
                                placeholder="Enter 10-digit mobile number" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <div class="site-title text-center pb-4">
                            <h1><label>Our Blogs</label></h1>
                        </div>
                    </div>
                </div>
                <div class="blog-section">
                    @if(isset($blogs) && count($blogs) > 0)
                        @foreach($blogs as $blog)
                            <div class="blog-card mb-3">

                                <div class="blog-card-container">
                                    <a href="{{ route('blogDetail', ['slug' => $blog->slug]) }}">
                                        <img src="{{ asset($blog->image) }}" alt="blog image">
                                    </a>
                                    <div class="card-content">
                                        <h4 class="blog_heading">{{ $blog->title }}</h4>
                                        <p class="blog-content">{{ $blog->short_content }}</p>
                                        <ul class="blog_social_links mb-3">
                                            <li><a href="{{ $blog->facebook_link }}"><i class="fa-brands fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="{{ $blog->instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
                                            </li>
                                            <li><a href="{{ $blog->twitter_link }}"><i class="fa-brands fa-x-twitter"></i></a>
                                            </li>
                                            <li><a href="{{ $blog->youtube_link }}"><i class="fa-brands fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                        <span><a href="{{ route('blogDetail', ['slug' => $blog->slug]) }}">Read more</a></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="blog-card mb-3">
                            <div class="blog-card-container">
                                <img src="./assets/img/cottageroom1.jpg" alt="blog image">
                                <div class="card-content">
                                    <h4 class="blog_heading">Trinantara Resort: Your Gateway to Adventure and Relaxation in
                                        Jim Corbett</h4>
                                    <p class="blog-content">Being perfectly combined with thrills of adventure and peace at
                                        large, Trinantara Resort, offering thrilling safari visits, offers the guest
                                        relaxing atmospheres. Be it taking up wildlife of Corbett or just unwinding amidst
                                        luxury lodging, resort leaves a good memory and even guides through tenures to
                                        conditioning for nature-lover and adventure-lovers, in turn.</p>
                                    <ul class="blog_social_links mb-3">
                                        <li><a href="https://www.facebook.com/trinantararesort"><i
                                                    class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.instagram.com/trinantararesort"><i
                                                    class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="https://x.com/trinantararmr"><i class="fa-brands fa-x-twitter"></i></a>
                                        </li>
                                        <li><a href="https://www.youtube.com/@trinantararesortandspa"><i
                                                    class="fa-brands fa-youtube"></i></a></li>
                                    </ul>
                                    <span><a href="">Read more</a></span>
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
        flex-wrap: wrap;
        /* Allow wrapping on smaller screens */
        gap: 15px;
        /* Space between items */
        justify-content: space-between;
        /* Spread items evenly */
        align-items: center;
        /* Align items vertically */
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
        flex: 0 0 100%;
        /* Button takes full row */
    }

    /* Styling for input fields */
    .banner-form .form-control {
        width: 100%;
        /* Ensure full width */
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

    @media(max-width:992px) {
        .banner-form-container {
            position: absolute;
            top: 264px !important;
            right: 5% !important;
            left: 5% !important;
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

        .form-group textarea.form-control,
        .form-group select.form-control,
        .form-group input.form-control {
            padding: 6px 6px !important;
        }

        .banner-form .form-group {
            flex: 1 1 100%;
            /* Stack inputs on small screens */
        }

        .banner-form .form-group.button-group {
            flex: 1 1 100%;
            /* Ensure button spans full width */
        }
    }
</style>

@endsection

@section('pageScript')
<script type="text/javascript"></script>
@endsection