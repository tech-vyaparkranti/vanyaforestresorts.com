<?php

namespace App\Http\Controllers;

use App\Http\Requests\OtherEventsRequest;
use App\Models\OtherEventsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class OtherEventsController extends Controller
{
    use CommonFunctions;
    //

    public function otherEventsslider(){
        return view("Dashboard.Pages.otherEvents");
    }

    public function otherEventsData(){
        try{
            $query = OtherEventsModel::select(OtherEventsModel::IMAGE,
        OtherEventsModel::ID,
        OtherEventsModel::HEADING_TOP,
        // OtherEventsModel::HEADING_BOTTOM,
        OtherEventsModel::HEADING_MIDDLE,
        OtherEventsModel::SLIDE_SORTING,
        OtherEventsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{OtherEventsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{OtherEventsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{OtherEventsModel::SLIDE_STATUS}==OtherEventsModel::SLIDE_STATUS_DISABLED){
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

    public function saveotherEvents(OtherEventsRequest $request){
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

    public function insertSlide(OtherEventsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $OtherEventsModel = new OtherEventsModel();
            $OtherEventsModel->{OtherEventsModel::IMAGE} = $imageUpload["data"];
            $OtherEventsModel->{OtherEventsModel::HEADING_TOP} = $request->input(OtherEventsModel::HEADING_TOP);
            $OtherEventsModel->{OtherEventsModel::HEADING_MIDDLE} = $request->input(OtherEventsModel::HEADING_MIDDLE);
            // $OtherEventsModel->{OtherEventsModel::HEADING_BOTTOM} = $request->input(OtherEventsModel::HEADING_BOTTOM);
            $OtherEventsModel->{OtherEventsModel::SLIDE_STATUS} = $request->input(OtherEventsModel::SLIDE_STATUS);
            $OtherEventsModel->{OtherEventsModel::SLIDE_SORTING} = $request->input(OtherEventsModel::SLIDE_SORTING);           
            $OtherEventsModel->{OtherEventsModel::STATUS} = 1;
            $OtherEventsModel->{OtherEventsModel::CREATED_BY} = Auth::user()->id;
            $OtherEventsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(OtherEventsRequest $request){
        $maxId = OtherEventsModel::max(OtherEventsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(OtherEventsRequest $request){
        $check = OtherEventsModel::where([OtherEventsModel::ID=>$request->input(OtherEventsModel::ID),OtherEventsModel::STATUS=>1])->first();
        if($check){
            if($request->input(OtherEventsModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{OtherEventsModel::IMAGE} = $imageUpload["data"];
                    $check->{OtherEventsModel::SLIDE_SORTING} = $request->input(OtherEventsModel::SLIDE_SORTING);
                    $check->{OtherEventsModel::HEADING_TOP} = $request->input(OtherEventsModel::HEADING_TOP);
                    $check->{OtherEventsModel::HEADING_MIDDLE} = $request->input(OtherEventsModel::HEADING_MIDDLE);
                    // $check->{OtherEventsModel::HEADING_BOTTOM} = $request->input(OtherEventsModel::HEADING_BOTTOM);
                    $check->{OtherEventsModel::SLIDE_STATUS} = $request->input(OtherEventsModel::SLIDE_STATUS);
                    $check->{OtherEventsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{OtherEventsModel::SLIDE_SORTING} = $request->input(OtherEventsModel::SLIDE_SORTING);
                $check->{OtherEventsModel::HEADING_TOP} = $request->input(OtherEventsModel::HEADING_TOP);
                $check->{OtherEventsModel::HEADING_MIDDLE} = $request->input(OtherEventsModel::HEADING_MIDDLE);
                // $check->{OtherEventsModel::HEADING_BOTTOM} = $request->input(OtherEventsModel::HEADING_BOTTOM);
                $check->{OtherEventsModel::SLIDE_STATUS} = $request->input(OtherEventsModel::SLIDE_STATUS);
                $check->{OtherEventsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(OtherEventsRequest $request){
        $check = OtherEventsModel::find($request->input(OtherEventsModel::ID));
        if($check){
            $check->{OtherEventsModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{OtherEventsModel::SLIDE_STATUS} = OtherEventsModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{OtherEventsModel::SLIDE_STATUS} = OtherEventsModel::SLIDE_STATUS_DISABLED;
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
