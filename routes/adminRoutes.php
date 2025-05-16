<?php

use App\Http\Controllers\OurGuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomeFaqController;
use App\Http\Controllers\ApplyNowController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OurOffersController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\BanquetHallController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EnquiryFormController;
use App\Http\Controllers\OtherEventsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AboutGalleryController;
use App\Http\Controllers\HomeServicesController;
use App\Http\Controllers\IndoorEventsController;
use App\Http\Controllers\OfferPackageController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\ThemedEventsController;
use App\Http\Controllers\OutdoorEventsController;
use App\Http\Controllers\SeasonalEventsController;
use App\Http\Controllers\CorporateEventsController;
use App\Http\Controllers\IceCreamParlourController;
use App\Http\Controllers\WebSiteElementsController;
use App\Http\Controllers\HomeRecognitionsController;
use App\Http\Controllers\OurServicesModelController;
use App\Http\Controllers\RecreationalActivitiesController;
use App\Http\Controllers\WeddingAndSocialEventsController;
use App\Http\Controllers\EnquiryQuoteController;
use App\Http\Controllers\WeddingEnquiryController;
use App\Http\Controllers\WeddingEventFormController;

    Route::get("login",[AdminController::class,"Login"])->name("login");
    Route::post("AdminUserLogin",[AdminController::class,"AdminLoginUser"])->name("AdminLogin");
    Route::get("getmenu-items",[HomePageController::class,"getMenu"]);
//pages

    Route::middleware(['auth'])->group(function () {
    Route::get("/new-dashboard",[AdminController::class,"dashboard"])->name("new-dashboard");
    
    // Route::get("site-navigation",[AdminController::class,"siteNav"])->name("siteNav");
    // Route::post("addEditNavigation",[AdminController::class,"addEditNavigation"])->name("addNaviagtion");
    // Route::post("deleteNavigation",[AdminController::class,"deleteNavigation"])->name("deleteNavigation");
    // Route::post("navDataTable",[AdminController::class,"navDataTable"])->name("navDataTable");

    Route::get("manage-gallery",[AdminController::class,"manageGallery"])->name("manageGallery");
    Route::post("addGalleryItems",[AdminController::class,"addGalleryItems"])->name("addGalleryItems");
    Route::post("addGalleryDataTable",[AdminController::class,"addGalleryDataTable"])->name("addGalleryDataTable");

    Route::get("add-destinations", [DestinationController::class, "destinationMaster"])->name("DestinationsMaster");
    Route::post("save-destinations", [DestinationController::class, "saveDestinations"])->name("saveDestinations");
    Route::post("destinations-data", [DestinationController::class, "destinationsData"])->name("DestinationsData");

    Route::get("our-services-master", [OurServicesModelController::class, "viewOurServicesMaster"])->name("viewOurServicesMaster");
    Route::post("save-our-services", [OurServicesModelController::class, "saveOurServicesMaster"])->name("saveOurServicesMaster");
    Route::post("our-services-data", [OurServicesModelController::class, "ourServicesData"])->name("ourServicesData");
    
    Route::get("mange-contact-us",[ContactUsController::class,"manageContactUs"])->name("manageContactUs");
    Route::post("contact-us-data",[ContactUsController::class,"contactUsData"])->name("ContactUsData");

    Route::get("manage-offers",[OurOffersController::class,"index"])->name("manage-offers.index");
    Route::post("save-offers",[OurOffersController::class,"store"])->name("manage-offers.store");
    Route::post("manage-offers-data",[OurOffersController::class,"manageOffersData"])->name("manageOffersData");

    Route::get('managefaq',[FaqController::class,'index'])->name('managefaq');
    Route::post('faqData',[FaqController::class,'GetAllData'])->name('faq.data');
    Route::post('faqsmaster',[FaqController::class,'SaveMaster'])->name('faq.save.master');
    Route::get('getfaqDataById',[FaqController::class,'dataById'])->name('faqDataBy.id');
    Route::get('deletefaq',[FaqController::class,'delete'])->name('faq.delete');

    Route::get("enquiry-admin-page", [ApplyNowController::class, "enquiryAdminPage"])->name("enquiryAdminPage");
    Route::post("enquiry-data-table", [ApplyNowController::class, "enquiryDataTable"])->name("enquiryDataTable");

       
    Route::get("add-web-site-elements", [WebSiteElementsController::class, "addWebSiteElements"])->name("webSiteElements");
    Route::post("save-web-site-element", [WebSiteElementsController::class, "saveWebSiteElement"])->name("saveWebSiteElement");
    Route::post("web-site-elements-data", [WebSiteElementsController::class, "getWebElementsData"])->name("webSiteElementsData");

    Route::get("slider-admin", [SliderController::class, "slider"])->name("Slider");
    Route::post("save-Slide", [SliderController::class, "saveSlide"])->name("saveSlide");
    Route::post("slider-data", [SliderController::class, "sliderData"])->name("sliderData");
        
    Route::get("home-amenities-admin", [HomeServicesController::class, "servicesSlider"])->name("servicesSlider");
    Route::post("home-amenities", [HomeServicesController::class, "servicesSaveSlide"])->name("servicesSaveSlide");
    Route::post("home-amenities-data", [HomeServicesController::class, "servicesData"])->name("servicesData");
        
    Route::get("testimonial-admin", [TestimonialController::class, "testimonialSlider"])->name("testimonialSlider");
    Route::post("testimonial-services", [TestimonialController::class, "testimonialSaveSlide"])->name("testimonialSaveSlide");
    Route::post("testimonial-data", [TestimonialController::class, "testimonialData"])->name("testimonialData");
            
    Route::get("home-recognitions-admin", [HomeRecognitionsController::class, "awardsSlider"])->name("awardsSlider");
    Route::post("home-recognitions-services", [HomeRecognitionsController::class, "awardsSaveSlide"])->name("awardsSaveSlide");
    Route::post("home-recognitions-data", [HomeRecognitionsController::class, "awardsData"])->name("awardsData");
   
    Route::get('manageHomeFaq',[HomeFaqController::class,'index'])->name('manageHomeFaq');
    Route::post('HomeFaqData',[HomeFaqController::class,'GetAllData'])->name('homeFaq.data');
    Route::post('HomeFaqsmaster',[HomeFaqController::class,'SaveMaster'])->name('homeFaq.save.master');
    Route::get('HomeFaqDataById',[HomeFaqController::class,'dataById'])->name('homeFaqDataBy.id');
    Route::get('HomeFaqdelete',[HomeFaqController::class,'delete'])->name('homeFaq.delete');
                
    Route::get("premium-admin", [RestaurantController::class, "restaurantSlider"])->name("restaurantSlider");
    Route::post("premium-services", [RestaurantController::class, "restaurantSaveSlide"])->name("restaurantSaveSlide");
    Route::post("premium-data", [RestaurantController::class, "restaurantData"])->name("restaurantData");

    Route::get("cottage-rooms-admin", [RoomsController::class, "roomsSlider"])->name("roomsSlider");
    Route::post("cottage-rooms-services", [RoomsController::class, "roomsSaveSlide"])->name("roomsSaveSlide");
    Route::post("cottage-rooms-data", [RoomsController::class, "roomsData"])->name("roomsData");

    Route::get("family-suite-admin", [BanquetHallController::class, "banquetHallSlider"])->name("banquetHallSlider");
    Route::post("family-suite-services", [BanquetHallController::class, "banquetHallSaveSlide"])->name("banquetHallSaveSlide");
    Route::post("family-suite-data", [BanquetHallController::class, "banquetHallData"])->name("banquetHallData");

    Route::get("plung-poll-admin", [IceCreamParlourController::class, "iceCreamSlider"])->name("iceCreamSlider");
    Route::post("plung-poll-services", [IceCreamParlourController::class, "iceCreamSaveSlide"])->name("iceCreamSaveSlide");
    Route::post("plung-poll-data", [IceCreamParlourController::class, "iceCreamData"])->name("iceCreamData");

    Route::get("about-gallery-admin", [AboutGalleryController::class, "saloonSlider"])->name("saloonSlider");
    Route::post("about-gallery-services", [AboutGalleryController::class, "saloonSaveSlide"])->name("saloonSaveSlide");
    Route::post("about-gallery-data", [AboutGalleryController::class, "saloonData"])->name("saloonData");

    Route::get("recreational-activities-admin", [RecreationalActivitiesController::class, "ladiesBeautyParlourSlider"])->name("ladiesBeautyParlourSlider");
    Route::post("recreational-activities-services", [RecreationalActivitiesController::class, "ladiesBeautyParlourSaveSlide"])->name("ladiesBeautyParlourSaveSlide");
    Route::post("recreational-activities-data", [RecreationalActivitiesController::class, "ladiesBeautyParlourData"])->name("ladiesBeautyParlourData");

    Route::get("offer-package-admin", [OfferPackageController::class, "offerPackageslider"])->name("offerPackageslider");
    Route::post("save-offer-package", [OfferPackageController::class, "saveofferPackage"])->name("saveofferPackage");
    Route::post("offer-package-data", [OfferPackageController::class, "offerPackageData"])->name("offerPackageData");

    Route::get("wedding-and-social-events-admin", [WeddingAndSocialEventsController::class, "weddingAndSocialEventsslider"])->name("weddingAndSocialEventsslider");
    Route::post("save-wedding-and-social-events", [WeddingAndSocialEventsController::class, "saveweddingAndSocialEvents"])->name("saveweddingAndSocialEvents");
    Route::post("wedding-and-social-events-data", [WeddingAndSocialEventsController::class, "weddingAndSocialEventsData"])->name("weddingAndSocialEventsData");

    Route::get("corporate-events-admin", [CorporateEventsController::class, "corporateEventsslider"])->name("corporateEventsslider");
    Route::post("save-corporate-events", [CorporateEventsController::class, "savecorporateEvents"])->name("savecorporateEvents");
    Route::post("corporate-events-data", [CorporateEventsController::class, "corporateEventsData"])->name("corporateEventsData");

    Route::get("indoor-events-admin", [IndoorEventsController::class, "indoorEventsslider"])->name("indoorEventsslider");
    Route::post("save-indoor-events", [IndoorEventsController::class, "saveindoorEvents"])->name("saveindoorEvents");
    Route::post("indoor-events-data", [IndoorEventsController::class, "indoorEventsData"])->name("indoorEventsData");

    Route::get("other-events-admin", [OtherEventsController::class, "otherEventsslider"])->name("otherEventsslider");
    Route::post("save-other-events", [OtherEventsController::class, "saveotherEvents"])->name("saveotherEvents");
    Route::post("other-events-data", [OtherEventsController::class, "otherEventsData"])->name("otherEventsData");

    Route::get("outdoor-events-admin", [OutdoorEventsController::class, "outdoorEventsslider"])->name("outdoorEventsslider");
    Route::post("save-outdoor-events", [OutdoorEventsController::class, "saveoutdoorEvents"])->name("saveoutdoorEvents");
    Route::post("outdoor-events-data", [OutdoorEventsController::class, "outdoorEventsData"])->name("outdoorEventsData");

    Route::get("seasonal-events-admin", [SeasonalEventsController::class, "seasonalEventsslider"])->name("seasonalEventsslider");
    Route::post("save-seasonal-events", [SeasonalEventsController::class, "saveseasonalEvents"])->name("saveseasonalEvents");
    Route::post("seasonal-events-data", [SeasonalEventsController::class, "seasonalEventsData"])->name("seasonalEventsData");

    Route::get("themed-events-admin", [ThemedEventsController::class, "themedEventsslider"])->name("themedEventsslider");
    Route::post("save-themed-events", [ThemedEventsController::class, "savethemedEvents"])->name("savethemedEvents");
    Route::post("themed-events-data", [ThemedEventsController::class, "themedEventsData"])->name("themedEventsData");

    Route::get("mange-enquiry-form",[EnquiryFormController::class,"manageEnquiryForm"])->name("manageEnquiryForm");
    Route::post("enquiry-form-data",[EnquiryFormController::class,"EnquiryFormData"])->name("EnquiryFormData");

    Route::get("amenities-admin", [AmenitiesController::class, "amenitiesSlider"])->name("amenitiesSlider");
    Route::post("save-amenities", [AmenitiesController::class, "saveAmenities"])->name("saveAmenities");
    Route::post("amenities-data", [AmenitiesController::class, "amenitiesData"])->name("amenitiesData");

    Route::get("blog-admin", [BlogController::class, "blogSlider"])->name("blogSlider");
    Route::post("save-blog", [BlogController::class, "saveBlog"])->name("saveBlog");
    Route::post("blog-data", [BlogController::class, "blogData"])->name("blogData");

    // Route::post("enquiry-quote-list", [EnquiryQuoteController::class, "getenquiryQuote"])->name("getenquiryQuote");
    //  Route::get("enquiry-quote-index", [EnquiryQuoteController::class, "enquiryQuoteView"])->name("enquiryQuoteView");
/**
 * Show the form page
 */
Route::get('enquiry-quote-index', [EnquiryQuoteController::class, 'enquiryQuoteView'])
    ->name('enquiryQuoteView');

    Route::get('wedding-enquiry-index', [WeddingEnquiryController::class, 'weddingenquiryView'])
    ->name('weddingenquiryView');

    Route::get('event-enquiry-index', [WeddingEventFormController::class, 'eventenquiryView'])
    ->name('eventenquiryView');
/**
 * Handle form submission to save in DB
 */
Route::post('enquiry-quote-save', [EnquiryQuoteController::class, 'saveEnquiryQuoteDetails'])
    ->name('saveEnquiryQuote');

/**
 * Get the listing for DataTables or similar
 */
Route::post('enquiry-quote-list', [EnquiryQuoteController::class, 'getEnquiryQuotes'])
    ->name('getEnquiryQuotes');

    Route::post('wedding-enquiry-list', [WeddingEnquiryController::class, 'getWeddingEnquiry'])
    ->name('getWeddingEnquiry');

    Route::post('event-enquiry-list', [WeddingEventFormController::class, 'geteventEnquiry'])
    ->name('geteventEnquiry');

Route::get("guestreview-admin", [OurGuestController::class, "guestreviewSlider"])->name("guestreviewSlider");
Route::post("guestreview-services", [OurGuestController::class, "guestreviewSaveSlide"])->name("guestreviewSaveSlide");
Route::post("guestreview-data", [OurGuestController::class, "guestreviewData"])->name("guestreviewData");
});