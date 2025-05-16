<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
{{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}

<a class="footer-whatsapp" aria-label="Whatsapp Button" href="https://wa.me/+91{!! strip_tags($whatsapp_footer_link) ?? '7088017026' !!}?text=Hello%2C%20I%E2%80%99m%20interested%20in%20booking%20a%20room%20at%20your%20resort.%20Could%20you%20please%20call%20me%20back%20to%20discuss%20availability%20and%20pricing%3F">
    <img src="{{ asset('assets/img/whatsapp.png') }}" alt="Whatsapp" class="img-fluid" height="" width="150">
</a>



<a class="footer-whatsapp footer-call" aria-label="Phone Call Button" href="tel:+91{{ isset($phone_footer_link) ? str_replace(' ', '', strip_tags($phone_footer_link)) : '7088017026' }}">
    <img src="{{ asset('assets/img/phone-call.png') }}" alt="Phone Call" class="img-fluid" height="" width="150">
</a>
<a class="book-btn book-btn-footer" href="https://www.swiftbook.io/inst/#home?propertyId=903NTQf4ixW2CSCrUccVOYsxMx3puXvRmp3uQnO827r79SK7KgB3NTE=&JDRN=Y">Book Now</a>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset("dashboard/assets/js/website.js")}}"></script>
<script>window.gtranslateSettings = {"default_language":"en","languages":["en","hi","de","es","fr"],"wrapper_selector":".gtranslate_wrapper","flag_size":16,"flag_style":"3d"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/fn.js" defer></script>
<script>
function successMessage(success_message,reload=false){
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: success_message
  }).then(function(){
      if (reload) {
      window.location.reload();
    }
  });
}
function errorMessage(error_message){
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: error_message
  });
}
$(function() {
    $(window).on('scroll', function () {
		if ($(window).scrollTop() > 150) {
			$('.main-header').addClass('fixed-header');
		} else {
			$('.main-header').removeClass('fixed-header');
		}
	});
});
var togglemenu = document.querySelector('.mobile-bars');
togglemenu.addEventListener("click", function(){
	document.body.classList.toggle('open-menu');
})
var swiper = new Swiper(".main-slider", {
  spaceBetween: 30,
  effect: "fade",
  loop: true,
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".hotels", {
    spaceBetween: 10,
    loop: true,
    autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    380: {slidesPerView: 2},
    640: {slidesPerView: 3},
    768: {slidesPerView: 6},
    1024: {slidesPerView: 6},
  }
});
var swiper = new Swiper(".service-gallery", {
  spaceBetween: 15,
  freeMode: true,
  cssMode: true,
  // effect: "fade",
  loop: true,
  autoplay: {delay: 2500,disableOnInteraction: false},
  navigation: {nextEl: ".swiper-button-next",prevEl: ".swiper-button-prev",},
  pagination: {el: ".swiper-pagination",clickable: true,},
  breakpoints: {
    480: {slidesPerView: 1,},
    640: {slidesPerView: 2,},
    768: {slidesPerView: 3,},
    1024: {slidesPerView: 4,},
  },
});
var swiper = new Swiper(".recognition-slider", {
  spaceBetween: 25,
  freeMode: true,
  cssMode: true,
  loop: true,
  autoplay: {delay: 2500,disableOnInteraction: false},
  navigation: {nextEl: ".swiper-button-next",prevEl: ".swiper-button-prev",},
  pagination: {el: ".swiper-pagination",clickable: true,},
  breakpoints: {
    480: {slidesPerView: 2,},
    640: {slidesPerView: 3,},
    768: {slidesPerView: 4,},
    1024: {slidesPerView: 5,},
  },
});
// var swiper = new Swiper(".blog-section", {
//   spaceBetween: 25,
//   freeMode: true,
//   cssMode: true,
//   loop: true,
//   autoplay: {delay: 2500,disableOnInteraction: false},
//   navigation: {nextEl: ".swiper-button-next",prevEl: ".swiper-button-prev",},
//   pagination: {el: ".swiper-pagination",clickable: true,},
//   breakpoints: {
//     480: {slidesPerView: 2,},
//     640: {slidesPerView: 3,},
//     768: {slidesPerView: 3,},
//     1024: {slidesPerView: 4,},
//   },
// });
var swiper = new Swiper(".we-offer", {
    spaceBetween: 30,
    loop: true,
    autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {el: ".swiper-pagination",clickable: true,},
  breakpoints: {
    480: {slidesPerView: 1,spaceBetween: 10,},
    640: {slidesPerView: 2,spaceBetween: 15,},
    768: {slidesPerView: 3,spaceBetween: 20,},
    1024: {slidesPerView: 3,spaceBetween: 25,},
  },
});
var swiper = new Swiper(".offer-package", {
    spaceBetween: 30,
    loop: true,
    autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {el: ".swiper-pagination",clickable: true,},
  breakpoints: {
    480: {slidesPerView: 1,},
    768: {slidesPerView: 2,},
    1024: {slidesPerView: 3,},
  },
});
var swiper = new Swiper(".blog-section", {
  // slidesPerView: 3,
  spaceBetween: 30,
  navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
  breakpoints: {
    480: {slidesPerView: 1,},
    768: {slidesPerView: 3,},
    1024: {slidesPerView: 4,},
  },
});
var swiper = new Swiper(".testimonials", {
  spaceBetween: 20,
  dynamicBullets: true,
  loop: true,
  centeredSlides: true,
  autoplay: {delay: 2500,disableOnInteraction: false,},
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {el: ".swiper-pagination",clickable: true,},
  breakpoints: {
    480: {slidesPerView: 1,},
    640: {slidesPerView: 2,},
    768: {slidesPerView: 3,},
    1024: {slidesPerView: 3,},
  },
});
var swiper = new Swiper(".guest_review", {
  spaceBetween: 20,
  dynamicBullets: true,
  // loop: true,
  // centeredSlides: true,
  autoplay: {delay: 2500,disableOnInteraction: false,},
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {el: ".swiper-pagination",clickable: true,},
  breakpoints: {
    480: {slidesPerView: 1,},
    640: {slidesPerView: 1,},
    768: {slidesPerView: 2,},
    1024: {slidesPerView: 2,},
  },
});
</script>
<script>
    $(document).ready(function() {
        $(".banner-form").on("submit", function(e) {
            e.preventDefault();

            var form = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('saveEnquiryQuoteDetails') }}', // Ensure this route points to your controller
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Optionally clear the form
                        $(".banner-form")[0].reset();

                        // Reload after 5 seconds (optional)
                        setTimeout(function() {
                            window.location.reload();
                        }, 5000);
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    console.error('AJAX Error:', status, error);
                }
            });
        });
    });
</script>
