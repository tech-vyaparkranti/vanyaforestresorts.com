@extends('layouts.webSite')
@section('title', 'Terms & Conditions')
@section('content')
<div class="information-page-slider">
    <div class="information-content">
        <ul class="m-auto list-unstyled custom-container">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Terms and Conditions</a></li>
        </ul>
    </div>
</div>
    <div id="about">
        <div class="default-content pt-5 pb-3">
            <div class="custom-container">
                <div class="site-title pb-3">
                    <h2 class="site-title text-center">Terms & Conditions</h2>
                </div>
                <div class="midd-content">
                    <p class="text-justify">
                        Welcome to Trinantara Resort & Spa. By accessing and using our website
                        <span class="clickable-link">https://www.trinantararesorts.com</span>,
                        you agree to comply with the following terms and conditions. Please read them carefully before making any bookings or using our services.
                    </p>
                    <ol class="terms-list">
                        <li class="text-justify">
                            <h5>General Terms</h5>
                            <ul class="custom-bullets">
                                <li class="text-justify" >The content of this website is for general information and use only. It is subject to change without notice.</li>
                                <li class="text-justify">Trinantara Resort & Spa reserves the right to update, modify, or amend these Terms and Conditions at any time without prior notification.</li>
                            </ul>
                        </li>
<br>
                    <li><h5>Booking Policy</h5>
                        <ul class="custom-bullets">
                            <li class="text-justify" ><b>Reservation Confirmation:</b> Reservations are confirmed only upon receipt of full or partial payment, as per the terms of your booking.</li>
                            <li class="text-justify"><b>Booking Amendments:</b> Any changes to your reservation must be communicated in writing and are subject to availability. Changes may additional charges depending on room availability and the nature of the change.</li>
                            <li class="text-justify"><b>Age Policy:</b> Guests under the age of 18 must be accompanied by a parent or legal guardian.</li>
                        </ul>
                    </li>
                    <br>
                    <li><h5>Cancellation and Refund Policy</h5>
                        <ul class="custom-bullets" style="list-style-type: none; padding-left: 0;">
                            <li class="text-justify" style="font-size: 16px;">
                                <strong>Cancellation Terms:</strong>
                                <ul style="list-style-type: none; padding-left: 20px; margin-left: 0;">
                                    <li class="text-justify">30 Days or more prior to check-in Date: Full refund minus processing fees.</li>
                                    <li class="text-justify">15 days to 30 days prior to check-in: 50% refund of the total booking amount.</li>
                                    <li class="text-justify">7–14 days prior to check-in: 25% refund of the total booking amount.</li>
                                    <li class="text-justify">Less than 7 days prior to check-in: No refund.</li>
                                </ul>
                            </li>
                            <li class="text-justify"><strong>No-Show Policy:</strong> No refunds will be provided in the event of a no-show.</li>
                            <li class="text-justify"><strong>Refund Processing:</strong> Refunds will be processed within 7–15 working days after cancellation confirmation.</li>
                        </ul>
<br>
                        <li><h5>Check-In and Check-Out Policy</h5>
                            <ul class="custom-bullets">
                                <li class="text-justify"><strong>Check-In Time:</strong> 1:00 PM</li>
                                <li class="text-justify"><strong>Check-Out Time:</strong> 10:00 AM</li>
                                <li class="text-justify">Early check-in and late check-out requests are subject to availability and may incur additional charges.</li>
                            </ul>
                        </li>
                        <br>
                    <li><h5>Payment Terms</h5>
                        <ul class="custom-bullets">
                            <li class="text-justify">Payments can be made via credit/debit cards, online transfers, or other accepted methods listed on our website.</li>
                            <li class="text-justify">Full payment must be made before check-in unless specified otherwise.</li>
                        </ul>
<br>
                        <li><h5>Use of Facilities</h5>
                            <ul class="custom-bullets">
                                <li class="text-justify">Guests are expected to use resort facilities responsibly and maintain cleanliness and decorum.</li>
                                <li class="text-justify">Any damage to property caused by the guest or their party will be charged to the guest.</li>
                            </ul>
<br>
                            <li><h5>Dining Hours at Trinantara Resort & Spa</h5>
                                <ul class="custom-bullets">
                                    <li class="text-justify"><b>Breakfast:</b> 8:00 AM – 10:30 AM | <b>Lunch:</b> 1:00 PM – 3:00 PM | <b>Dinner:</b> 8:00 PM – 10:30 PM</li>
                                    <li class="text-justify">Savor delicious meals at our restaurant during these hours. Kindly adhere to the timings for a seamless dining experience.</li>
                                </ul>
<br>
                            <li><h5>Liability Disclaimer</h5>
                                <ul class="custom-bullets">
                                    <li class="text-justify">While every effort is made to ensure the safety and comfort of guests, Trinantara Resort & Spa will not be liable for:</li>
                                    <ul style="list-style-type: none; padding-left: 20px; margin-left: 0;">
                                        <li class="text-justify">Any personal injuries, loss, or damage to personal property during the stay.</li>
                                        <li class="text-justify">Delays or disruptions due to natural disasters, strikes, or unforeseen circumstances.</li>
                                    </ul>
                                    <li class="text-justify">Guests are advised to take personal travel insurance for added protection.</li>
                                </ul>
<br>
                                <li><h5>Prohibited Activities</h5>
                                    <ul class="custom-bullets">
                                        <li class="text-justify">Smoking and alcohol consumption are only permitted in designated areas.</li>
                                        <li class="text-justify">Illegal activities, including drug use or any other behavior that violates local laws, are strictly prohibited.</li>
                                    </ul>
<br>
                                    <li><h5>Privacy Policy</h5>
                                        <ul class="custom-bullets">
                                            <li class="text-justify">Trinantara Resort & Spa respects your privacy and is committed to protecting your personal data.</li>
                                            <li class="text-justify">For details on how we collect, use, and safeguard your information, please refer to our <span class="clickable-links">Privacy Pilicy</span>,</li>
                                        </ul>
<br>
<li><h5>Dispute Resolution</h5>
    <ul class="custom-bullets">
        <li class="text-justify">Any disputes arising from the use of this website or resort services will be governed by the laws of India.</li>
        <li class="text-justify">Jurisdiction for legal matters will be exclusively held in the courts of Uttarakhand.</li>
    </ul>
<br>

    <li><h5>Contact Us</h5>
        <p class="text-justify">If you have any questions or concerns regarding these Terms and Conditions, please contact us at:<br><b>Trinantara Resort & Spa</b></p>
            <p class="text-justify"><span class="clickable-text" id="email">Email: sales1@trinantararesorts.com</span><br>
                <span class="clickable-text" id="phone">Phone: +91 708 801 7026</span><br><span class="clickable-link">https://www.trinantararesorts.com</span>,</p>

                    </ol>

                </div>
            </div>
        </div>
    </div>
    <style>
       .text-justify {
    text-align: justify;
}

.terms-list {
    padding-left: 1rem !important;
}        .clickable-link {
    /* color: blue; */
    text-decoration: underline;
    cursor: pointer;
}

.custom-bullets {
    list-style-type: none; /* Remove default bullets */
    padding-left: 0; /* Remove left padding */
    font-size: 18px; /* Increase the font size for the text */
}

.custom-bullets li {
    position: relative; /* Allows positioning of the custom bullet */
    padding-left: 30px; /* Space for custom bullet */
    font-size: 18px; /* Increase font size for the list item text */
}

.custom-bullets li::before {
    content: '\2022'; /* Unicode for bullet */
    font-size: 30px; /* Increase the size of the bullet */
    color: black; /* Color of the bullet */
    position: absolute;
    left: 0; /* Position the bullet at the start of the list item */
    top: -10px;
}

.clickable-text {
        color: black; /* Normal text color */
        text-decoration: underline; /* Underline to indicate it's clickable */
        cursor: pointer; /* Change cursor to pointer when hovered */
    }

    .clickable-text:hover {
        color: darkblue; /* Change color on hover */
    }

.clickable-link:hover {
    color: darkblue;
}

.clickable-links:hover {
    color: darkblue;
}
    </style>
    <script>
        document.querySelector('.clickable-link').addEventListener('click', function() {
    window.open('https://www.trinantararesorts.com/', '_blank');
});

document.querySelector('.clickable-links').addEventListener('click', function() {
    window.open('https://www.trinantararesorts.com/privacy-policy', '_blank');
});

document.getElementById('email').addEventListener('click', function() {
        window.location.href = 'mailto:sales1@trinanatararesorts.com';
    });

    // Phone Link
    document.getElementById('phone').addEventListener('click', function() {
        window.location.href = 'tel:+917088017026';
    });
    </script>
@endsection
