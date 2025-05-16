<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutdoorEventsRequest;
use App\Models\OutdoorEventsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class OutdoorEventsController extends Controller
{
    use CommonFunctions;
    //

    public function outdoorEventsslider(){
        return view("Dashboard.Pages.outdoorEvents");
    }

    public function outdoorEventsData(){
        try{
            $query = OutdoorEventsModel::select(OutdoorEventsModel::IMAGE,
        OutdoorEventsModel::ID,
        OutdoorEventsModel::HEADING_TOP,
        // OutdoorEventsModel::HEADING_BOTTOM,
        OutdoorEventsModel::HEADING_MIDDLE,
        OutdoorEventsModel::SLIDE_SORTING,
        OutdoorEventsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{OutdoorEventsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{OutdoorEventsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{OutdoorEventsModel::SLIDE_STATUS}==OutdoorEventsModel::SLIDE_STATUS_DISABLED){
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

    public function saveoutdoorEvents(OutdoorEventsRequest $request){
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

    public function insertSlide(OutdoorEventsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $OutdoorEventsModel = new OutdoorEventsModel();
            $OutdoorEventsModel->{OutdoorEventsModel::IMAGE} = $imageUpload["data"];
            $OutdoorEventsModel->{OutdoorEventsModel::HEADING_TOP} = $request->input(OutdoorEventsModel::HEADING_TOP);
            $OutdoorEventsModel->{OutdoorEventsModel::HEADING_MIDDLE} = $request->input(OutdoorEventsModel::HEADING_MIDDLE);
            // $OutdoorEventsModel->{OutdoorEventsModel::HEADING_BOTTOM} = $request->input(OutdoorEventsModel::HEADING_BOTTOM);
            $OutdoorEventsModel->{OutdoorEventsModel::SLIDE_STATUS} = $request->input(OutdoorEventsModel::SLIDE_STATUS);
            $OutdoorEventsModel->{OutdoorEventsModel::SLIDE_SORTING} = $request->input(OutdoorEventsModel::SLIDE_SORTING);           
            $OutdoorEventsModel->{OutdoorEventsModel::STATUS} = 1;
            $OutdoorEventsModel->{OutdoorEventsModel::CREATED_BY} = Auth::user()->id;
            $OutdoorEventsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(OutdoorEventsRequest $request){
        $maxId = OutdoorEventsModel::max(OutdoorEventsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(OutdoorEventsRequest $request){
        $check = OutdoorEventsModel::where([OutdoorEventsModel::ID=>$request->input(OutdoorEventsModel::ID),OutdoorEventsModel::STATUS=>1])->first();
        if($check){
            if($request->input(OutdoorEventsModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{OutdoorEventsModel::IMAGE} = $imageUpload["data"];
                    $check->{OutdoorEventsModel::SLIDE_SORTING} = $request->input(OutdoorEventsModel::SLIDE_SORTING);
                    $check->{OutdoorEventsModel::HEADING_TOP} = $request->input(OutdoorEventsModel::HEADING_TOP);
                    $check->{OutdoorEventsModel::HEADING_MIDDLE} = $request->input(OutdoorEventsModel::HEADING_MIDDLE);
                    // $check->{OutdoorEventsModel::HEADING_BOTTOM} = $request->input(OutdoorEventsModel::HEADING_BOTTOM);
                    $check->{OutdoorEventsModel::SLIDE_STATUS} = $request->input(OutdoorEventsModel::SLIDE_STATUS);
                    $check->{OutdoorEventsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{OutdoorEventsModel::SLIDE_SORTING} = $request->input(OutdoorEventsModel::SLIDE_SORTING);
                $check->{OutdoorEventsModel::HEADING_TOP} = $request->input(OutdoorEventsModel::HEADING_TOP);
                $check->{OutdoorEventsModel::HEADING_MIDDLE} = $request->input(OutdoorEventsModel::HEADING_MIDDLE);
                // $check->{OutdoorEventsModel::HEADING_BOTTOM} = $request->input(OutdoorEventsModel::HEADING_BOTTOM);
                $check->{OutdoorEventsModel::SLIDE_STATUS} = $request->input(OutdoorEventsModel::SLIDE_STATUS);
                $check->{OutdoorEventsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(OutdoorEventsRequest $request){
        $check = OutdoorEventsModel::find($request->input(OutdoorEventsModel::ID));
        if($check){
            $check->{OutdoorEventsModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{OutdoorEventsModel::SLIDE_STATUS} = OutdoorEventsModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{OutdoorEventsModel::SLIDE_STATUS} = OutdoorEventsModel::SLIDE_STATUS_DISABLED;
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
