<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecreationalActivitiesRequest;
use App\Models\RecreationalActivitiesModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RecreationalActivitiesController extends Controller
{
    use CommonFunctions;
    //

    public function ladiesBeautyParlourSlider(){
        return view("Dashboard.Pages.manageRecreationalActivities");
    }

    public function ladiesBeautyParlourData(){
        $query = RecreationalActivitiesModel::select(
            RecreationalActivitiesModel::IMAGE,
            RecreationalActivitiesModel::IMAGE2,
            RecreationalActivitiesModel::IMAGE3,
        RecreationalActivitiesModel::ID,
        RecreationalActivitiesModel::HEADING_TOP,
        // RecreationalActivitiesModel::HEADING_BOTTOM,
        RecreationalActivitiesModel::HEADING_MIDDLE,
        RecreationalActivitiesModel::SLIDE_SORTING,
        RecreationalActivitiesModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{RecreationalActivitiesModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{RecreationalActivitiesModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{RecreationalActivitiesModel::SLIDE_STATUS}==RecreationalActivitiesModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function ladiesBeautyParlourSaveSlide(RecreationalActivitiesRequest $request){
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

    // public function insertSlide(RecreationalActivitiesRequest $request){
    //     $imageUpload = $this->slideImageUpload($request);
    //     if($imageUpload["status"]){
    //         $RecreationalActivitiesModel = new RecreationalActivitiesModel();
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::IMAGE} = $imageUpload["data"];
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::IMAGE2} = $imageUpload["data"];
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::IMAGE3} = $imageUpload["data"];
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::HEADING_TOP} = $request->input(RecreationalActivitiesModel::HEADING_TOP);
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::HEADING_MIDDLE} = $request->input(RecreationalActivitiesModel::HEADING_MIDDLE);
            // $RecreationalActivitiesModel->{RecreationalActivitiesModel::HEADING_BOTTOM} = $request->input(RecreationalActivitiesModel::HEADING_BOTTOM);
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::SLIDE_STATUS} = $request->input(RecreationalActivitiesModel::SLIDE_STATUS);
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::SLIDE_SORTING} = $request->input(RecreationalActivitiesModel::SLIDE_SORTING);           
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::STATUS} = 1;
    //         $RecreationalActivitiesModel->{RecreationalActivitiesModel::CREATED_BY} = Auth::user()->id;
    //         $RecreationalActivitiesModel->save();
    //         $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
    //         $this->forgetSlides();
    //     }else{
    //         $return = $imageUpload;
    //     }
    //     return $return;
    // }
    public function insertSlide(RecreationalActivitiesRequest $request){
        $imageUpload = $this->slideImageUpload($request);
    
        if ($imageUpload["status"]) {
            $RecreationalActivitiesModel = new RecreationalActivitiesModel();
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::IMAGE} = $imageUpload["data"]["image1"];
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::IMAGE2} = $imageUpload["data"]["image2"];
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::IMAGE3} = $imageUpload["data"]["image3"];
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::HEADING_TOP} = $request->input(RecreationalActivitiesModel::HEADING_TOP);
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::HEADING_MIDDLE} = $request->input(RecreationalActivitiesModel::HEADING_MIDDLE);
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::SLIDE_STATUS} = $request->input(RecreationalActivitiesModel::SLIDE_STATUS);
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::SLIDE_SORTING} = $request->input(RecreationalActivitiesModel::SLIDE_SORTING);
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::STATUS} = 1;
            $RecreationalActivitiesModel->{RecreationalActivitiesModel::CREATED_BY} = Auth::user()->id;
            $RecreationalActivitiesModel->save();
    
            $return = ["status" => true, "message" => "Saved successfully", "data" => null];
            $this->forgetSlides();
        } else {
            $return = $imageUpload;
        }
    
        return $return;
    }
    

    // public function slideImageUpload(RecreationalActivitiesRequest $request){
    //     $maxId = RecreationalActivitiesModel::max(RecreationalActivitiesModel::ID);
    //     $maxId += 1;
    //     $timeNow = strtotime($this->timeNow());
    //     $maxId .= "_$timeNow";
    //     return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    // }
    public function slideImageUpload(RecreationalActivitiesRequest $request){
        $maxId = RecreationalActivitiesModel::max(RecreationalActivitiesModel::ID) + 1;
        $timeNow = strtotime($this->timeNow());
        $maxIdPrefix = "{$maxId}_{$timeNow}";
    
        $image1 = $this->uploadLocalFile($request, "image", "/website/uploads/Slider/", "slide_{$maxIdPrefix}_1");
        $image2 = $this->uploadLocalFile($request, "image2", "/website/uploads/Slider/", "slide_{$maxIdPrefix}_2");
        $image3 = $this->uploadLocalFile($request, "image3", "/website/uploads/Slider/", "slide_{$maxIdPrefix}_3");
    
        return [
            "status" => $image1["status"] && $image2["status"] && $image3["status"],
            "data" => [
                "image1" => $image1["data"] ?? null,
                "image2" => $image2["data"] ?? null,
                "image3" => $image3["data"] ?? null,
            ],
            "message" => $image1["message"] ?? $image2["message"] ?? $image3["message"]
        ];
    }
    

    // public function updateSlide(RecreationalActivitiesRequest $request){
    //     $check = RecreationalActivitiesModel::where([RecreationalActivitiesModel::ID=>$request->input(RecreationalActivitiesModel::ID),RecreationalActivitiesModel::STATUS=>1])->first();
    //     if($check){
            // if($request->input(RecreationalActivitiesModel::IMAGE))
            // if ($request->input(RecreationalActivitiesModel::IMAGE) || 
            // $request->input(RecreationalActivitiesModel::IMAGE2) || 
            // $request->input(RecreationalActivitiesModel::IMAGE3))
            // {
            //     $imageUpload =$this->slideImageUpload($request);
            //     if($imageUpload["status"]){
            //         $check->{RecreationalActivitiesModel::IMAGE} = $imageUpload["data"];
            //         $check->{RecreationalActivitiesModel::IMAGE2} = $imageUpload["data"];
            //         $check->{RecreationalActivitiesModel::IMAGE3} = $imageUpload["data"];
            //         $check->{RecreationalActivitiesModel::SLIDE_SORTING} = $request->input(RecreationalActivitiesModel::SLIDE_SORTING);
            //         $check->{RecreationalActivitiesModel::HEADING_TOP} = $request->input(RecreationalActivitiesModel::HEADING_TOP);
            //         $check->{RecreationalActivitiesModel::HEADING_MIDDLE} = $request->input(RecreationalActivitiesModel::HEADING_MIDDLE);
                    // $check->{RecreationalActivitiesModel::HEADING_BOTTOM} = $request->input(RecreationalActivitiesModel::HEADING_BOTTOM);
            //         $check->{RecreationalActivitiesModel::SLIDE_STATUS} = $request->input(RecreationalActivitiesModel::SLIDE_STATUS);
            //         $check->{RecreationalActivitiesModel::UPDATED_BY} = Auth::user()->id;
            //         $check->save();
            //         $this->forgetSlides();
            //         $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
            //     }else{
            //         $return = $imageUpload;
            //     }
            // }else{
            //     $check->{RecreationalActivitiesModel::SLIDE_SORTING} = $request->input(RecreationalActivitiesModel::SLIDE_SORTING);
            //     $check->{RecreationalActivitiesModel::HEADING_TOP} = $request->input(RecreationalActivitiesModel::HEADING_TOP);
            //     $check->{RecreationalActivitiesModel::HEADING_MIDDLE} = $request->input(RecreationalActivitiesModel::HEADING_MIDDLE);
                // $check->{RecreationalActivitiesModel::HEADING_BOTTOM} = $request->input(RecreationalActivitiesModel::HEADING_BOTTOM);
    //             $check->{RecreationalActivitiesModel::SLIDE_STATUS} = $request->input(RecreationalActivitiesModel::SLIDE_STATUS);
    //             $check->{RecreationalActivitiesModel::UPDATED_BY} = Auth::user()->id;
    //             $check->save();
    //             $this->forgetSlides();
    //             $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
    //         }
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
    //     }
    //     return $return;
    // }
  
    public function updateSlide(RecreationalActivitiesRequest $request){
        $check = RecreationalActivitiesModel::where([
            RecreationalActivitiesModel::ID => $request->input(RecreationalActivitiesModel::ID),
            RecreationalActivitiesModel::STATUS => 1
        ])->first();
    
        if ($check) {
            if ($request->hasFile('image') || $request->hasFile('image2') || $request->hasFile('image3')) {
                $imageUpload = $this->slideImageUpload($request);
    
                if ($imageUpload["status"]) {
                    $check->{RecreationalActivitiesModel::IMAGE} = $imageUpload["data"]["image1"];
                    $check->{RecreationalActivitiesModel::IMAGE2} = $imageUpload["data"]["image2"];
                    $check->{RecreationalActivitiesModel::IMAGE3} = $imageUpload["data"]["image3"];
                } else {
                    return $imageUpload;
                }
            }
    
            $check->{RecreationalActivitiesModel::SLIDE_SORTING} = $request->input(RecreationalActivitiesModel::SLIDE_SORTING);
            $check->{RecreationalActivitiesModel::HEADING_TOP} = $request->input(RecreationalActivitiesModel::HEADING_TOP);
            $check->{RecreationalActivitiesModel::HEADING_MIDDLE} = $request->input(RecreationalActivitiesModel::HEADING_MIDDLE);
            $check->{RecreationalActivitiesModel::SLIDE_STATUS} = $request->input(RecreationalActivitiesModel::SLIDE_STATUS);
            $check->{RecreationalActivitiesModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
    
            $this->forgetSlides();
            $return = ["status" => true, "message" => "Updated successfully", "data" => null];
        } else {
            $return = ["status" => false, "message" => "Details not found.", "data" => null];
        }
    
        return $return;
    }
    

    // public function enableDisableSlide(RecreationalActivitiesRequest $request){
    //     $check = RecreationalActivitiesModel::find($request->input(RecreationalActivitiesModel::ID));
    //     if($check){
    //         $check->{RecreationalActivitiesModel::UPDATED_BY} = Auth::user()->id;
    //         if($request->input("action")=="enable"){
    //             $check->{RecreationalActivitiesModel::SLIDE_STATUS} = RecreationalActivitiesModel::SLIDE_STATUS_LIVE;
    //             $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
    //         }else{
    //             $check->{RecreationalActivitiesModel::SLIDE_STATUS} = RecreationalActivitiesModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
    //         }
    //         $this->forgetSlides();
    //         $check->save();
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
    //     }
    //     return $return;
    // }
    public function enableDisableSlide(RecreationalActivitiesRequest $request) {
        $check = RecreationalActivitiesModel::find($request->input(RecreationalActivitiesModel::ID));
        
        if ($check) {
            $check->{RecreationalActivitiesModel::UPDATED_BY} = Auth::user()->id;
            
            if ($request->input("action") == "enable") {
                $check->{RecreationalActivitiesModel::SLIDE_STATUS} = RecreationalActivitiesModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
            } else {
                $check->{RecreationalActivitiesModel::SLIDE_STATUS} = RecreationalActivitiesModel::SLIDE_STATUS_DISABLED;
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
