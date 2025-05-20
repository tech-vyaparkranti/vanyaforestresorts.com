@extends('layouts.webSite')
@section('title', 'jim-corbett-holi-packages')
@section('meta_description', 'Discover exclusive offers and packages at Trinantara Resort & Spa, Vanya Resort. From
    romantic getaways to family vacations, enjoy luxury stays, exciting activities, and incredible deals tailored just for
you.')
@section('meta_keywords', 'Destination Wedding in Vanya Resort, adventure activities in Vanya Resort, Holiday packages jim
Corbett, Family Stay in Vanya Resort, Best Resort in Vanya Resort, 5 star resort in Vanya Resort')
@section('content')

    <div id="about">


    <div class="image-containeroned">
    <img id="celebrationImage" class="celebration-image" src="./assets/img/banner for holi (1).jpg" alt="Holi Celebration">
</div>

        <div class="default-content service-page pt-4 pb-3">

            <div class="destinations pb-2 pt-2 mb-4">
                <div class="custom-container">
                    <div class="containerss">
                        <div class="image-section">
                            <img id="mainImage" class="main-image" src="./assets/img/t1.jpeg" alt="Holi Celebration">
                            <div class="thumbnail-slider">
                                <img src="./assets/img/cottageroom.jpg" alt="" onclick="changeImage('./assets/img/cottageroom.jpg')">
                                <img src="./assets/img/cottageroom1.jpg" alt="" onclick="changeImage('./assets/img/cottageroom1.jpg')">
                                <img src="./assets/img/premiumroom.jpg" alt="" onclick="changeImage('./assets/img/premiumroom.jpg')">
                                <img src="./assets/img/premiumroom2.jpg" alt="" onclick="changeImage('./assets/img/premiumroom2.jpg')">
                                <img src="./assets/img/pool4.jpg" alt="" onclick="changeImage('./assets/img/pool4.jpg')">
                                <img src="./assets/img/plungpool.jpg" alt="" onclick="changeImage('./assets/img/plungpool.jpg')">
                                <img src="./assets/img/hotel-room-service.jpg" alt="" onclick="changeImage('./assets/img/hotel-room-service.jpg')">
                                <img src="./assets/img/dining.jpg" alt="" onclick="changeImage('./assets/img/dining.jpg')">
                                <img src="./assets/img/dining1.jpg" alt="" onclick="changeImage('./assets/img/dining1.jpg')">
                                <img src="./assets/img/restaurant.jpg" alt="" onclick="changeImage('./assets/img/restaurant.jpg')">
                                <img src="./assets/img/t3.jpg" alt="" onclick="changeImage('./assets/img/t3.jpg')">
                                <img src="./assets/img/pool1.jpg" alt="" onclick="changeImage('./assets/img/pool1.jpg')">

                            </div>
                        </div>
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
                    </div>
                    <div class="text-content mt-5 ">
                    <h5 class="text-justify mb-3">Celebrate Holi in Vanya Resort at VanyaForestResort & Sport – Holi Party 2025!</h5>
                    <p class="text-justify">Experience the vibrant festival of colors like never before at  VanyaForestResort & Sport in the heart of Vanya Resort. Celebrate Holi 2025 with us and immerse yourself in a unique blend of tradition, adventure, and luxury. Our exclusive Holi Packages 2025 are designed to make your festival unforgettable, offering a perfect mix of fun, relaxation, and excitement.</p>
                    <p class="text-justify">Join our Holi Party 2025 and groove to electrifying music, enjoy delicious traditional delicacies, and play with organic colors in a safe and eco-friendly environment. Surrounded by the serene beauty of Vanya Resort, our resort provides the ideal backdrop for a joyful celebration with family and friends.</p>
                    <p class="text-justify">Our Holi packages include luxurious accommodations, festive meals, and exciting activities like nature walks, bonfires, and more. Whether you're looking to unwind in our spacious rooms or indulge in adventure sports, Trinantara Resort & Sport has something for everyone.</p>
                    <p class="text-justify">Don’t miss the chance to celebrate Holi in the lap of nature at one of the best resorts in Vanya Resort. Book your Holi Party 2025 package now and create memories that will last a lifetime!</p>

                    </div>
                    <div class="inclusion-main">
                    <div class="inclusion mb-5">
                        <h5>Inclusions :</h5>
                        <li> Welcome Drink on arrival (Non Alcoholic)</li>
                        <li>Herbal Holi Color packets </li>
                        <li>02 Mineral Water Bottles in the room, replenished daily</li>
                        <li>Tea coffee maker in room with Supplies</li>
                        <li>Accommodation in well appointed rooms as per the package</li>
                        <li>All meals throughout the stay (02 Breakfasts, 02 Lunches, 02 Dinners)</li>
                        <li>Live Music on both the evenings</li>
                        <li>Theme Holi Celebrations with DJ and Rain Dance</li>
                        <li>Unlimited Snacks (1 Veg, 1 Non- Veg), Live Chaat & Thandai Counter during Holi Celebrations</li>
                        <li>Unlimited Soda, Soft Drinks during the Holi Celebrations</li>
                        <li>Complimentary use of the pool throughout the stay</li>
                        <li>Complimentary usage of recreational facilities like Cricket, Badminton, Volleyball etc.</li>
                        <li>Complimentary Nature Walk in the morning</li>
                        <li>All Applicable taxes</li>
                    </div>
                    <div class="inclusion-two">
                        <h5>Packges :</h5>
                        <li>Premium Rooms</li>
                        <li>Cottage Rooms</li>
                        <li>Plung Poll Suites</li>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media(min-width:768px){
            .inclusion-main {
                display: flex;
            }
        }
        @media(max-width:768px){
            .celebration-image {

    height: 200px;
    object-fit: cover;
}
        }
        .inclusion-main {
            /* display: flex; */
            grid-gap:40px;
            justify-content: space-around;
        }
        .inclusion-two{
            background-color: whitesmoke;
            border-radius: 10px;
            border:1px solid rgb(var(--yellow-color));
            padding: 20px 10px 10px 30px;
            width:300px;
            height:200px;
        }
        .banner-form-container {
            /* position: absolute; */
            /* top: 240px; */
            /* left: 10%; */
            transform: translateY(4%);
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 410px;
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
                /* position: absolute; */
                top: 400px !important;
                /* right: 5% !important; */
                /* left: 5% !important; */
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
    <style>
        @media(min-width:767px){
        .containerss {
            display: flex;
            grid-gap:40px;
        }
        .image-section {
            width: 66%;
        }

    }

        .banner {
            background: url('banner.jpg') no-repeat center;
            background-size: cover;
            padding: 50px;
            color: white;
            font-size: 36px;
            font-weight: bold;
        }


        .main-image {
            width: 100%;
            height: auto;
            max-height: 400px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .thumbnail-slider {
            display: flex;
            overflow-x: auto;
            gap: 10px;
            margin-top: 10px;
            padding: 10px;
        }

        .thumbnail-slider img {
            width: 80px;
            height: 80px;
            cursor: pointer;
            border: 2px solid #ff4500;
            border-radius: 5px;
            object-fit: cover;
        }

        .form-section {
            width: 30%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .form-section h2 {
            color: #ff4500;
        }

        .form-section input,
        .form-section textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-section button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: linear-gradient(90deg, #ff4500, #ff1493);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <style>
    .image-containeroned {
        position: relative;
        display: inline-block;
    }
    .celebration-image {
        width: 100%;
        display: block;
    }
    .color-animation, .cursor-effect {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(255, 0, 0, 0.8);
        border-radius: 50%;
        opacity: 0;
        animation: splash 1.5s ease-out;
        pointer-events: none;
    }
    @keyframes splash {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(5); opacity: 0; }
    }
</style>
    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>
    <script>
    function createColorSplash(x, y) {
        const colors = ['#ff4500', '#ff1493', '#00ff00', '#00ced1', '#ff0', '#800080'];
        const splash = document.createElement('div');
        splash.classList.add('color-animation');
        splash.style.background = colors[Math.floor(Math.random() * colors.length)];
        splash.style.left = x + 'px';
        splash.style.top = y + 'px';
        document.body.appendChild(splash);
        setTimeout(() => splash.remove(), 1500);
    }

    function createCursorEffect(e) {
        const colors = ['#ff4500', '#ff1493', '#00ff00', '#00ced1', '#ff0', '#800080'];
        const effect = document.createElement('div');
        effect.classList.add('cursor-effect');
        effect.style.background = colors[Math.floor(Math.random() * colors.length)];
        effect.style.left = e.pageX + 'px';
        effect.style.top = e.pageY + 'px';
        document.body.appendChild(effect);
        setTimeout(() => effect.remove(), 1000);
    }

    document.addEventListener('mousemove', (e) => {
        createCursorEffect(e);
    });

    setInterval(() => {
        const img = document.querySelector('.celebration-image');
        const rect = img.getBoundingClientRect();
        const x = Math.random() * rect.width + rect.left;
        const y = Math.random() * rect.height + rect.top;
        createColorSplash(x, y);
    }, 300);
</script>

@endsection
