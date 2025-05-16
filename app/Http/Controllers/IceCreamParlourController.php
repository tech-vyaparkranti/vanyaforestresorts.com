<?php

namespace App\Http\Controllers;

use App\Http\Requests\IceCreamParlourRequest;
use App\Models\IceCreamParlourModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class IceCreamParlourController extends Controller
{
    use CommonFunctions;
    //

    public function iceCreamSlider(){
        return view("Dashboard.Pages.manageIceCreamParlour");
    }

    public function iceCreamData(){
        $query = IceCreamParlourModel::select(IceCreamParlourModel::IMAGE,
        IceCreamParlourModel::ID,
        IceCreamParlourModel::HEADING_TOP,
        IceCreamParlourModel::HEADING_BOTTOM,
        IceCreamParlourModel::HEADING_MIDDLE,
        IceCreamParlourModel::SLIDE_SORTING,
        IceCreamParlourModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{IceCreamParlourModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{IceCreamParlourModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{IceCreamParlourModel::SLIDE_STATUS}==IceCreamParlourModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function iceCreamSaveSlide(IceCreamParlourRequest $request){
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

    public function insertSlide(IceCreamParlourRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $IceCreamParlourModel = new IceCreamParlourModel();
            $IceCreamParlourModel->{IceCreamParlourModel::IMAGE} = $imageUpload["data"];
            $IceCreamParlourModel->{IceCreamParlourModel::HEADING_TOP} = $request->input(IceCreamParlourModel::HEADING_TOP);
            $IceCreamParlourModel->{IceCreamParlourModel::HEADING_MIDDLE} = $request->input(IceCreamParlourModel::HEADING_MIDDLE);
            $IceCreamParlourModel->{IceCreamParlourModel::HEADING_BOTTOM} = $request->input(IceCreamParlourModel::HEADING_BOTTOM);
            $IceCreamParlourModel->{IceCreamParlourModel::SLIDE_STATUS} = $request->input(IceCreamParlourModel::SLIDE_STATUS);
            $IceCreamParlourModel->{IceCreamParlourModel::SLIDE_SORTING} = $request->input(IceCreamParlourModel::SLIDE_SORTING);           
            $IceCreamParlourModel->{IceCreamParlourModel::STATUS} = 1;
            $IceCreamParlourModel->{IceCreamParlourModel::CREATED_BY} = Auth::user()->id;
            $IceCreamParlourModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(IceCreamParlourRequest $request){
        $maxId = IceCreamParlourModel::max(IceCreamParlourModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(IceCreamParlourRequest $request){
        $check = IceCreamParlourModel::where([IceCreamParlourModel::ID=>$request->input(IceCreamParlourModel::ID),IceCreamParlourModel::STATUS=>1])->first();
        if($check){
            if($request->input(IceCreamParlourModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{IceCreamParlourModel::IMAGE} = $imageUpload["data"];
                    $check->{IceCreamParlourModel::SLIDE_SORTING} = $request->input(IceCreamParlourModel::SLIDE_SORTING);
                    $check->{IceCreamParlourModel::HEADING_TOP} = $request->input(IceCreamParlourModel::HEADING_TOP);
                    $check->{IceCreamParlourModel::HEADING_MIDDLE} = $request->input(IceCreamParlourModel::HEADING_MIDDLE);
                    $check->{IceCreamParlourModel::HEADING_BOTTOM} = $request->input(IceCreamParlourModel::HEADING_BOTTOM);
                    $check->{IceCreamParlourModel::SLIDE_STATUS} = $request->input(IceCreamParlourModel::SLIDE_STATUS);
                    $check->{IceCreamParlourModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{IceCreamParlourModel::SLIDE_SORTING} = $request->input(IceCreamParlourModel::SLIDE_SORTING);
                $check->{IceCreamParlourModel::HEADING_TOP} = $request->input(IceCreamParlourModel::HEADING_TOP);
                $check->{IceCreamParlourModel::HEADING_MIDDLE} = $request->input(IceCreamParlourModel::HEADING_MIDDLE);
                $check->{IceCreamParlourModel::HEADING_BOTTOM} = $request->input(IceCreamParlourModel::HEADING_BOTTOM);
                $check->{IceCreamParlourModel::SLIDE_STATUS} = $request->input(IceCreamParlourModel::SLIDE_STATUS);
                $check->{IceCreamParlourModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    // public function enableDisableSlide(IceCreamParlourRequest $request){
    //     $check = IceCreamParlourModel::find($request->input(IceCreamParlourModel::ID));
    //     if($check){
    //         $check->{IceCreamParlourModel::UPDATED_BY} = Auth::user()->id;
    //         if($request->input("action")=="enable"){
    //             $check->{IceCreamParlourModel::SLIDE_STATUS} = IceCreamParlourModel::SLIDE_STATUS_LIVE;
    //             $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
    //         }else{
    //             $check->{IceCreamParlourModel::SLIDE_STATUS} = IceCreamParlourModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
    //         }
    //         $this->forgetSlides();
    //         $check->save();
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
    //     }
    //     return $return;
    // }
    public function enableDisableSlide(IceCreamParlourRequest $request) {
        $check = IceCreamParlourModel::find($request->input(IceCreamParlourModel::ID));
        
        if ($check) {
            $check->{IceCreamParlourModel::UPDATED_BY} = Auth::user()->id;
            
            if ($request->input("action") == "enable") {
                $check->{IceCreamParlourModel::SLIDE_STATUS} = IceCreamParlourModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
            } else {
                $check->{IceCreamParlourModel::SLIDE_STATUS} = IceCreamParlourModel::SLIDE_STATUS_DISABLED;
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
