<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemedEventsRequest;
use App\Models\ThemedEventsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ThemedEventsController extends Controller
{
    use CommonFunctions;
    //

    public function themedEventsslider(){
        return view("Dashboard.Pages.themedEvents");
    }

    public function themedEventsData(){
        try{
            $query = ThemedEventsModel::select(ThemedEventsModel::IMAGE,
        ThemedEventsModel::ID,
        ThemedEventsModel::HEADING_TOP,
        // ThemedEventsModel::HEADING_BOTTOM,
        ThemedEventsModel::HEADING_MIDDLE,
        ThemedEventsModel::SLIDE_SORTING,
        ThemedEventsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{ThemedEventsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{ThemedEventsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{ThemedEventsModel::SLIDE_STATUS}==ThemedEventsModel::SLIDE_STATUS_DISABLED){
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

    public function savethemedEvents(ThemedEventsRequest $request){
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

    public function insertSlide(ThemedEventsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $ThemedEventsModel = new ThemedEventsModel();
            $ThemedEventsModel->{ThemedEventsModel::IMAGE} = $imageUpload["data"];
            $ThemedEventsModel->{ThemedEventsModel::HEADING_TOP} = $request->input(ThemedEventsModel::HEADING_TOP);
            $ThemedEventsModel->{ThemedEventsModel::HEADING_MIDDLE} = $request->input(ThemedEventsModel::HEADING_MIDDLE);
            // $ThemedEventsModel->{ThemedEventsModel::HEADING_BOTTOM} = $request->input(ThemedEventsModel::HEADING_BOTTOM);
            $ThemedEventsModel->{ThemedEventsModel::SLIDE_STATUS} = $request->input(ThemedEventsModel::SLIDE_STATUS);
            $ThemedEventsModel->{ThemedEventsModel::SLIDE_SORTING} = $request->input(ThemedEventsModel::SLIDE_SORTING);           
            $ThemedEventsModel->{ThemedEventsModel::STATUS} = 1;
            $ThemedEventsModel->{ThemedEventsModel::CREATED_BY} = Auth::user()->id;
            $ThemedEventsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(ThemedEventsRequest $request){
        $maxId = ThemedEventsModel::max(ThemedEventsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(ThemedEventsRequest $request){
        $check = ThemedEventsModel::where([ThemedEventsModel::ID=>$request->input(ThemedEventsModel::ID),ThemedEventsModel::STATUS=>1])->first();
        if($check){
            if($request->input(ThemedEventsModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{ThemedEventsModel::IMAGE} = $imageUpload["data"];
                    $check->{ThemedEventsModel::SLIDE_SORTING} = $request->input(ThemedEventsModel::SLIDE_SORTING);
                    $check->{ThemedEventsModel::HEADING_TOP} = $request->input(ThemedEventsModel::HEADING_TOP);
                    $check->{ThemedEventsModel::HEADING_MIDDLE} = $request->input(ThemedEventsModel::HEADING_MIDDLE);
                    // $check->{ThemedEventsModel::HEADING_BOTTOM} = $request->input(ThemedEventsModel::HEADING_BOTTOM);
                    $check->{ThemedEventsModel::SLIDE_STATUS} = $request->input(ThemedEventsModel::SLIDE_STATUS);
                    $check->{ThemedEventsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{ThemedEventsModel::SLIDE_SORTING} = $request->input(ThemedEventsModel::SLIDE_SORTING);
                $check->{ThemedEventsModel::HEADING_TOP} = $request->input(ThemedEventsModel::HEADING_TOP);
                $check->{ThemedEventsModel::HEADING_MIDDLE} = $request->input(ThemedEventsModel::HEADING_MIDDLE);
                // $check->{ThemedEventsModel::HEADING_BOTTOM} = $request->input(ThemedEventsModel::HEADING_BOTTOM);
                $check->{ThemedEventsModel::SLIDE_STATUS} = $request->input(ThemedEventsModel::SLIDE_STATUS);
                $check->{ThemedEventsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(ThemedEventsRequest $request){
        $check = ThemedEventsModel::find($request->input(ThemedEventsModel::ID));
        if($check){
            $check->{ThemedEventsModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{ThemedEventsModel::SLIDE_STATUS} = ThemedEventsModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{ThemedEventsModel::SLIDE_STATUS} = ThemedEventsModel::SLIDE_STATUS_DISABLED;
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
