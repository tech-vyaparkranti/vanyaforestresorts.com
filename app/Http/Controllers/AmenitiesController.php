<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmenitiesRequest;
use App\Models\AmenitiesModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AmenitiesController extends Controller
{
    use CommonFunctions;
    //

    public function amenitiesSlider(){
        return view("Dashboard.Pages.amenities");
    }

    public function amenitiesData(){
        try{
            $query = AmenitiesModel::select(AmenitiesModel::IMAGE,
        AmenitiesModel::ID,
        AmenitiesModel::HEADING_TOP,
        // AmenitiesModel::HEADING_BOTTOM,
        AmenitiesModel::HEADING_MIDDLE,
        AmenitiesModel::SLIDE_SORTING,
        AmenitiesModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{AmenitiesModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{AmenitiesModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{AmenitiesModel::SLIDE_STATUS}==AmenitiesModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        catch(Exception $except){
            dd([$except->getMessage()]);
        }
    }

    public function saveAmenities(AmenitiesRequest $request){
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

    public function insertSlide(AmenitiesRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $AmenitiesModel = new AmenitiesModel();
            $AmenitiesModel->{AmenitiesModel::IMAGE} = $imageUpload["data"];
            $AmenitiesModel->{AmenitiesModel::HEADING_TOP} = $request->input(AmenitiesModel::HEADING_TOP);
            $AmenitiesModel->{AmenitiesModel::HEADING_MIDDLE} = $request->input(AmenitiesModel::HEADING_MIDDLE);
            // $AmenitiesModel->{AmenitiesModel::HEADING_BOTTOM} = $request->input(AmenitiesModel::HEADING_BOTTOM);
            $AmenitiesModel->{AmenitiesModel::SLIDE_STATUS} = $request->input(AmenitiesModel::SLIDE_STATUS);
            $AmenitiesModel->{AmenitiesModel::SLIDE_SORTING} = $request->input(AmenitiesModel::SLIDE_SORTING);           
            $AmenitiesModel->{AmenitiesModel::STATUS} = 1;
            $AmenitiesModel->{AmenitiesModel::CREATED_BY} = Auth::user()->id;
            $AmenitiesModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(AmenitiesRequest $request){
        $maxId = AmenitiesModel::max(AmenitiesModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(AmenitiesRequest $request){
        $check = AmenitiesModel::where([AmenitiesModel::ID=>$request->input(AmenitiesModel::ID),AmenitiesModel::STATUS=>1])->first();
        if($check){
            if($request->input(AmenitiesModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{AmenitiesModel::IMAGE} = $imageUpload["data"];
                    $check->{AmenitiesModel::SLIDE_SORTING} = $request->input(AmenitiesModel::SLIDE_SORTING);
                    $check->{AmenitiesModel::HEADING_TOP} = $request->input(AmenitiesModel::HEADING_TOP);
                    $check->{AmenitiesModel::HEADING_MIDDLE} = $request->input(AmenitiesModel::HEADING_MIDDLE);
                    // $check->{AmenitiesModel::HEADING_BOTTOM} = $request->input(AmenitiesModel::HEADING_BOTTOM);
                    $check->{AmenitiesModel::SLIDE_STATUS} = $request->input(AmenitiesModel::SLIDE_STATUS);
                    $check->{AmenitiesModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{AmenitiesModel::SLIDE_SORTING} = $request->input(AmenitiesModel::SLIDE_SORTING);
                $check->{AmenitiesModel::HEADING_TOP} = $request->input(AmenitiesModel::HEADING_TOP);
                $check->{AmenitiesModel::HEADING_MIDDLE} = $request->input(AmenitiesModel::HEADING_MIDDLE);
                // $check->{AmenitiesModel::HEADING_BOTTOM} = $request->input(AmenitiesModel::HEADING_BOTTOM);
                $check->{AmenitiesModel::SLIDE_STATUS} = $request->input(AmenitiesModel::SLIDE_STATUS);
                $check->{AmenitiesModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(AmenitiesRequest $request){
        $check = AmenitiesModel::find($request->input(AmenitiesModel::ID));
        if($check){
            $check->{AmenitiesModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{AmenitiesModel::SLIDE_STATUS} = AmenitiesModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{AmenitiesModel::SLIDE_STATUS} = AmenitiesModel::SLIDE_STATUS_DISABLED;
                $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
            }
            $this->forgetSlides();
            $check->save();
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
        }
        return $return;
    }
}
