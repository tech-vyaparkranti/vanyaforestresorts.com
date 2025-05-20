@extends('layouts.webSite')
@section('title', 'Contact Us')
@section('meta_description', "Get in touch with Trinantara Resort & Spa, your gateway to luxury in Vanya Resort. Contact us for bookings, inquiries, or personalized assistance. We're here to make your stay unforgettable.")
@section('meta_keywords', 'Contact us,Destination Wedding in Vanya Resort, adventure activities in Vanya Resort, Holiday packages Vanya Resort, Family Stay in Vanya Resort, Best Resort in Vanya Resort, 5 star resort in Vanya Resort')
@section('content')
<div class="information-content">
    <ul class="m-auto list-unstyled custom-container">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="">Reach Us</a></li>
    </ul>
</div>
<div id="about">
    <div class="default-content mt-4">
        <div class="custom-container">
            <!-- Contact Area Strat -->
            <div class="row mb-4 info-container">
                <div class="contact-info-container col-md-5 col-sm-5 col-xs-12 p-0">
                    <div class="contact-info">
                        <div class="midd-content section-title mb-3">
                            <h3>Get in touch</h3>
                            <p>{!! $get_in_touch_content ?? 'For reservations, inquiries, or assistance, feel free to reach out to us. We look forward to welcoming you!' !!}</p>
                        </div>
                        <div class="get-in-touch">
                            <ul class="list-unstyled">
                                <li>
                                    <h4>Head Office</h4>
                                    <p>{!! $location ?? 'Bail Pokra, Vanya Resort' !!}</p>
                                </li>
                                <li>
                                    <h4>E-mail Us</h4>
                                    <p><a href="mailto:{!! $contact_us_email ??"vanyaforestresort@gmail.com" !!}">{!! $contact_us_email ?? "vanyaforestresort@gmail.com" !!}</a></p>
                                </li>
                                <li>
                                    <h4>Call Us</h4>
                                    <p>Phone no:<a href="tel:+91{{ isset($contact_us_contact_number)?str_replace(" ","",$contact_us_contact_number):"9068445788" }}">+91{{ $contact_us_contact_number??"9068445788" }} </a>|<a href="tel:+91{{ isset($contact_us_contact_number)?str_replace(" ","",$contact_us_contact_number):"9068445788" }}">+91{{ $contact_us_contact_number??"9068445788" }}</a></p>
                                </li>
                            </ul>
                            <p>Follow our social media</p>
                            <ul class="list-unstyled socil-media">
                                <li class="links"><a href="{!! $facebook_link ?? 'https://www.facebook.com/trinantararesort' !!}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li class="links"><a href="{!! $twitter_link ?? 'https://x.com/trinantararmr' !!}"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li class="links"><a href="{!! $instagram_link ?? 'https://www.instagram.com/trinantararesort' !!}"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="contact-form-area mb-2">
                        <div class="midd-content section-title mb-3">
                            <h3>Send us a message</h3>
                        </div>
                        <form enctype="multipart/form-data" method="POST" id="contactUsForm" action="javascript:">
                            @csrf
                            <input type="hidden" name="country_code" value="" id="country_code_id">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="first_name">Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            placeholder="First name" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="last_name">Last name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Last name" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email ID" required>
                                        <div class="invalid-feedback">Please provide a valid Email.</div>
                                    </div>
                                </div> --}}
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="phone_number">Phone</label>
                                        <input type="tel" pattern="^[1-9][0-9]*$" class="form-control"
                                            id="phone_number" name="phone_number" required>
                                        <div class="invalid-feedback">Please provide a valid phone number.</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" id="message" name="message" maxlength="1000" minlength="30" required rows="3"></textarea>
                                        <div class="invalid-feedback">Please provide a message.</div>
                                    </div>
                                </div>
                                <x-input-with-label-element id="captcha" type="text" label="Captcha" name="captcha"
                                    required placeholder="Captcha"></x-input-with-label-element>
                                <div class="col-md-8 col-sm-12 mb-3">
                                    <div class="row">
                                        <div class="col-md-6 pt-4">
                                            <img src="{{ captcha_src() }}" class="img-thumbnail h-100"
                                                id="captcha_img_id">
                                        </div>
                                        <div class="col-md-6 pt-4 view-button">
                                            <button type="button" class="btn default-btn btn-block font-weight-bold"
                                                onclick="refreshCapthca('captcha_img_id','captcha')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                    <path fill-rule="evenodd"
                                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                                </svg>
                                                Refresh
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" value="" id="tnc"
                                            required>
                                        <label class="form-check-label" for="tnc">Agree to terms and
                                            conditions</label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="view-button">
                                <button class="default-btn" id="submitButton" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mt-4">
                    <div class="map-area">
                        <!-- google-map-area start -->
                        <div class="google-map-area mb-20">
                            <!--  Map Section -->
                            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d61238.34069100491!2d85.05503546122516!3d25.581757533264355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1715773161050!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                           <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3425.8886410701265!2d79.231706!3d29.307583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390a73803a6287a5%3A0x8f4aeadbc9522e08!2sVanya%20Forest%20Resort!5e0!3m2!1sen!2sin!4v1715842590000!5m2!1sen!2sin"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                            </iframe>


                            </div>
                    </div>
                </div>
            </div>
            <!-- Contact Area End -->
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#contactUsForm").on("submit", function() {
            var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
            full_number = Number(full_number);
            //$("#phone_number").val(full_number);
            typeof(full_number);
            $("#country_code_id").val("+" + phone_number.getSelectedCountryData().dialCode);
            var form = new FormData(this);

            $("#submitButton").attr("disable", true);
            $.ajax({
                type: 'post',
                url: '{{ route('saveContactUsDetails') }}',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        successMessage(response.message, true);
                    } else {
                        errorMessage(response.message ?? "Something went wrong.");
                        $("#submitButton").attr("disable", false);
                        refreshCapthca('captcha_img_id', 'captcha');
                    }
                },
                failure: function(response) {
                    errorMessage(response.message ?? "Something went wrong.");
                    $("#submitButton").attr("disable", false);
                    refreshCapthca('captcha_img_id', 'captcha');
                },
                error: function(response) {
                    errorMessage(response.message ?? "Something went wrong.");
                    $("#submitButton").attr("disable", false);
                    refreshCapthca('captcha_img_id', 'captcha');
                }
            });
        });
        var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
            separateDialCode: true,
            preferredCountries: ["in"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });
    </script>
@endsection
