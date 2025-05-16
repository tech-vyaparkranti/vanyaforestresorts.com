<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeddingAndSocialEventsRequest;
use App\Models\WeddingAndSocialEventsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class WeddingAndSocialEventsController extends Controller
{
    use CommonFunctions;
    //

    public function weddingAndSocialEventsslider(){
        return view("Dashboard.Pages.weddingAndSocialEvents");
    }

    public function weddingAndSocialEventsData(){
        try{
            $query = WeddingAndSocialEventsModel::select(WeddingAndSocialEventsModel::IMAGE,
        WeddingAndSocialEventsModel::ID,
        WeddingAndSocialEventsModel::HEADING_TOP,
        // WeddingAndSocialEventsModel::HEADING_BOTTOM,
        WeddingAndSocialEventsModel::HEADING_MIDDLE,
        WeddingAndSocialEventsModel::SLIDE_SORTING,
        WeddingAndSocialEventsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{WeddingAndSocialEventsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{WeddingAndSocialEventsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{WeddingAndSocialEventsModel::SLIDE_STATUS}==WeddingAndSocialEventsModel::SLIDE_STATUS_DISABLED){
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

    public function saveweddingAndSocialEvents(WeddingAndSocialEventsRequest $request){
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

    public function insertSlide(WeddingAndSocialEventsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $WeddingAndSocialEventsModel = new WeddingAndSocialEventsModel();
            $WeddingAndSocialEventsModel->{WeddingAndSocialEventsModel::IMAGE} = $imageUpload["data"];
            $WeddingAndSocialEventsModel->{WeddingAndSocialEventsModel::HEADING_TOP} = $request->input(WeddingAndSocialEventsModel::HEADING_TOP);
            $WeddingAndSocialEventsModel->{WeddingAndSocialEventsModel::HEADING_MIDDLE} = $request->input(WeddingAndSocialEventsModel::HEADING_MIDDLE);
            // $WeddingAndSocialEventsModel->{WeddingAndSocialEventsModel::HEADING_BOTTOM} = $request->input(WeddingAndSocialEventsModel::HEADING_BOTTOM);
            $WeddingAndSocialEventsModel->{WeddingAndSocialEventsModel::SLIDE_STATUS} = $request->input(WeddingAndSocialEventsModel::SLIDE_STATUS);
            $WeddingAndSocialEventsModel->{WeddingAndSocialEventsModel::SLIDE_SORTING} = $request->input(WeddingAndSocialEventsModel::SLIDE_SORTING);           
            $WeddingAndSocialEventsModel->{WeddingAndSocialEventsModel::STATUS} = 1;
            $WeddingAndSocialEventsModel->{WeddingAndSocialEventsModel::CREATED_BY} = Auth::user()->id;
            $WeddingAndSocialEventsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(WeddingAndSocialEventsRequest $request){
        $maxId = WeddingAndSocialEventsModel::max(WeddingAndSocialEventsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(WeddingAndSocialEventsRequest $request){
        $check = WeddingAndSocialEventsModel::where([WeddingAndSocialEventsModel::ID=>$request->input(WeddingAndSocialEventsModel::ID),WeddingAndSocialEventsModel::STATUS=>1])->first();
        if($check){
            if($request->input(WeddingAndSocialEventsModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{WeddingAndSocialEventsModel::IMAGE} = $imageUpload["data"];
                    $check->{WeddingAndSocialEventsModel::SLIDE_SORTING} = $request->input(WeddingAndSocialEventsModel::SLIDE_SORTING);
                    $check->{WeddingAndSocialEventsModel::HEADING_TOP} = $request->input(WeddingAndSocialEventsModel::HEADING_TOP);
                    $check->{WeddingAndSocialEventsModel::HEADING_MIDDLE} = $request->input(WeddingAndSocialEventsModel::HEADING_MIDDLE);
                    // $check->{WeddingAndSocialEventsModel::HEADING_BOTTOM} = $request->input(WeddingAndSocialEventsModel::HEADING_BOTTOM);
                    $check->{WeddingAndSocialEventsModel::SLIDE_STATUS} = $request->input(WeddingAndSocialEventsModel::SLIDE_STATUS);
                    $check->{WeddingAndSocialEventsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{WeddingAndSocialEventsModel::SLIDE_SORTING} = $request->input(WeddingAndSocialEventsModel::SLIDE_SORTING);
                $check->{WeddingAndSocialEventsModel::HEADING_TOP} = $request->input(WeddingAndSocialEventsModel::HEADING_TOP);
                $check->{WeddingAndSocialEventsModel::HEADING_MIDDLE} = $request->input(WeddingAndSocialEventsModel::HEADING_MIDDLE);
                // $check->{WeddingAndSocialEventsModel::HEADING_BOTTOM} = $request->input(WeddingAndSocialEventsModel::HEADING_BOTTOM);
                $check->{WeddingAndSocialEventsModel::SLIDE_STATUS} = $request->input(WeddingAndSocialEventsModel::SLIDE_STATUS);
                $check->{WeddingAndSocialEventsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(WeddingAndSocialEventsRequest $request){
        $check = WeddingAndSocialEventsModel::find($request->input(WeddingAndSocialEventsModel::ID));
        if($check){
            $check->{WeddingAndSocialEventsModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{WeddingAndSocialEventsModel::SLIDE_STATUS} = WeddingAndSocialEventsModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{WeddingAndSocialEventsModel::SLIDE_STATUS} = WeddingAndSocialEventsModel::SLIDE_STATUS_DISABLED;
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
