<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutGalleryRequest;
use App\Models\AboutGalleryModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AboutGalleryController extends Controller
{
    use CommonFunctions;
    //

    public function saloonSlider(){
        return view("Dashboard.Pages.manageAboutGallery");
    }

    public function saloonData(){
        $query = AboutGalleryModel::select(AboutGalleryModel::IMAGE,
        AboutGalleryModel::ID,
        // AboutGalleryModel::HEADING_TOP,
        // AboutGalleryModel::HEADING_BOTTOM,
        // AboutGalleryModel::HEADING_MIDDLE,
        AboutGalleryModel::SLIDE_SORTING,
        AboutGalleryModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{AboutGalleryModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{AboutGalleryModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{AboutGalleryModel::SLIDE_STATUS}==AboutGalleryModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function saloonSaveSlide(AboutGalleryRequest $request){
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

    public function insertSlide(AboutGalleryRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $AboutGalleryModel = new AboutGalleryModel();
            $AboutGalleryModel->{AboutGalleryModel::IMAGE} = $imageUpload["data"];
            // $AboutGalleryModel->{AboutGalleryModel::HEADING_TOP} = $request->input(AboutGalleryModel::HEADING_TOP);
            // $AboutGalleryModel->{AboutGalleryModel::HEADING_MIDDLE} = $request->input(AboutGalleryModel::HEADING_MIDDLE);
            // $AboutGalleryModel->{AboutGalleryModel::HEADING_BOTTOM} = $request->input(AboutGalleryModel::HEADING_BOTTOM);
            $AboutGalleryModel->{AboutGalleryModel::SLIDE_STATUS} = $request->input(AboutGalleryModel::SLIDE_STATUS);
            $AboutGalleryModel->{AboutGalleryModel::SLIDE_SORTING} = $request->input(AboutGalleryModel::SLIDE_SORTING);           
            $AboutGalleryModel->{AboutGalleryModel::STATUS} = 1;
            $AboutGalleryModel->{AboutGalleryModel::CREATED_BY} = Auth::user()->id;
            $AboutGalleryModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(AboutGalleryRequest $request){
        $maxId = AboutGalleryModel::max(AboutGalleryModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(AboutGalleryRequest $request){
        $check = AboutGalleryModel::where([AboutGalleryModel::ID=>$request->input(AboutGalleryModel::ID),AboutGalleryModel::STATUS=>1])->first();
        if($check){
            if($request->input(AboutGalleryModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{AboutGalleryModel::IMAGE} = $imageUpload["data"];
                    $check->{AboutGalleryModel::SLIDE_SORTING} = $request->input(AboutGalleryModel::SLIDE_SORTING);
                    // $check->{AboutGalleryModel::HEADING_TOP} = $request->input(AboutGalleryModel::HEADING_TOP);
                    // $check->{AboutGalleryModel::HEADING_MIDDLE} = $request->input(AboutGalleryModel::HEADING_MIDDLE);
                    // $check->{AboutGalleryModel::HEADING_BOTTOM} = $request->input(AboutGalleryModel::HEADING_BOTTOM);
                    $check->{AboutGalleryModel::SLIDE_STATUS} = $request->input(AboutGalleryModel::SLIDE_STATUS);
                    $check->{AboutGalleryModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{AboutGalleryModel::SLIDE_SORTING} = $request->input(AboutGalleryModel::SLIDE_SORTING);
                // $check->{AboutGalleryModel::HEADING_TOP} = $request->input(AboutGalleryModel::HEADING_TOP);
                // $check->{AboutGalleryModel::HEADING_MIDDLE} = $request->input(AboutGalleryModel::HEADING_MIDDLE);
                // $check->{AboutGalleryModel::HEADING_BOTTOM} = $request->input(AboutGalleryModel::HEADING_BOTTOM);
                $check->{AboutGalleryModel::SLIDE_STATUS} = $request->input(AboutGalleryModel::SLIDE_STATUS);
                $check->{AboutGalleryModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    // public function enableDisableSlide(AboutGalleryRequest $request){
    //     $check = AboutGalleryModel::find($request->input(AboutGalleryModel::ID));
    //     if($check){
    //         $check->{AboutGalleryModel::UPDATED_BY} = Auth::user()->id;
    //         if($request->input("action")=="enable"){
    //             $check->{AboutGalleryModel::SLIDE_STATUS} = AboutGalleryModel::SLIDE_STATUS_LIVE;
    //             $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
    //         }else{
    //             $check->{AboutGalleryModel::SLIDE_STATUS} = AboutGalleryModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
    //         }
    //         $this->forgetSlides();
    //         $check->save();
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
    //     }
    //     return $return;
    // }
    public function enableDisableSlide(AboutGalleryRequest $request) {
        $check = AboutGalleryModel::find($request->input(AboutGalleryModel::ID));
        
        if ($check) {
            $check->{AboutGalleryModel::UPDATED_BY} = Auth::user()->id;
            
            if ($request->input("action") == "enable") {
                $check->{AboutGalleryModel::SLIDE_STATUS} = AboutGalleryModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
            } else {
                $check->{AboutGalleryModel::SLIDE_STATUS} = AboutGalleryModel::SLIDE_STATUS_DISABLED;
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
