<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\RestaurantModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RestaurantController extends Controller
{
    use CommonFunctions;
    //

    public function restaurantSlider(){
        return view("Dashboard.Pages.manageRestaurant");
    }

    public function restaurantData(){
        $query = RestaurantModel::select(RestaurantModel::IMAGE,
        RestaurantModel::ID,
        RestaurantModel::HEADING_TOP,
        RestaurantModel::HEADING_BOTTOM,
        RestaurantModel::HEADING_MIDDLE,
        RestaurantModel::SLIDE_SORTING,
        RestaurantModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{RestaurantModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{RestaurantModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{RestaurantModel::SLIDE_STATUS}==RestaurantModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function restaurantSaveSlide(RestaurantRequest $request){
        try{
            switch($request->input("action")){
                case "insert":
                    $return = $this->insertSlide($request);
                    break;
                case "update":
                    $return = $this->updateSlide($request);
                    break;
                case "enable":
                case "disable":
                    $return = $this->enableDisableSlide($request);
                    break;
                default:
                $return = ["status"=>false,"message"=>"Unknown case","data"=>""];
            }
        }catch(Exception $exception){
            $return = $this->reportException($exception);
        }
        return response()->json($return);
    }

    public function insertSlide(RestaurantRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $RestaurantModel = new RestaurantModel();
            $RestaurantModel->{RestaurantModel::IMAGE} = $imageUpload["data"];
            $RestaurantModel->{RestaurantModel::HEADING_TOP} = $request->input(RestaurantModel::HEADING_TOP);
            $RestaurantModel->{RestaurantModel::HEADING_MIDDLE} = $request->input(RestaurantModel::HEADING_MIDDLE);
            $RestaurantModel->{RestaurantModel::HEADING_BOTTOM} = $request->input(RestaurantModel::HEADING_BOTTOM);
            $RestaurantModel->{RestaurantModel::SLIDE_STATUS} = $request->input(RestaurantModel::SLIDE_STATUS);
            $RestaurantModel->{RestaurantModel::SLIDE_SORTING} = $request->input(RestaurantModel::SLIDE_SORTING);           
            $RestaurantModel->{RestaurantModel::STATUS} = 1;
            $RestaurantModel->{RestaurantModel::CREATED_BY} = Auth::user()->id;
            $RestaurantModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(RestaurantRequest $request){
        $maxId = RestaurantModel::max(RestaurantModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(RestaurantRequest $request){
        $check = RestaurantModel::where([RestaurantModel::ID=>$request->input(RestaurantModel::ID),RestaurantModel::STATUS=>1])->first();
        if($check){
            if($request->input(RestaurantModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{RestaurantModel::IMAGE} = $imageUpload["data"];
                    $check->{RestaurantModel::SLIDE_SORTING} = $request->input(RestaurantModel::SLIDE_SORTING);
                    $check->{RestaurantModel::HEADING_TOP} = $request->input(RestaurantModel::HEADING_TOP);
                    $check->{RestaurantModel::HEADING_MIDDLE} = $request->input(RestaurantModel::HEADING_MIDDLE);
                    $check->{RestaurantModel::HEADING_BOTTOM} = $request->input(RestaurantModel::HEADING_BOTTOM);
                    $check->{RestaurantModel::SLIDE_STATUS} = $request->input(RestaurantModel::SLIDE_STATUS);
                    $check->{RestaurantModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{RestaurantModel::SLIDE_SORTING} = $request->input(RestaurantModel::SLIDE_SORTING);
                $check->{RestaurantModel::HEADING_TOP} = $request->input(RestaurantModel::HEADING_TOP);
                $check->{RestaurantModel::HEADING_MIDDLE} = $request->input(RestaurantModel::HEADING_MIDDLE);
                $check->{RestaurantModel::HEADING_BOTTOM} = $request->input(RestaurantModel::HEADING_BOTTOM);
                $check->{RestaurantModel::SLIDE_STATUS} = $request->input(RestaurantModel::SLIDE_STATUS);
                $check->{RestaurantModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    // public function enableDisableSlide(RestaurantRequest $request){
    //     $check = RestaurantModel::find($request->input(RestaurantModel::ID));
    //     if($check){
    //         $check->{RestaurantModel::UPDATED_BY} = Auth::user()->id;
    //         if($request->input("action")=="enable"){
    //             $check->{RestaurantModel::SLIDE_STATUS} = RestaurantModel::SLIDE_STATUS_LIVE;
    //             $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
    //         }else{
    //             $check->{RestaurantModel::SLIDE_STATUS} = RestaurantModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
    //         }
    //         $this->forgetSlides();
    //         $check->save();
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
    //     }
    //     return $return;
    // }
    public function enableDisableSlide(RestaurantRequest $request) {
        $check = RestaurantModel::find($request->input(RestaurantModel::ID));
        
        if ($check) {
            $check->{RestaurantModel::UPDATED_BY} = Auth::user()->id;
            
            if ($request->input("action") == "enable") {
                $check->{RestaurantModel::SLIDE_STATUS} = RestaurantModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
            } else {
                $check->{RestaurantModel::SLIDE_STATUS} = RestaurantModel::SLIDE_STATUS_DISABLED;
                $return = ["status" => 1, "message" => "Disabled successfully.", "data" => ""];
            }
            
            $this->forgetSlides();
            $check->save();
        } else {
            $return = ["status" => 0, "message" => "Details not found.", "data" => ""];
        }
        
        return $return;
    }
    
}
