<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyNowController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DestinationController;
//use Illuminate\Foundation\Application;
use App\Http\Controllers\EnquiryFormController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\OurServicesModelController;
use App\Http\Controllers\EnquiryQuoteController;
use App\Http\Controllers\WeddingEnquiryController;
use App\Http\Controllers\WeddingEventFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get("/",[HomePageController::class,"homePage"]);
Route::get("/",[HomePageController::class,"homePage"]);
// Route::get("comingsoon",[HomePageController::class,function(){
//     return view("HomePage.ComingSoon");
// }]);
Route::get("comingsoon",[HomePageController::class,"ComingSoon"])->name("ComingSoon");
Route::get("about-us",[HomePageController::class,"aboutUs"])->name("aboutUs");
Route::get("hotel",[HomePageController::class,"hotel"])->name("hotel");
Route::get("terms-conditions",[HomePageController::class,"termsConditions"])->name("termsConditions");
Route::get("shipping-delivery-policy",[HomePageController::class,"shippingDeliverypolicy"])->name("shippingDeliverypolicy");
Route::get("cancellation-refund-policy",[HomePageController::class,"CancellationRefundPolicy"])->name("CancellationRefundPolicy");
Route::get("privacy-policy",[HomePageController::class,"privacyPolicy"])->name("privacyPolicy");
Route::get("destinations",[HomePageController::class,"destinations"])->name("destinations");
Route::get("gallery",[HomePageController::class,"galleryPages"])->name("galleryPages");
Route::get("contact-us",[HomePageController::class,"contactUs"])->name("contactUs");
Route::get("wedding-booking",[HomePageController::class,"weddingEnquiry"])->name("weddingEnquiry");
Route::get("rooms-suites",[HomePageController::class,"rooms"])->name("rooms");
Route::get("amenities",[HomePageController::class,"amenities"])->name("amenities");
Route::get("blogs",[HomePageController::class,"blog"])->name("blog");
Route::get("blog/{slug}",[HomePageController::class,"blogDetail"])->name("blogDetail");
Route::get("events-weddings",[HomePageController::class,"eventsweddings"])->name("eventsweddings");
Route::get("offers-packages",[HomePageController::class,"offerspackages"])->name("offerspackages");
Route::get("offers-detail",[HomePageController::class,"offersdetail"])->name("offersdetail");
Route::get("career",[HomePageController::class,"career"])->name("career");
Route::get("restaurants",[HomePageController::class,"restaurants"])->name("restaurants");
Route::get("banquet-halls",[HomePageController::class,"banquetHall"])->name("banquetHall");
Route::get("other-services",[HomePageController::class,"otherServices"])->name("otherServices");
Route::get("get-home-page-dd",[DestinationController::class,"getHomePageDestinations"])->name("getHomePageDestinations");
Route::get("get-home-page-services",[OurServicesModelController::class,"getHomePageServices"])->name("getHomePageServices");
Route::post("contact-us-form",[ContactUsController::class,"saveContactUsDetails"])->name("saveContactUsDetails");
Route::post('wedding-enquiry', [WeddingEnquiryController::class, 'store'])->name('saveWeddingEnquiry');
Route::get('refresh-captcha',[HomePageController::class,"refreshCapthca"])->name("refreshCaptcha");
// Route::get("get-testimonials-home-page", [TestimonialsController::class, "getHomePageTestimonials"])->name("getHomePageTestimonials");
Route::post('enquiry-form',[ApplyNowController::class,"enquiryDetails"])->name("saveEnquiryFormData");
Route::get("jim-corbett-holi-packages",[HomePageController::class,"holipackage"])->name("holipackage");


Route::post('enquiry-form-details',[EnquiryFormController::class,"enquiryFormDetails"])->name("saveHotelEnquiryFormData");
Route::fallback(function(){
    return redirect('/');
});
Route::post('save-enquiry-quote-details', [EnquiryQuoteController::class, 'saveEnquiryQuoteDetails'])->name('saveEnquiryQuoteDetails');
// require __DIR__.'/auth.php';
Route::get('/wedding-event-form', [WeddingEventFormController::class, 'showForm'])->name('weddingeventform.form');
Route::post('/wedding-event-form', [WeddingEventFormController::class, 'store'])->name('weddingeventform.store');
include_once "adminRoutes.php";
