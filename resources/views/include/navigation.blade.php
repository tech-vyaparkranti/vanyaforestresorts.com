<!-- Header section Start -->
<header class="main-header">
    <div class="header-contaner">
        <div class="logo-section">
            <a href="{{ url('/') }}" aria-level="Main logo"><img src="{{ asset($Logo ?? './assets/img/logo.png') }}" class="img-fluid"  alt="Trinantararesort"></a>
        </div>
        {{-- <div class="contact-list">
            <ul class="contact-container">
                <li class="contact-items">
                    <a href="{{ route('contactUs') }}"><i class="fa-solid fa-location-dot"></i>
                        <span>Location</span>
                        <p>{!! $location ?? 'Kachari Chowk, MG Road, Bhagalpur India' !!}</p>
                    </a>
                </li>
                <li class="contact-items">
                    <a href="tel:+91{{ isset($contact_us_contact_number)?str_replace(" ","",$contact_us_contact_number):"9308189201" }}"><i class="fa-solid fa-phone"></i><span>Phone</span><p>+91 {{ $contact_us_contact_number??"930 818 9201" }}</p></a>
                    <p><a href="tel:+916412409411">+91 641 240 9411</a><a href="tel:+916412409412">&nbsp;/12</a><a href="tel:+916412409413">/13</a><a href="tel:+916412409414">/14</a><a href="tel:+916412409415">/15</a></p>
                    {{-- <a href="tel:+916412409411"><p>+91 641 240 9411/12/13</p></a> --}}

                {{-- </li>
                <li class="contact-items">
                    <a href="mailto:{!! $contact_us_email??"sales1@trinantararesort.com" !!}"><i class="fa-solid fa-envelope"></i><span>E-mail</span><p>{!! $contact_us_email??"sales1@trinantararesort.com" !!}</p></a>
                </li>
            </ul>
        </div> --}}
        <div class="main-text-navigation">
            <p><a href="tel:+91{{ isset($contact_us_contact_number)?str_replace(" ","",$contact_us_contact_number):"9068445788" }}" class="blink_me">{{ $contact_us_contact_number??"9068445788" }}</a></p>
        </div>
        <div class="mobile-bars"><span></span></div>

        <div class="slide-navigation">
            <div class="navbar-wrapper">
                <ul class="navbar-block">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                    <li><a href="{{ route('rooms')}}">Rooms & Suites</a></li>
                    <li><a href="{{ route('amenities')}}">Amenities & Acitivities</a></li>

                    <li><a href="{{ route('eventsweddings')}}">Events</a></li>
                    <li><a href="{{ route('offerspackages') }}">Offers & PAckages</a></li>

                    {{-- <li><a href="{{ route('otherServices') }}">Our Services</a></li> --}}
                    <li><a href="{{ route('galleryPages') }}">Gallery</a></li>
                    <li><a href="{{ route('blog')}}">Blog</a></li>
                    <li><a href="{{ route('contactUs') }}">Contact Us</a></li>

                </ul>
            </div>
        </div>
        <div class="book-now">
            <button id="book-now-btn">Book Now</button>
        </div>

        <script>
            document.getElementById('book-now-btn').addEventListener('click', function() {
                // Redirect to the booking page in a new tab
                window.open("https://www.swiftbook.io/inst/#home?propertyId=903NTQf4ixW2CSCrUccVOYsxMx3puXvRmp3uQnO827r79SK7KgB3NTE=&JDRN=Y", "_blank");
            });
        </script>
    </div>
</header>
<!-- Header section end -->
<style>
    /* Navigation bar dropdown */
    .sublist {visibility: hidden;opacity: 0;position: absolute;z-index: 1;background-color: #fff;width: 200px;box-shadow: var(--box-shadow);border-radius: 4px;top: 130%;transition: var(--transition);}
    ul.sublist.active-list {visibility: visible;opacity: 1;}
    .header-contaner ul.sublist li {display: block;padding: 0px 0px;position: relative;margin: auto 0;}
    ul.sublist ul.sublist {left: 100%;top: 0;margin: 0 0;}
    .sublist li.dropdown-list:after,li.dropdown-list:after {content: '\f107';font-family: 'FontAwesome';transition: var(--transition);}
    .sublist li.dropdown-list:after {position: absolute;right: 10px;top: 8px;}
    .sublist li.dropdown-list:hover:after{transform: rotate(-90deg);}
    li.dropdown-list:hover:after{transform: rotate(-90deg);}
    .header-contaner ul.sublist li a {
        display: flex;
        padding: 2px 15px 2px 10px;
        margin: 0 0;
        height: auto;
        line-height: normal;
        border-top: 1px solid lightgray;
        min-height: 40px;
        align-items: center;
    }
    .header-contaner ul.sublist li a:hover {background-color: rgb(var(--gold-bg));}
    .book-now button{padding: 7px 15px 9px 15px;background: rgb(var(--yellow-color));border:rgb(var(--yellow-color));border-radius:3px;color:rgb(var(--white-color));margin-left: 35px;}
    .blink_me {
    /* animation: blinker 1s linear infinite; */
    background: rgb(var(--yellow-color));
    color: white !important;
    padding: 6px;
    /* animation: blinker 1s linear infinite; */
    border-radius: 6px;
}
/* .book-now button:hover{
    background-color: rgb(var(--blue-color));
} */
@keyframes blinker {50% {font-weight: 700;transform: scale(1.03);color: rgb(var(--yellow-color));}}
.main-text-navigation p  {display: inline-block;text-align: center;margin-top: 20px;color: #333;font-size: 20px;line-height: 40px;min-width: 127px;margin-left: 13px;margin-right: 13px;}
.main-text-navigation a{text-decoration: none;color:rgb(var(--yellow-color));}
    @media (max-width: 768px){

        i.drop-plus {display: block !important;position: absolute;right: 10px;top: 10px;height: 25px;width: 25px;text-align: center;line-height: 20px;color: #fff;font-weight: 700;font-size: 28px;padding: 0px 0;background-color: rgb(var(--green-color));}
        .sublist {position: relative;display: none;width: 100%;top: 100%;margin: 10px 0 0 !important;transition: var(--transition);}
        ul.sublist ul.sublist{left: 0 !important;margin: 0 0 !important}
        .sublist li.dropdown-list:after{display: none;}
        ul.sublist.active {display: block;opacity: 1;visibility: visible;}
    }
    @media (min-width: 768px){

        li.dropdown-list:hover > ul.sublist, li.dropdown-list:hover ul.sublist > ul.sublist , ul.sublist.active-list {visibility: visible;opacity: 1;}
    }
    @media (max-width:1024px){.book-now button {
    padding: 5px 9px 5px 9px;
    width: 93px !important;
}}
    /* Navigation bar dropdown End */
    </style>
    <script>
    // Navigation bar dropdown
    document.addEventListener('DOMContentLoaded', () => {
        // Code here runs after DOM content is fully loaded
        const dropdowns = document.querySelectorAll('.dropdown-list');
        dropdowns.forEach(dropdown => {
            const toggleBtn = dropdown.querySelector('.drop-plus');
            const sublist = dropdown.querySelector('.sublist');
            dropdown.addEventListener("mouseover", (event) => {
                const isDropdown = event.currentTarget === event.target;
                if (isDropdown) {
                    sublist.classList.add('active-list');
                }
            });
            dropdown.addEventListener("mouseleave", () => {
                sublist.classList.remove('active-list');
            });
            if (toggleBtn && sublist) {
                toggleBtn.addEventListener('click', (event) => {
                    sublist.classList.toggle('active');
                    toggleBtn.textContent = sublist.classList.contains('active') ? '-' : '+';
                    event.stopPropagation(); // Prevent event from bubbling up
                });
            } else {
                console.error('Toggle button or sublist not found in dropdown:', dropdown);
            }
            // Close dropdown when clicking outside
            document.addEventListener('click', () => {
                if (sublist) {
                    sublist.classList.remove('active');
                    toggleBtn.textContent = '+';
                }
            });
            // Prevent closing dropdown when clicking inside
            dropdown.addEventListener('click', (event) => {
                event.stopPropagation();
            });
        });
    });
    // Navigation bar dropdown End

    </script>
    <style>
        .book-now a{
            color:white;
        }
    </style>
