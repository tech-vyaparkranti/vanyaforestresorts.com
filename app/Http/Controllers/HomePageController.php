<?php

namespace App\Http\Controllers;

use App\Models\OurGuestModel;
use Exception;
use App\Models\Blog;
use App\Models\NavMenu;
use App\Models\FaqModel;
use App\Models\RoomsModel;
use App\Models\GalleryItem;
use App\Models\SaloonModel;
use App\Models\SliderModel;
use App\Models\HomeFaqModel;
use Illuminate\Http\Request;
use App\Models\AmenitiesModel;
use App\Models\RestaurantModel;
use App\Models\WebSiteElements;
use App\Traits\CommonFunctions;
use App\Models\BanquetHallModel;
use App\Models\OtherEventsModel;
use App\Models\TestimonialModel;
use App\Models\AboutGalleryModel;
use App\Models\HomeServicesModel;
use App\Models\IndoorEventsModel;
use App\Models\OfferPackageModel;
use App\Models\ThemedEventsModel;
use Mews\Captcha\Facades\Captcha;
use App\Models\OutdoorEventsModel;
use App\Models\SeasonalEventsModel;
use App\Models\CorporateEventsModel;
use App\Models\IceCreamParlourModel;
use App\Models\HomeRecognitionsModel;
use App\Models\LadiesBeautyParlourModel;
use App\Models\RecreationalActivitiesModel;
use App\Models\WeddingAndSocialEventsModel;

class HomePageController extends Controller
{
    use CommonFunctions;

    public function homePage(){
        try{
            $sliders=SliderModel::where([[SliderModel::SLIDE_STATUS,SliderModel::SLIDE_STATUS_LIVE],
            [SliderModel::SLIDE_STATUS,1]])->orderBy(SliderModel::SLIDE_SORTING,"desc")->get();
            $our_offers = (new OurOffersController())->getHomePageOffers();
            $home_services=HomeServicesModel::where('slide_status','live')->get();
            $testimonial=TestimonialModel::where('slide_status','live')->get();
            $home_recognitions=HomeRecognitionsModel::where('slide_status','live')->get();
            $getHomeAllFaq = HomeFaqModel::all();
            $offer_packages=OfferPackageModel::where([[OfferPackageModel::SLIDE_STATUS,OfferPackageModel::SLIDE_STATUS_LIVE],
            [OfferPackageModel::SLIDE_STATUS,1]])->orderBy(OfferPackageModel::SLIDE_SORTING,"desc")->get();
            $data = $this->getElement();
            $blogs = Blog::orderBy(Blog::SLIDE_SORTING, 'desc')->where([[Blog::SLIDE_STATUS,Blog::SLIDE_STATUS_LIVE],
            [Blog::SLIDE_STATUS,1]])->get();
            $review=OurGuestModel::where('slide_status','live')->get();
            return view("HomePage.dynamicHomePage",compact("our_offers","sliders","home_services","testimonial","home_recognitions","getHomeAllFaq","offer_packages","blogs","review"),$data);
        }catch(Exception $exception){
            echo $exception->getMessage();
            return false;
        }

    }
    public function aboutUs(){
        $about_gallery=AboutGalleryModel::where('slide_status','live')->get();
        $data = $this->getElement();
        return view("HomePage.aboutUs",$data,compact('about_gallery'));
    }
    public function hotel(){
        $data = $this->getElement();
        return view("HomePage.hotel",$data);
    }
    public function rooms(){
        $premium_room=RestaurantModel::where('slide_status','live')->get();
        $cottage_room=RoomsModel::where('slide_status','live')->get();
        $family_suite=BanquetHallModel::where('slide_status','live')->get();
        $plung_poll=IceCreamParlourModel::where('slide_status','live')->get();
        $data = $this->getElement();
        return view("HomePage.rooms",$data,compact('premium_room','cottage_room','family_suite','plung_poll'));
    }
    public function amenities(){
        $data = $this->getElement();
        $amenities=AmenitiesModel::where([[AmenitiesModel::SLIDE_STATUS,AmenitiesModel::SLIDE_STATUS_LIVE],
        [AmenitiesModel::SLIDE_STATUS,1]])->orderBy(AmenitiesModel::SLIDE_SORTING,"desc")->get();
        $recreational=RecreationalActivitiesModel::where([[RecreationalActivitiesModel::SLIDE_STATUS,RecreationalActivitiesModel::SLIDE_STATUS_LIVE],
        [RecreationalActivitiesModel::SLIDE_STATUS,1]])->orderBy(RecreationalActivitiesModel::SLIDE_SORTING,"desc")->get();
        return view("HomePage.amenities",$data,compact('amenities','recreational'));
    }
    public function blog()
    {
        $blogs = Blog::orderBy(Blog::SLIDE_SORTING, 'desc')->where([[Blog::SLIDE_STATUS,Blog::SLIDE_STATUS_LIVE],
        [Blog::SLIDE_STATUS,1]])->get();
        $data = $this->getElement(); // Additional data if necessary
        return view('HomePage.blogPage', $data, compact('blogs'));
    }
    public function blogDetail($slug)
    {
        
         // Find the blog by slug or throw a 404
    $blogs = Blog::where('slug', $slug)
    ->where(Blog::SLIDE_STATUS, Blog::SLIDE_STATUS_LIVE)
    ->firstOrFail();

// Fetch other blogs excluding the current one
$otherBlogs = Blog::where('slug', '!=', $slug)
          ->where(Blog::SLIDE_STATUS, Blog::SLIDE_STATUS_LIVE)
          ->orderBy(Blog::SLIDE_SORTING, 'desc')
          ->take(4) // Limit to 4 recent blogs
          ->get();

$data = $this->getElement(); // Additional data if necessary
return view('HomePage.blogDetail', $data, compact('blogs', 'otherBlogs'));
    }
    public function eventsweddings(){
        $data = $this->getElement();
        $wedding_and_social_events=WeddingAndSocialEventsModel::where([[WeddingAndSocialEventsModel::SLIDE_STATUS,WeddingAndSocialEventsModel::SLIDE_STATUS_LIVE],
        [WeddingAndSocialEventsModel::SLIDE_STATUS,1]])->orderBy(WeddingAndSocialEventsModel::SLIDE_SORTING,"desc")->get();
        $corporate_events=CorporateEventsModel::where([[CorporateEventsModel::SLIDE_STATUS,CorporateEventsModel::SLIDE_STATUS_LIVE],
        [CorporateEventsModel::SLIDE_STATUS,1]])->orderBy(CorporateEventsModel::SLIDE_SORTING,"desc")->get();
        $indoor_events=IndoorEventsModel::where([[IndoorEventsModel::SLIDE_STATUS,IndoorEventsModel::SLIDE_STATUS_LIVE],
        [IndoorEventsModel::SLIDE_STATUS,1]])->orderBy(IndoorEventsModel::SLIDE_SORTING,"desc")->get();
        $outdoor_events=OutdoorEventsModel::where([[OutdoorEventsModel::SLIDE_STATUS,OutdoorEventsModel::SLIDE_STATUS_LIVE],
        [OutdoorEventsModel::SLIDE_STATUS,1]])->orderBy(OutdoorEventsModel::SLIDE_SORTING,"desc")->get();
        $other_events=OtherEventsModel::where([[OtherEventsModel::SLIDE_STATUS,OtherEventsModel::SLIDE_STATUS_LIVE],
        [OtherEventsModel::SLIDE_STATUS,1]])->orderBy(OtherEventsModel::SLIDE_SORTING,"desc")->get();
        $themed_events=ThemedEventsModel::where([[ThemedEventsModel::SLIDE_STATUS,ThemedEventsModel::SLIDE_STATUS_LIVE],
        [ThemedEventsModel::SLIDE_STATUS,1]])->orderBy(ThemedEventsModel::SLIDE_SORTING,"desc")->get();
        $seasonal_events=SeasonalEventsModel::where([[SeasonalEventsModel::SLIDE_STATUS,SeasonalEventsModel::SLIDE_STATUS_LIVE],
        [SeasonalEventsModel::SLIDE_STATUS,1]])->orderBy(SeasonalEventsModel::SLIDE_SORTING,"desc")->get();
        $testimonial=TestimonialModel::where('slide_status','live')->get();
        return view("HomePage.eventsweddings",$data,compact('testimonial','wedding_and_social_events','corporate_events','indoor_events','outdoor_events','other_events','themed_events','seasonal_events'));
    }
    public function offersdetail(){
        $data = $this->getElement();
        return view("HomePage.offersdetail",$data);
    }
    public function offerspackages(){
        $data = $this->getElement();
        $offer_packages=OfferPackageModel::where([[OfferPackageModel::SLIDE_STATUS,OfferPackageModel::SLIDE_STATUS_LIVE],
        [OfferPackageModel::SLIDE_STATUS,1]])->orderBy(OfferPackageModel::SLIDE_SORTING,"desc")->get();
        return view("HomePage.offerspackages",$data,compact('offer_packages'));
    }
    public function termsConditions(){
        $data = $this->getElement();
        return view("HomePage.termsConditions",$data);
    }
     public function holipackage(){
        $data = $this->getElement();
        return view("HomePage.holipackage",$data);
    }
    public function shippingDeliverypolicy(){
        $data = $this->getElement();
        return view("HomePage.shippingDeliverypolicy",$data);
    }
    public function CancellationRefundPolicy(){
        $data = $this->getElement();
        return view("HomePage.CancellationRefundPolicy",$data);
    }
    public function privacyPolicy(){
        $data = $this->getElement();
        return view("HomePage.privacyPolicy",$data);
    }
    public function career(){
        $getAllFaq = FaqModel::all();
        return view("HomePage.career",compact("getAllFaq"));
    }
    public function destinations(){
        $data = $this->getElement();
        $data["destinations"] = (new DestinationController)->allDestinations();
        return view("HomePage.destinations",$data);
    }
    // public function galleryPages(){
    //     $data["galleryImages"] =$this->getCachedGalleryItems();
    //     $data[GalleryItem::FILTER_CATEGORY] = collect($data["galleryImages"])->unique(GalleryItem::FILTER_CATEGORY);
    //     $data = $this->getElement();
    //     return view("HomePage.galleryPages",$data);
    // }

    public function galleryPages()
{
    // 1. Get the default data from getElement()
    $data = $this->getElement();

    // 2. Retrieve gallery images
    $galleryImages = $this->getCachedGalleryItems();

    // 3. Append your gallery data to the $data array
    $data["galleryImages"] = $galleryImages;
    $data[GalleryItem::FILTER_CATEGORY] = collect($galleryImages)->unique(GalleryItem::FILTER_CATEGORY);

    // 4. Pass everything to the view
    return view("HomePage.galleryPages", $data);
}

    public function contactUs(){
        $data = $this->getElement();
        return view("HomePage.contactUs",$data);
    }

    public function weddingEnquiry(){
        $data = $this->getElement();
        return view("HomePage.weddingEnquiry",$data);
    }

    public function ComingSoon(){
        return view("HomePage.ComingSoon");
    }
    public function restaurants(){
        $data = $this->getElement();
        return view("HomePage.restaurant",$data);
    }
    public function banquetHall(){
        $data = $this->getElement();
        return view("HomePage.banquetHall",$data);
    }
    public function otherServices(){
        $restaurant=RestaurantModel::where('slide_status','live')->get();
        $rooms=RoomsModel::where('slide_status','live')->get();
        $banquetHall=BanquetHallModel::where('slide_status','live')->get();
        $ice_cream_parlour=IceCreamParlourModel::where('slide_status','live')->get();
        // $saloon=SaloonModel::where('slide_status','live')->get();
        // $ladies_beauty_parlour=LadiesBeautyParlourModel::where('slide_status','live')->get();
        $data = $this->getElement();
        return view("HomePage.otherServices",compact('restaurant','rooms','banquetHall','ice_cream_parlour','saloon','ladies_beauty_parlour'),$data);
    }

    // All Meta Tags start
    public function show($slug) {
        $page = Page::where('slug', $slug)->first();
        return view('page.show', [
            'title' => $page->title,
            'description' => $page->description,
            'keywords' => $page->keywords,
        ]);
    }
    // All Meta Tags End

    public function getMenu(){
        $menuItems = NavMenu::where([
            [NavMenu::STATUS,1],
            [NavMenu::VIEW_IN_LIST,NavMenu::VIEW_IN_LIST_YES]])
        ->select(NavMenu::TITLE,NavMenu::URL,NavMenu::URL_TARGET,NavMenu::PARENT_ID,
        NavMenu::NAV_TYPE,NavMenu::POSITION,NavMenu::ID)
        ->orderBy(NavMenu::PARENT_ID,"asc")
        ->orderBy(NavMenu::POSITION,"asc")->get();
        $returnData = [];
        if(count($menuItems)){
            // Nav Menu By Type
            $menuItemTypes = collect($menuItems)->groupBy(NavMenu::NAV_TYPE)->toArray();

            foreach($menuItemTypes as $navType=>$val){
                //for each type item
                foreach($val as $item){
                    if(!filter_var($item[NavMenu::URL], FILTER_VALIDATE_URL)){
                        $item[NavMenu::URL] = url("")."/".$item[NavMenu::URL];
                        //dd(url("items"));
                    }
                    //parent id is null
                    if($item[NavMenu::PARENT_ID]==null && !isset($returnData[$navType][$item[NavMenu::ID]])){
                        $returnData[$navType][$item[NavMenu::ID]] = $item;
                    }
                    //if parent id is set i.e child node
                    if($item[NavMenu::PARENT_ID]){
                        $this->setChildren($returnData,$item);
                    }
                }
            }
            if(count($returnData)){
                $return = ["status"=>true,"message"=>"menu items found.","data"=>$returnData,
                "menu_html"=>$this->getHtml($returnData)];
            }else{
                $return = ["status"=>false,"message"=>"menu items not found.","data"=>null];
            }
        }else{
            $return = ["status"=>false,"message"=>"menu items not set","data"=>null];
        }
        return response()->json($return);
    }

    public function setChildren(&$returnData,$item){

        foreach($returnData as $navType=>$navItem){
            //parent id matches
            if($navType==$item[NavMenu::NAV_TYPE] && !empty($navItem[$item[NavMenu::PARENT_ID]])){
                $returnData[$item[NavMenu::NAV_TYPE]][$item[NavMenu::PARENT_ID]]["child_node"][] = $item;
                return true;
            }
            if(!empty($returnData[$item[NavMenu::NAV_TYPE]])){

                $this->findSetChild($returnData[$item[NavMenu::NAV_TYPE]],$item);
            }

        }


    }

    /**
     * findSetChild
     *
     * @param  mixed $item
     * @param  mixed $itemSet
     * @return void
     */
    public function findSetChild(&$item,$itemSet){
        try{
            foreach($item as $navId=>$navItem){
                if($navItem[NavMenu::ID]==$itemSet[NavMenu::PARENT_ID]){
                    $item[$navId]["child_node"][] = $itemSet;
                    return true;
                }
                if(!empty($item[$navId]["child_node"])){
                    return $this->findSetChild($item[$navId]["child_node"],$itemSet);
                }
            }
        }catch(Exception $exception){
            return false;
        }
    }

    /**
     * getHtml
     *
     * @param  mixed $returnData
     * @return void
     */
    public function getHtml($returnData){
        $html = [];
        foreach($returnData as $key=>$value){
            if(!isset($html[$key])){
                $html[$key] = '';
            }
            foreach($value as $keyVal){
                $html[$key] .= $this->getItemHTML($key,$html,$keyVal);
            }
            //$html[$key] = $this->getItemHTML($key,$html,$value);
        }
        return $html;
    }

    /**
     * getItemHTML
     *
     * @param  mixed $key
     * @param  mixed $html
     * @param  mixed $item
     * @return void
     */
    public function getItemHTML($key,$html,$item){

        $link_html = "";
        if($key=="top"){
            if(!empty($item["child_node"])){

                $subMenu = $this->getItemChildHTML($item,'<div class="dropdown-menu">');
                $link_html .= '<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        '.$item[NavMenu::TITLE].'
                                    </a>'.$subMenu.'</div>
                                    </li>';
            }else{
                $link_html .= '<li class="nav-item">
                                    <a target="'.$item[NavMenu::URL_TARGET].'" class="nav-link js-scroll-trigger" href="'.
                                    $item[NavMenu::URL].'">'.$item[NavMenu::TITLE].'</a>
                               </li>';
            }
        }

        return $link_html;
    }

    /**
     * getItemChildHTML
     *
     * @param  mixed $item
     * @param  mixed $html
     * @return void
     */
    public function getItemChildHTML($item,$html){
        if(!empty($item["child_node"])){
            $html .='<a target="'.$item[NavMenu::URL_TARGET].'" class="dropdown-item" href="'.$item[NavMenu::URL].'">'.$item[NavMenu::TITLE].'</a>';
            foreach($item["child_node"] as $item_new){
                return $this->getItemChildHTML($item_new,$html);
            }
        }else{
            return $html .='<a target="'.$item[NavMenu::URL_TARGET].'" class="dropdown-item" href="'.$item[NavMenu::URL].'">'.$item[NavMenu::TITLE].'</a>';
        }
    }

    public function galleryPage(){
        $obj = new GalleryItem();
        $getAllGalleryImages = $obj->getAllGalleryImages();
        $getAllVideos = $obj->getAllGalleryVideos();
        return view("HomePage.galleryPage",compact("getAllGalleryImages","getAllVideos"));
    }

    public function refreshCapthca(){
        try{
            $return = ["status"=>true,"message"=>"Success","data"=>Captcha::src()];

        }catch(Exception $exception){
            $return = ["status"=>false,"message"=>$exception->getMessage(),"data"=>$exception->getTraceAsString()];
        }
        return response()->json($return);
    }
    public function getElement(){
        $elements = $this->getWebSiteElements();
        $data = [];
        if(!empty($elements)){
            foreach($elements as $item){
                $data[$item->{WebSiteElements::ELEMENT}] = $item->{WebSiteElements::ELEMENT_DETAILS};
            }
        }
        return $data;
    }
}
