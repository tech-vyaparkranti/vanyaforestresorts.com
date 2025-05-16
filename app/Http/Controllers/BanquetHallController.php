<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanquetHallRequest;
use App\Models\BanquetHallModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BanquetHallController extends Controller
{
    use CommonFunctions;
    //

    public function banquetHallSlider(){
        return view("Dashboard.Pages.manageBanquetHall");
    }

    public function banquetHallData(){
        $query = BanquetHallModel::select(BanquetHallModel::IMAGE,
        BanquetHallModel::ID,
        BanquetHallModel::HEADING_TOP,
        BanquetHallModel::HEADING_BOTTOM,
        BanquetHallModel::HEADING_MIDDLE,
        BanquetHallModel::SLIDE_SORTING,
        BanquetHallModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{BanquetHallModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{BanquetHallModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{BanquetHallModel::SLIDE_STATUS}==BanquetHallModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function banquetHallSaveSlide(BanquetHallRequest $request){
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

    public function insertSlide(BanquetHallRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $BanquetHallModel = new BanquetHallModel();
            $BanquetHallModel->{BanquetHallModel::IMAGE} = $imageUpload["data"];
            $BanquetHallModel->{BanquetHallModel::HEADING_TOP} = $request->input(BanquetHallModel::HEADING_TOP);
            $BanquetHallModel->{BanquetHallModel::HEADING_MIDDLE} = $request->input(BanquetHallModel::HEADING_MIDDLE);
            $BanquetHallModel->{BanquetHallModel::HEADING_BOTTOM} = $request->input(BanquetHallModel::HEADING_BOTTOM);
            $BanquetHallModel->{BanquetHallModel::SLIDE_STATUS} = $request->input(BanquetHallModel::SLIDE_STATUS);
            $BanquetHallModel->{BanquetHallModel::SLIDE_SORTING} = $request->input(BanquetHallModel::SLIDE_SORTING);           
            $BanquetHallModel->{BanquetHallModel::STATUS} = 1;
            $BanquetHallModel->{BanquetHallModel::CREATED_BY} = Auth::user()->id;
            $BanquetHallModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(BanquetHallRequest $request){
        $maxId = BanquetHallModel::max(BanquetHallModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(BanquetHallRequest $request){
        $check = BanquetHallModel::where([BanquetHallModel::ID=>$request->input(BanquetHallModel::ID),BanquetHallModel::STATUS=>1])->first();
        if($check){
            if($request->input(BanquetHallModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{BanquetHallModel::IMAGE} = $imageUpload["data"];
                    $check->{BanquetHallModel::SLIDE_SORTING} = $request->input(BanquetHallModel::SLIDE_SORTING);
                    $check->{BanquetHallModel::HEADING_TOP} = $request->input(BanquetHallModel::HEADING_TOP);
                    $check->{BanquetHallModel::HEADING_MIDDLE} = $request->input(BanquetHallModel::HEADING_MIDDLE);
                    $check->{BanquetHallModel::HEADING_BOTTOM} = $request->input(BanquetHallModel::HEADING_BOTTOM);
                    $check->{BanquetHallModel::SLIDE_STATUS} = $request->input(BanquetHallModel::SLIDE_STATUS);
                    $check->{BanquetHallModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{BanquetHallModel::SLIDE_SORTING} = $request->input(BanquetHallModel::SLIDE_SORTING);
                $check->{BanquetHallModel::HEADING_TOP} = $request->input(BanquetHallModel::HEADING_TOP);
                $check->{BanquetHallModel::HEADING_MIDDLE} = $request->input(BanquetHallModel::HEADING_MIDDLE);
                $check->{BanquetHallModel::HEADING_BOTTOM} = $request->input(BanquetHallModel::HEADING_BOTTOM);
                $check->{BanquetHallModel::SLIDE_STATUS} = $request->input(BanquetHallModel::SLIDE_STATUS);
                $check->{BanquetHallModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    // public function enableDisableSlide(BanquetHallRequest $request){
    //     $check = BanquetHallModel::find($request->input(BanquetHallModel::ID));
    //     if($check){
    //         $check->{BanquetHallModel::UPDATED_BY} = Auth::user()->id;
    //         if($request->input("action")=="enable"){
    //             $check->{BanquetHallModel::SLIDE_STATUS} = BanquetHallModel::SLIDE_STATUS_LIVE;
    //             $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
    //         }else{
    //             $check->{BanquetHallModel::SLIDE_STATUS} = BanquetHallModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
    //         }
    //         $this->forgetSlides();
    //         $check->save();
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
    //     }
    //     return $return;
    // }
    public function enableDisableSlide(BanquetHallRequest $request) {
        $check = BanquetHallModel::find($request->input(BanquetHallModel::ID));
        
        if ($check) {
            $check->{BanquetHallModel::UPDATED_BY} = Auth::user()->id;
            
            if ($request->input("action") == "enable") {
                $check->{BanquetHallModel::SLIDE_STATUS} = BanquetHallModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
            } else {
                $check->{BanquetHallModel::SLIDE_STATUS} = BanquetHallModel::SLIDE_STATUS_DISABLED;
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
