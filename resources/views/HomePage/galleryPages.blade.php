@extends('layouts.webSite')
@section('title', 'Our Gallery')
@section('meta_description', 'Explore the beauty of Vanya Forest  Resort & Spa, Vanya Resort, through our stunning gallery.
    Discover breathtaking views, luxurious accommodations, serene spa experiences, and unforgettable moments.')
@section('meta_keywords', 'Destination Wedding in Vanya Resort, adventure activities in Vanya Resort, Holiday packages jim
    Vanya, Family Stay in Vanya Resort, Best Resort in Vanya Resort, 5 star resort in Vanya Resort')
@section('content')
    <div class="information-content">
        <ul class="m-auto list-unstyled custom-container">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="">Gallery</a></li>
        </ul>
    </div>
    <div id="about">
        <div class="default-content pt-4 pb-5">
            <div class="custom-container form-check-all">
                {{-- <div class="site-title pb-2">
                    <h2 class="text-center">Gallery</h2>
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
                <div class="d-flex justify-content-between align-items-center pb-2">
                        <h2 class="m-0">Gallery</h2>
                        <a href="{!! $googledrive_link ?? 'https://drive.google.com/drive/folders/1jBKHhg7cWzLSHoFAU7F6aF48kOpBiegt' !!}" class="btn google-drive">More Photos</a>
                    </div>
                <div class="shuffle_wrapper text-center pt-3 pb-4">
                    <button class="default-btn" id='all'><span>All</span></button>
                    @if (isset($filter_category))
                        @foreach ($filter_category as $item)
                            <button class="default-btn filter"
                                data-filter_category="{{ $item->filter_category }}"><span>{{ $item->filter_category }}</span></button>
                        @endforeach
                    @else
                        <button class="default-btn" id='btn-hotel'><span>hotel</span></button>
                        <button class="default-btn" id='btn-hotel_one'><span>hotel One</span></button>
                    @endif

                </div>
                <div class="row my-shuffle-container">
                    {{-- @if (!empty($galleryImages)) 
                    @foreach ($galleryImages as $item)
                    <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["{!!  $item->filter_category !!}"]'><img src="{{ $item->local_image?url($item->local_image):$item->image_link}}" class="img-fluid" width="" height="" alt="Destinations"></div>
                    @endforeach
    
                @else
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel"]'>
                        <img src="./assets/img/wedding1.jpg" data-fancybox="gallery-page"  class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel"]'>
                        <img src="./assets/img/pool1.jpg" data-fancybox="gallery-page"  class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                        <img src="./assets/img/yoga2.jpg" data-fancybox="gallery-page"  class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                        <img src="./assets/img/dining1.jpg" data-fancybox="gallery-page"  class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                        <img src="./assets/img/yoga1.jpg" data-fancybox="gallery-page"  class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                        <img src="./assets/img/premiumroom.jpg" data-fancybox="gallery-page" class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                        <img src="./assets/img/honeymoonpackage.jpg" data-fancybox="gallery-page" class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                        <img src="./assets/img/dining.jpg" data-fancybox="gallery-page" class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                        <img src="./assets/img/gallery6.jpg" data-fancybox="gallery-page" class="img-fluid" width="" height="" alt="Destinations">
                    </div>
                    <div class="col-1@sm my-sizer-element"></div>
                @endif --}}
                    @if (isset($galleryImages) && $galleryImages->isNotEmpty())
                        @foreach ($galleryImages as $item)
                            <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["{{ $item->filter_category }}"]'>
                                <img src="{{ $item->local_image ? url($item->local_image) : $item->image_link }}"
                                    class="img-fluid" alt="Destinations">
                            </div>
                        @endforeach
                    @else
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel"]'>
                            <img src="./assets/img/wedding1.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel"]'>
                            <img src="./assets/img/pool1.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                            <img src="./assets/img/yoga2.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                            <img src="./assets/img/dining1.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                            <img src="./assets/img/yoga1.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                            <img src="./assets/img/premiumroom.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                            <img src="./assets/img/honeymoonpackage.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                            <img src="./assets/img/dining.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6 picture-item gallery_pics" data-groups='["hotel_one"]'>
                            <img src="./assets/img/gallery6.jpg" data-fancybox="gallery-page" class="img-fluid"
                                alt="Destinations">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <style>
        .gallery_pics img{
            max-width: 374px;
            max-height: 249px;
            min-height: 248px;
            object-fit: cover;
        }
        a.btn.google-drive {
    background-color: rgb(var(--yellow-color));
    color: rgb(var(--white-color));
    font-size: 16px;
}a.btn.google-drive:hover{
    background-color: rgb(var(--blue-color));
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
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/6.1.0/shuffle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        var gallary_page = window.location.pathname;
        var split_name = gallary_page.split("/").pop();
        const getpage = () => {
            var Shuffle = window.Shuffle;
            var element = document.querySelector('.my-shuffle-container');
            var sizer = element.querySelector('.my-sizer-element');
            var shuffleInstance = new Shuffle(element, {
                itemSelector: '.picture-item'
            });
            // shuffleInstance.filter('animal');
            $("#all").on("click", function() {
                shuffleInstance.filter();
            });
            $("#btn-hotel").on("click", function() {
                shuffleInstance.filter('hotel');
            });
            $("#btn-hotel_one").on("click", function() {
                shuffleInstance.filter('hotel_one');
            });
            $(".filter").on("click", function() {
                let filterData = $(this).data("filter_category");
                shuffleInstance.filter(filterData);
            });
        }
        if (split_name == 'gallery') {
            getpage();
        }
        Fancybox.bind('[data-fancybox="gallery-page"]', {});
    </script>
@endsection
