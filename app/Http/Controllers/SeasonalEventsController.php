<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeasonalEventsRequest;
use App\Models\SeasonalEventsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SeasonalEventsController extends Controller
{
    use CommonFunctions;
    //

    public function seasonalEventsslider(){
        return view("Dashboard.Pages.seasonalEvents");
    }

    public function seasonalEventsData(){
        try{
            $query = SeasonalEventsModel::select(SeasonalEventsModel::IMAGE,
        SeasonalEventsModel::ID,
        SeasonalEventsModel::HEADING_TOP,
        // SeasonalEventsModel::HEADING_BOTTOM,
        SeasonalEventsModel::HEADING_MIDDLE,
        SeasonalEventsModel::SLIDE_SORTING,
        SeasonalEventsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{SeasonalEventsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{SeasonalEventsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{SeasonalEventsModel::SLIDE_STATUS}==SeasonalEventsModel::SLIDE_STATUS_DISABLED){
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

    public function saveseasonalEvents(SeasonalEventsRequest $request){
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

    public function insertSlide(SeasonalEventsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $SeasonalEventsModel = new SeasonalEventsModel();
            $SeasonalEventsModel->{SeasonalEventsModel::IMAGE} = $imageUpload["data"];
            $SeasonalEventsModel->{SeasonalEventsModel::HEADING_TOP} = $request->input(SeasonalEventsModel::HEADING_TOP);
            $SeasonalEventsModel->{SeasonalEventsModel::HEADING_MIDDLE} = $request->input(SeasonalEventsModel::HEADING_MIDDLE);
            // $SeasonalEventsModel->{SeasonalEventsModel::HEADING_BOTTOM} = $request->input(SeasonalEventsModel::HEADING_BOTTOM);
            $SeasonalEventsModel->{SeasonalEventsModel::SLIDE_STATUS} = $request->input(SeasonalEventsModel::SLIDE_STATUS);
            $SeasonalEventsModel->{SeasonalEventsModel::SLIDE_SORTING} = $request->input(SeasonalEventsModel::SLIDE_SORTING);           
            $SeasonalEventsModel->{SeasonalEventsModel::STATUS} = 1;
            $SeasonalEventsModel->{SeasonalEventsModel::CREATED_BY} = Auth::user()->id;
            $SeasonalEventsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(SeasonalEventsRequest $request){
        $maxId = SeasonalEventsModel::max(SeasonalEventsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(SeasonalEventsRequest $request){
        $check = SeasonalEventsModel::where([SeasonalEventsModel::ID=>$request->input(SeasonalEventsModel::ID),SeasonalEventsModel::STATUS=>1])->first();
        if($check){
            if($request->input(SeasonalEventsModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{SeasonalEventsModel::IMAGE} = $imageUpload["data"];
                    $check->{SeasonalEventsModel::SLIDE_SORTING} = $request->input(SeasonalEventsModel::SLIDE_SORTING);
                    $check->{SeasonalEventsModel::HEADING_TOP} = $request->input(SeasonalEventsModel::HEADING_TOP);
                    $check->{SeasonalEventsModel::HEADING_MIDDLE} = $request->input(SeasonalEventsModel::HEADING_MIDDLE);
                    // $check->{SeasonalEventsModel::HEADING_BOTTOM} = $request->input(SeasonalEventsModel::HEADING_BOTTOM);
                    $check->{SeasonalEventsModel::SLIDE_STATUS} = $request->input(SeasonalEventsModel::SLIDE_STATUS);
                    $check->{SeasonalEventsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{SeasonalEventsModel::SLIDE_SORTING} = $request->input(SeasonalEventsModel::SLIDE_SORTING);
                $check->{SeasonalEventsModel::HEADING_TOP} = $request->input(SeasonalEventsModel::HEADING_TOP);
                $check->{SeasonalEventsModel::HEADING_MIDDLE} = $request->input(SeasonalEventsModel::HEADING_MIDDLE);
                // $check->{SeasonalEventsModel::HEADING_BOTTOM} = $request->input(SeasonalEventsModel::HEADING_BOTTOM);
                $check->{SeasonalEventsModel::SLIDE_STATUS} = $request->input(SeasonalEventsModel::SLIDE_STATUS);
                $check->{SeasonalEventsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(SeasonalEventsRequest $request){
        $check = SeasonalEventsModel::find($request->input(SeasonalEventsModel::ID));
        if($check){
            $check->{SeasonalEventsModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{SeasonalEventsModel::SLIDE_STATUS} = SeasonalEventsModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{SeasonalEventsModel::SLIDE_STATUS} = SeasonalEventsModel::SLIDE_STATUS_DISABLED;
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
