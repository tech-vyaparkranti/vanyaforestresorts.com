<!-- Footer Section -->
<footer class="footer-section pt-5 pb-4">
    <div class="custom-container">
        <div class="row">
            <div class="col-md-5 mb-4">
                <div class="footer-item">
                    <div class="footer-logo">
                        <div class="footer-logo-inner">
                            <a href="{{ url('/') }}"><img src="{{ asset($Logo ?? './assets/img/logo.jpg') }}" class="img-fluid" width="130" height="86" alt="Vanya Forest resorts" ></a>
                        </div>
                        <p>{!! $footer_logo_content ?? '<b>VanyaForestResorts</b> offer a unique and expert experience to the modern hoteller. Expect an impeccable level of service from your first point of contact to your last moments of Tour. ' !!}</p>
                        <div class="gtranslate_wrapper mb-3">
                        </div>
                        <ul class="d-flex social-media-links">
                            <li class="links"><a href="{!! $facebook_link ?? 'https://www.facebook.com/Vanya Forest resort' !!}"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="links"><a href="{!! $twitter_link ?? 'https://x.com/Vanya Forest rmr' !!}"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li class="links"><a href="{!! $instagram_link ?? 'https://www.instagram.com/Vanya Forest resort' !!}"><i class="fa-brands fa-instagram"></i></a></li>
                            <li class="links"><a href="{!! $youtube_link ?? 'https://www.youtube.com/@Vanya Forest resortandspa' !!}"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="footer-item">
                    <h5 class="footer-title">Quick Link</h5>
                    <ul>
                        <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                        <li><a href="{{ route('rooms')}}">Rooms & Suites</a></li>
                        <li><a href="{{ route('amenities')}}">Amenities & Activities</a></li>
                        <li><a href="{{ route('blog')}}">Blog</a></li>

                        <li><a href="{{ route('eventsweddings')}}">Events</a></li>
                        <li><a href="{{ route('offerspackages')}}">Offers & Packages</a></li>

                        <li><a href="{{ route('galleryPages') }}">Gallery</a></li>
                        <li><a href="{{ route('contactUs') }}">Contact Us</a></li>

                        <li><a href="{{ route('termsConditions') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                        {{-- <li><a href="{{ route('holipackage') }}">Holi Package</a></li> --}}

                    </ul>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="footer-item">
                    <h5 class="footer-title">Contact Information</h5>
                    <div class="footer-contact">
                        <div class="footer-item pb-3">
                            <label>Company E-mail:</label>
                            <p><i class="fa-solid fa-envelope"></i>&nbsp;<a href="mailto:{!! $contact_us_email ??"vanyaforestresort@gmail.com" !!}">{!! $contact_us_email ?? "vanyaforestresort@gmail.com" !!}</a></p>
                        </div>
                        <div class="footer-item pb-3">
                            <label>Contact No:</label>
                            <p><i class="fa-solid fa-phone"></i>&nbsp;<a href="tel:+91{!! isset($contact_us_contact_number)?str_replace(" ","",$contact_us_contact_number):"9068445788" !!}">+91 {!! $contact_us_contact_number??"9068445788" !!}  </a></p><p><i class="fa-solid fa-phone"></i>&nbsp;<a href="tel:+91{!! isset($contact_us_contact_number_2)?str_replace(" ","",$contact_us_contact_number_2):"9068445788" !!}">+91 {!! $contact_us_contact_number_2??"9068445788" !!}</a></p>
                        </div>
                        <div class="footer-item pb-3">
                            {{-- <label>Address:</label> --}}
                            <label>Operational Office:</label>
                            <p><i class="fa-solid fa-location-dot"></i>&nbsp;{!! $location ?? 'Bail Pokra, Vanya Resort' !!}</p>
                        </div>
                        <div class="footer-item pb-3">
                            {{-- <label>Address:</label> --}}
                            <label>Registered Office:</label>
                            <p><i class="fa-solid fa-location-dot"></i>&nbsp;{!! $location2 ?? 'Near Thapli Baba Mazar, Lakhanpur, Ramnagar, Nainital, Uttarakhand,244715' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright-section text-center p-2 text-white">&copy; <script>document.write( new Date().getFullYear() );</script>  All Rights Reserved by Vanyaforestresort & Developed by <a href="https://vyaparkranti.com/" class="text-white" aria-label="Digital Markating" alt="Vyapar Kranti">Vyapar kranti</a></div>
<!-- Footer Section End-->
