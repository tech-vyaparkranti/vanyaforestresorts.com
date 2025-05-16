<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeServicesRequest;
use App\Models\HomeServicesModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class HomeServicesController extends Controller
{
    use CommonFunctions;
    //

    public function servicesSlider(){
        return view("Dashboard.Pages.homeServices");
    }

    public function servicesData(){
        $query = HomeServicesModel::select(HomeServicesModel::IMAGE,
        HomeServicesModel::ID,
        HomeServicesModel::HEADING_TOP,
        HomeServicesModel::HEADING_BOTTOM,
        HomeServicesModel::HEADING_MIDDLE,
        HomeServicesModel::SLIDE_SORTING,
        HomeServicesModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{HomeServicesModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{HomeServicesModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{HomeServicesModel::SLIDE_STATUS}==HomeServicesModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function servicesSaveSlide(HomeServicesRequest $request){
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

    public function insertSlide(HomeServicesRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $HomeServicesModel = new HomeServicesModel();
            $HomeServicesModel->{HomeServicesModel::IMAGE} = $imageUpload["data"];
            $HomeServicesModel->{HomeServicesModel::HEADING_TOP} = $request->input(HomeServicesModel::HEADING_TOP);
            $HomeServicesModel->{HomeServicesModel::HEADING_MIDDLE} = $request->input(HomeServicesModel::HEADING_MIDDLE);
            $HomeServicesModel->{HomeServicesModel::HEADING_BOTTOM} = $request->input(HomeServicesModel::HEADING_BOTTOM);
            $HomeServicesModel->{HomeServicesModel::SLIDE_STATUS} = $request->input(HomeServicesModel::SLIDE_STATUS);
            $HomeServicesModel->{HomeServicesModel::SLIDE_SORTING} = $request->input(HomeServicesModel::SLIDE_SORTING);           
            $HomeServicesModel->{HomeServicesModel::STATUS} = 1;
            $HomeServicesModel->{HomeServicesModel::CREATED_BY} = Auth::user()->id;
            $HomeServicesModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(HomeServicesRequest $request){
        $maxId = HomeServicesModel::max(HomeServicesModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(HomeServicesRequest $request){
        $check = HomeServicesModel::where([HomeServicesModel::ID=>$request->input(HomeServicesModel::ID),HomeServicesModel::STATUS=>1])->first();
        if($check){
            if($request->input(HomeServicesModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{HomeServicesModel::IMAGE} = $imageUpload["data"];
                    $check->{HomeServicesModel::SLIDE_SORTING} = $request->input(HomeServicesModel::SLIDE_SORTING);
                    $check->{HomeServicesModel::HEADING_TOP} = $request->input(HomeServicesModel::HEADING_TOP);
                    $check->{HomeServicesModel::HEADING_MIDDLE} = $request->input(HomeServicesModel::HEADING_MIDDLE);
                    $check->{HomeServicesModel::HEADING_BOTTOM} = $request->input(HomeServicesModel::HEADING_BOTTOM);
                    $check->{HomeServicesModel::SLIDE_STATUS} = $request->input(HomeServicesModel::SLIDE_STATUS);
                    $check->{HomeServicesModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{HomeServicesModel::SLIDE_SORTING} = $request->input(HomeServicesModel::SLIDE_SORTING);
                $check->{HomeServicesModel::HEADING_TOP} = $request->input(HomeServicesModel::HEADING_TOP);
                $check->{HomeServicesModel::HEADING_MIDDLE} = $request->input(HomeServicesModel::HEADING_MIDDLE);
                $check->{HomeServicesModel::HEADING_BOTTOM} = $request->input(HomeServicesModel::HEADING_BOTTOM);
                $check->{HomeServicesModel::SLIDE_STATUS} = $request->input(HomeServicesModel::SLIDE_STATUS);
                $check->{HomeServicesModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(HomeServicesRequest $request){
        $check = HomeServicesModel::find($request->input(HomeServicesModel::ID));
        if($check){
            $check->{HomeServicesModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{HomeServicesModel::SLIDE_STATUS} = HomeServicesModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{HomeServicesModel::SLIDE_STATUS} = HomeServicesModel::SLIDE_STATUS_DISABLED;
                $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
            }
            $this->forgetSlides();
            $check->save();
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
        }
        return $return;
    }
    // public function enableDisableSlide(HomeServicesRequest $request) {
    //     $check = HomeServicesModel::find($request->input(HomeServicesModel::ID));
        
    //     if ($check) {
    //         $check->{HomeServicesModel::UPDATED_BY} = Auth::user()->id;
            
    //         if ($request->input("action") == "enable") {
    //             $check->{HomeServicesModel::SLIDE_STATUS} = HomeServicesModel::SLIDE_STATUS_LIVE;
    //             $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
    //         } else {
    //             $check->{HomeServicesModel::SLIDE_STATUS} = HomeServicesModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status" => 1, "message" => "Disabled successfully.", "data" => ""];
    //         }
            
    //         $this->forgetSlides();
    //         $check->save();
    //     } else {
    //         $return = ["status" => 0, "message" => "Details not found.", "data" => ""];
    //     }
        
    //     return $return;
    // }
    
}
