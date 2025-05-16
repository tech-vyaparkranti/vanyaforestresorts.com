<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndoorEventsRequest;
use App\Models\IndoorEventsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class IndoorEventsController extends Controller
{
    use CommonFunctions;
    //

    public function indoorEventsslider(){
        return view("Dashboard.Pages.indoorEvents");
    }

    public function indoorEventsData(){
        try{
            $query = IndoorEventsModel::select(IndoorEventsModel::IMAGE,
        IndoorEventsModel::ID,
        IndoorEventsModel::HEADING_TOP,
        // IndoorEventsModel::HEADING_BOTTOM,
        IndoorEventsModel::HEADING_MIDDLE,
        IndoorEventsModel::SLIDE_SORTING,
        IndoorEventsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{IndoorEventsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{IndoorEventsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{IndoorEventsModel::SLIDE_STATUS}==IndoorEventsModel::SLIDE_STATUS_DISABLED){
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

    public function saveindoorEvents(IndoorEventsRequest $request){
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

    public function insertSlide(IndoorEventsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $IndoorEventsModel = new IndoorEventsModel();
            $IndoorEventsModel->{IndoorEventsModel::IMAGE} = $imageUpload["data"];
            $IndoorEventsModel->{IndoorEventsModel::HEADING_TOP} = $request->input(IndoorEventsModel::HEADING_TOP);
            $IndoorEventsModel->{IndoorEventsModel::HEADING_MIDDLE} = $request->input(IndoorEventsModel::HEADING_MIDDLE);
            // $IndoorEventsModel->{IndoorEventsModel::HEADING_BOTTOM} = $request->input(IndoorEventsModel::HEADING_BOTTOM);
            $IndoorEventsModel->{IndoorEventsModel::SLIDE_STATUS} = $request->input(IndoorEventsModel::SLIDE_STATUS);
            $IndoorEventsModel->{IndoorEventsModel::SLIDE_SORTING} = $request->input(IndoorEventsModel::SLIDE_SORTING);           
            $IndoorEventsModel->{IndoorEventsModel::STATUS} = 1;
            $IndoorEventsModel->{IndoorEventsModel::CREATED_BY} = Auth::user()->id;
            $IndoorEventsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(IndoorEventsRequest $request){
        $maxId = IndoorEventsModel::max(IndoorEventsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(IndoorEventsRequest $request){
        $check = IndoorEventsModel::where([IndoorEventsModel::ID=>$request->input(IndoorEventsModel::ID),IndoorEventsModel::STATUS=>1])->first();
        if($check){
            if($request->input(IndoorEventsModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{IndoorEventsModel::IMAGE} = $imageUpload["data"];
                    $check->{IndoorEventsModel::SLIDE_SORTING} = $request->input(IndoorEventsModel::SLIDE_SORTING);
                    $check->{IndoorEventsModel::HEADING_TOP} = $request->input(IndoorEventsModel::HEADING_TOP);
                    $check->{IndoorEventsModel::HEADING_MIDDLE} = $request->input(IndoorEventsModel::HEADING_MIDDLE);
                    // $check->{IndoorEventsModel::HEADING_BOTTOM} = $request->input(IndoorEventsModel::HEADING_BOTTOM);
                    $check->{IndoorEventsModel::SLIDE_STATUS} = $request->input(IndoorEventsModel::SLIDE_STATUS);
                    $check->{IndoorEventsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{IndoorEventsModel::SLIDE_SORTING} = $request->input(IndoorEventsModel::SLIDE_SORTING);
                $check->{IndoorEventsModel::HEADING_TOP} = $request->input(IndoorEventsModel::HEADING_TOP);
                $check->{IndoorEventsModel::HEADING_MIDDLE} = $request->input(IndoorEventsModel::HEADING_MIDDLE);
                // $check->{IndoorEventsModel::HEADING_BOTTOM} = $request->input(IndoorEventsModel::HEADING_BOTTOM);
                $check->{IndoorEventsModel::SLIDE_STATUS} = $request->input(IndoorEventsModel::SLIDE_STATUS);
                $check->{IndoorEventsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(IndoorEventsRequest $request){
        $check = IndoorEventsModel::find($request->input(IndoorEventsModel::ID));
        if($check){
            $check->{IndoorEventsModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{IndoorEventsModel::SLIDE_STATUS} = IndoorEventsModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{IndoorEventsModel::SLIDE_STATUS} = IndoorEventsModel::SLIDE_STATUS_DISABLED;
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
