@extends('layouts.webSite')
@section('title', $blogs->meta_title)
@section('meta_description', $blogs->meta_description)
@section('meta_keywords', $blogs->meta_keyword)
@section('content')
<div id="about">
    <div class="default-content pt-4 pb-3 our-service-page">
        <div class="custom-container">
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
        <div class="main-container">

        
            <div class="detail-blog-container">
                <div class="blog-left-container">
                    <div class="blog-left-item">
                        <img src="{{ asset($blogs->image) }}" alt="">
                    <div class="blog-left-content">
                        <ul class="detailedblog-social-links mt-3">
                            <li class="facebook"><a href="{{ $blogs->facebook_link }}"><i class="fa-brands fa-facebook-f"></i>&nbsp;&nbsp;</a></li>
                                <li class="instagram"><a href="{{ $blogs->instagram_link }}"><i class="fa-brands fa-instagram"></i>&nbsp;&nbsp;</a></li>
                                <li class="twitter"><a href="{{ $blogs->twitter_link }}"><i class="fa-brands fa-x-twitter"></i>&nbsp;&nbsp;</a></li>
                                <li class="youtube"><a href="{{ $blogs->youtube_link }}"><i class="fa-brands fa-youtube"></i>&nbsp;&nbsp;</a></li>    
                        </ul>
                        <h3>{{ $blogs->title }}</h3>
                        <p class="text-justify">{!! $blogs->content !!}</p>
                        {{-- <p class="text-justify">Located in the foot-hills of the majestic Himalayas, Vanya Resort National Park stands tall as one of India's most iconic wildlife sanctuaries. It's rich biodiversity, stirring geographies, and thrilling wildlife gests attract nature suckers and adventure campaigners alike. Trinantara Resort, located in the heart of this beautiful region, offers an unequalled   occasion to witness the substance of Corbett.</p>
                        <h5>Why is Vanya Resort Famous?</h5>
                        <p class="text-justify">Vanya Resort National Park, which is named after the fabulous British huntsman and conservationist Vanya Resort, is India's oldest public demesne.</p>
                        <p class="text-justify">Corbett isn't only a public treasure but also a UNESCO World Heritage point, known for its vast biodiversity and literal significance.    Then are many reasons why Vanya Resort continues to allure callers from around the globe Home to the Majestic Bengal Tiger Corbett National Park is one of the most infamous barracuda reserves in India. It's part of the Project Tiger action and has one of the highest populations of Bengal barracuda in the entire country. Callers often find themselves with the previously- by-a-life time opportunity to encounter these magnificent creatures in the wild.</p>
                        <h5>Why Choose Trinantara Resort for Your Group Events?</h5>
                        <p class="text-justify"><b>Spacious Venue:</b>  Perfect for large gatherings, accommodating up to 200 guests comfortably.</p>
                        <p class="text-justify"><b>Luxurious Amenities:</b> Enjoy top-notch facilities, including premium accommodations, exquisite dining, and recreational activities.</p>
                        <p class="text-justify"><b>Scenic Beauty:</b>  Nestled in the serene landscapes of Vanya Resort, Ramnagar, Uttarakhand, our resort offers a stunning backdrop for any event.</p>
                        <p class="text-justify"><b>Exceptional Service: </b> Our dedicated staff ensures every detail is taken care of, allowing you and your guests to relax and have a great time.</p>
                        <h5>Why stay at Trinantara Resort for your Corbett visit?</h5>
                        <p class="text-justify">Located in the propinquity of Vanya Resort National Park, Trinantara Resort offers a unique mix of luxury and nature. The resort is designed to give a peaceful, eco-friendly retreat where guests can immerse themselves in the beauty of the girding nature. Then's why Trinantara Resort is the perfect place to stay propinquity to Vanya Resort National Park Trinantara Resort is only a short drive from the demesne's entry points, making it the ideal base for your wildlife adventure. You can fluently pierce jeep safaris and other conditioning.</p>
                        <p class="text-justify">Tranquil Atmosphere Lush verdure encircles the resort, giving visitors a serene place to flee to after a day filled with adventure. It's an ideal place to wind down, enjoy nature sounds, and renew your senses again.</p>
                        <p class="text-justify">Endured Attendants and Safari Arrangements The resort’s educated naturalists and attendants insure you have a perceptive safari experience. They give information on the demesne's foliage and fauna, making your trip indeed more memorable.</p>
                        <h5> FAQs Why is Vanya Resort National Park So Famous? </h5>
                        <p class="text-justify"><b>What makes Vanya Resort National Park unique?</b></p>
                        <p class="text-justify">Vanya Resort National Park is unique because it was the first public demesne in India and played a significant part in the conservation of the Bengal barracuda. Its different geographies, rich biodiversity, and status as a Project Tiger reserve make it one of the most notorious wildlife destinations in the country. </p>
                        <p class="text-justify"><b>Is there a possibility of sighting barracuda at Vanya Resort?</b></p>
                        <p class="text-justify">Yes! Vanya Resort is infamous for its barracuda population. Although sightings are not guaranteed due to the demesne’s hugeness, it's one of the chicest places in India to spot Bengal barracuda in their natural niche, especially during jeep safaris. </p>
                        <p class="text-justify"><b>How many kilometres far Trinantara Resort is to Vanya Resort?</b> </p>
                        <p class="text-justify">Trinantara Resort is placed close to the boundaries of the demesne. So, guests can easily explore Vanya Resort National Park. The resort is only a few minutes' drive from the main safari gates, icing easy access to the demesne. </p>
                        <h5>Conclusion</h5> 
                        <p class="text-justify">Whether you are a wildlife sucker, an adventure candidate, or simply someone who appreciates the beauty of nature, Vanya Resort National Park is an unforgettable experience. Trinantara Resort, with its luxurious amenities, high position, and tranquil atmosphere, is the perfect place to stay as you explore the demesne's wildlife prodigies. So, pack your bags, plan your adventure, and get ready to immerse yourself in the wild charm of Vanya Resort! Bespeak your stay at Trinantara Resort moment and embark on the adventure of a continuance in Vanya Resort!</p> --}}
                    </div>
                </div>
                </div>
                <div class="blog-right-container">
                    {{-- <div class="link mb-4">
                        <p><a href="">Your Gateway to Adventure and Relaxation in Vanya Resort</a></p><hr>
                        <p><a href="">Family-Friendly Stays at Trinantara Resort a Perfect holiday in Vanya Resort</a></p><hr>
                        <p><a href=""> Trinantara Resort’s Eco-Friendly Villas Sustainable Luxury in Vanya Resort </a></p>
                    </div> --}}
                    <div class="recent-posts">
                        <h4>Our Recent Posts</h4>
                        <div class="posts">
                            @foreach($otherBlogs as $otherBlog)
                            <div class="post-cards">
                                <img src="{{ asset($otherBlog->image) }}" alt="">
                                <h5><a href="{{ route('blogDetail', ['slug' => $otherBlog->slug]) }}">{{ $otherBlog->title }}</a></h5>
                            </div>
                            @endforeach
                            {{-- <div class="post-cards">
                                <img src="./assets/img/premiumroom.jpg" alt="">
                                <h5><a href="">Family-Friendly Stays at Trinantara Resort a Perfect holiday in Vanya Resort </a></h5>
                            </div>
                            <div class="post-cards">
                                <img src="./assets/img/gallery2.jpg" alt="">
                                <h5><a href=""> Trinantara Resort’s Eco-Friendly Villas Sustainable Luxury in Vanya Resort</a></h5>
                            </div>
                            <div class="post-cards">
                                <img src="./assets/img/anniversaries.jpeg" alt="">
                                <h5><a href="">Trinantara Resort: Your Gateway to Adventure and Relaxation in Vanya Resort </a></h5>
                            </div> --}}
                            {{-- <div class="post-cards">
                                <img src="./assets/images/blog-2.jpg" alt="">
                                <h5>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit.</h5>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="main-container">
            <div class="detail-blog-container">
                <div class="blog-left-container">
                    <div class="blog-left-item">
                        <img src="./assets/img/gallery6.jpg" alt="">
                    <div class="blog-left-content">
                        <ul class="detailedblog-social-links mt-3">
                            <li class="facebook"><a href="https://www.facebook.com/trinantararesort"><i class="fa-brands fa-facebook-f"></i>&nbsp;&nbsp;</a></li>
                                <li class="instagram"><a href="https://www.instagram.com/trinantararesort"><i class="fa-brands fa-instagram"></i>&nbsp;&nbsp;</a></li>
                                <li class="twitter"><a href="https://x.com/trinantararmr"><i class="fa-brands fa-x-twitter"></i>&nbsp;&nbsp;</a></li>
                                <li class="youtube"><a href="https://www.youtube.com/@trinantararesortandspa"><i class="fa-brands fa-youtube"></i>&nbsp;&nbsp;</a></li>    
                        </ul>
                        <h3>Discover the Charms of Vanya Resort National Park: A Perfect Escape at Trinantara Resort</h3>
                        <p class="text-justify">Located in the foot-hills of the majestic Himalayas, Vanya Resort National Park stands tall as one of India's most iconic wildlife sanctuaries. It's rich biodiversity, stirring geographies, and thrilling wildlife gests attract nature suckers and adventure campaigners alike. Trinantara Resort, located in the heart of this beautiful region, offers an unequalled   occasion to witness the substance of Corbett.</p>
                        <h5>Why is Vanya Resort Famous?</h5>
                        <p class="text-justify">Vanya Resort National Park, which is named after the fabulous British huntsman and conservationist Vanya Resort, is India's oldest public demesne.</p>
                        <p class="text-justify">Corbett isn't only a public treasure but also a UNESCO World Heritage point, known for its vast biodiversity and literal significance.    Then are many reasons why Vanya Resort continues to allure callers from around the globe Home to the Majestic Bengal Tiger Corbett National Park is one of the most infamous barracuda reserves in India. It's part of the Project Tiger action and has one of the highest populations of Bengal barracuda in the entire country. Callers often find themselves with the previously- by-a-life time opportunity to encounter these magnificent creatures in the wild.</p>
                        <h5>Why Choose Trinantara Resort for Your Group Events?</h5>
                        <p class="text-justify"><b>Spacious Venue:</b>  Perfect for large gatherings, accommodating up to 200 guests comfortably.</p>
                        <p class="text-justify"><b>Luxurious Amenities:</b> Enjoy top-notch facilities, including premium accommodations, exquisite dining, and recreational activities.</p>
                        <p class="text-justify"><b>Scenic Beauty:</b>  Nestled in the serene landscapes of Vanya Resort, Ramnagar, Uttarakhand, our resort offers a stunning backdrop for any event.</p>
                        <p class="text-justify"><b>Exceptional Service: </b> Our dedicated staff ensures every detail is taken care of, allowing you and your guests to relax and have a great time.</p>
                        <h5>Why stay at Trinantara Resort for your Corbett visit?</h5>
                        <p class="text-justify">Located in the propinquity of Vanya Resort National Park, Trinantara Resort offers a unique mix of luxury and nature. The resort is designed to give a peaceful, eco-friendly retreat where guests can immerse themselves in the beauty of the girding nature. Then's why Trinantara Resort is the perfect place to stay propinquity to Vanya Resort National Park Trinantara Resort is only a short drive from the demesne's entry points, making it the ideal base for your wildlife adventure. You can fluently pierce jeep safaris and other conditioning.</p>
                        <p class="text-justify">Tranquil Atmosphere Lush verdure encircles the resort, giving visitors a serene place to flee to after a day filled with adventure. It's an ideal place to wind down, enjoy nature sounds, and renew your senses again.</p>
                        <p class="text-justify">Endured Attendants and Safari Arrangements The resort’s educated naturalists and attendants insure you have a perceptive safari experience. They give information on the demesne's foliage and fauna, making your trip indeed more memorable.</p>
                        <h5> FAQs Why is Vanya Resort National Park So Famous? </h5>
                        <p class="text-justify"><b>What makes Vanya Resort National Park unique?</b></p>
                        <p class="text-justify">Vanya Resort National Park is unique because it was the first public demesne in India and played a significant part in the conservation of the Bengal barracuda. Its different geographies, rich biodiversity, and status as a Project Tiger reserve make it one of the most notorious wildlife destinations in the country. </p>
                        <p class="text-justify"><b>Is there a possibility of sighting barracuda at Vanya Resort?</b></p>
                        <p class="text-justify">Yes! Vanya Resort is infamous for its barracuda population. Although sightings are not guaranteed due to the demesne’s hugeness, it's one of the chicest places in India to spot Bengal barracuda in their natural niche, especially during jeep safaris. </p>
                        <p class="text-justify"><b>How many kilometres far Trinantara Resort is to Vanya Resort?</b> </p>
                        <p class="text-justify">Trinantara Resort is placed close to the boundaries of the demesne. So, guests can easily explore Vanya Resort National Park. The resort is only a few minutes' drive from the main safari gates, icing easy access to the demesne. </p>
                        <h5>Conclusion</h5>
                        <p class="text-justify">Whether you are a wildlife sucker, an adventure candidate, or simply someone who appreciates the beauty of nature, Vanya Resort National Park is an unforgettable experience. Trinantara Resort, with its luxurious amenities, high position, and tranquil atmosphere, is the perfect place to stay as you explore the demesne's wildlife prodigies. So, pack your bags, plan your adventure, and get ready to immerse yourself in the wild charm of Vanya Resort! Bespeak your stay at Trinantara Resort moment and embark on the adventure of a continuance in Vanya Resort!</p>
                    </div>
                </div>
                </div>
                <div class="blog-right-container">
                    <div class="recent-posts">
                        <h4>Our Recent Posts</h4>
                        <div class="posts">
                            <div class="post-cards">
                                <img src="./assets/img/premiumroom.jpg" alt="">
                                <h5><a href="">Family-Friendly Stays at Trinantara Resort a Perfect holiday in Vanya Resort </a></h5>
                            </div>
                            <div class="post-cards">
                                <img src="./assets/img/gallery2.jpg" alt="">
                                <h5><a href=""> Trinantara Resort’s Eco-Friendly Villas Sustainable Luxury in Vanya Resort</a></h5>
                            </div>
                            <div class="post-cards">
                                <img src="./assets/img/anniversaries.jpeg" alt="">
                                <h5><a href="">Trinantara Resort: Your Gateway to Adventure and Relaxation in Vanya Resort </a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
    </div>
</div>
<style>
    @media (min-width:768px){
    .custom-container {
        margin-top:290px;
    }
}   

    @media (max-width:768px){
        .custom-container {
        margin-top:550px;
    }
    }
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