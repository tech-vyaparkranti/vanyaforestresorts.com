<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomsRequest;
use App\Models\RoomsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RoomsController extends Controller
{
    use CommonFunctions;
    //

    public function roomsSlider(){
        return view("Dashboard.Pages.manageRooms");
    }

    public function roomsData(){
        $query = RoomsModel::select(RoomsModel::IMAGE,
        RoomsModel::ID,
        RoomsModel::HEADING_TOP,
        RoomsModel::HEADING_BOTTOM,
        RoomsModel::HEADING_MIDDLE,
        RoomsModel::SLIDE_SORTING,
        RoomsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{RoomsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{RoomsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{RoomsModel::SLIDE_STATUS}==RoomsModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function roomsSaveSlide(RoomsRequest $request){
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

    public function insertSlide(RoomsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $RoomsModel = new RoomsModel();
            $RoomsModel->{RoomsModel::IMAGE} = $imageUpload["data"];
            $RoomsModel->{RoomsModel::HEADING_TOP} = $request->input(RoomsModel::HEADING_TOP);
            $RoomsModel->{RoomsModel::HEADING_MIDDLE} = $request->input(RoomsModel::HEADING_MIDDLE);
            $RoomsModel->{RoomsModel::HEADING_BOTTOM} = $request->input(RoomsModel::HEADING_BOTTOM);
            $RoomsModel->{RoomsModel::SLIDE_STATUS} = $request->input(RoomsModel::SLIDE_STATUS);
            $RoomsModel->{RoomsModel::SLIDE_SORTING} = $request->input(RoomsModel::SLIDE_SORTING);           
            $RoomsModel->{RoomsModel::STATUS} = 1;
            $RoomsModel->{RoomsModel::CREATED_BY} = Auth::user()->id;
            $RoomsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(RoomsRequest $request){
        $maxId = RoomsModel::max(RoomsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(RoomsRequest $request){
        $check = RoomsModel::where([RoomsModel::ID=>$request->input(RoomsModel::ID),RoomsModel::STATUS=>1])->first();
        if($check){
            if($request->input(RoomsModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{RoomsModel::IMAGE} = $imageUpload["data"];
                    $check->{RoomsModel::SLIDE_SORTING} = $request->input(RoomsModel::SLIDE_SORTING);
                    $check->{RoomsModel::HEADING_TOP} = $request->input(RoomsModel::HEADING_TOP);
                    $check->{RoomsModel::HEADING_MIDDLE} = $request->input(RoomsModel::HEADING_MIDDLE);
                    $check->{RoomsModel::HEADING_BOTTOM} = $request->input(RoomsModel::HEADING_BOTTOM);
                    $check->{RoomsModel::SLIDE_STATUS} = $request->input(RoomsModel::SLIDE_STATUS);
                    $check->{RoomsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{RoomsModel::SLIDE_SORTING} = $request->input(RoomsModel::SLIDE_SORTING);
                $check->{RoomsModel::HEADING_TOP} = $request->input(RoomsModel::HEADING_TOP);
                $check->{RoomsModel::HEADING_MIDDLE} = $request->input(RoomsModel::HEADING_MIDDLE);
                $check->{RoomsModel::HEADING_BOTTOM} = $request->input(RoomsModel::HEADING_BOTTOM);
                $check->{RoomsModel::SLIDE_STATUS} = $request->input(RoomsModel::SLIDE_STATUS);
                $check->{RoomsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    // public function enableDisableSlide(RoomsRequest $request){
    //     $check = RoomsModel::find($request->input(RoomsModel::ID));
    //     if($check){
    //         $check->{RoomsModel::UPDATED_BY} = Auth::user()->id;
    //         if($request->input("action")=="enable"){
    //             $check->{RoomsModel::SLIDE_STATUS} = RoomsModel::SLIDE_STATUS_LIVE;
    //             $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
    //         }else{
    //             $check->{RoomsModel::SLIDE_STATUS} = RoomsModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
    //         }
    //         $this->forgetSlides();
    //         $check->save();
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
    //     }
    //     return $return;
    // }
    public function enableDisableSlide(RoomsRequest $request) {
        $check = RoomsModel::find($request->input(RoomsModel::ID));
        
        if ($check) {
            $check->{RoomsModel::UPDATED_BY} = Auth::user()->id;
            
            if ($request->input("action") == "enable") {
                $check->{RoomsModel::SLIDE_STATUS} = RoomsModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
            } else {
                $check->{RoomsModel::SLIDE_STATUS} = RoomsModel::SLIDE_STATUS_DISABLED;
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
