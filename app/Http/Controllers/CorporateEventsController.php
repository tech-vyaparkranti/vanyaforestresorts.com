<?php

namespace App\Http\Controllers;

use App\Http\Requests\CorporateEventsRequest;
use App\Models\CorporateEventsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CorporateEventsController extends Controller
{
    use CommonFunctions;
    //

    public function corporateEventsslider(){
        return view("Dashboard.Pages.corporateEvents");
    }

    public function corporateEventsData(){
        try{
            $query = CorporateEventsModel::select(CorporateEventsModel::IMAGE,
        CorporateEventsModel::ID,
        CorporateEventsModel::HEADING_TOP,
        // CorporateEventsModel::HEADING_BOTTOM,
        CorporateEventsModel::HEADING_MIDDLE,
        CorporateEventsModel::SLIDE_SORTING,
        CorporateEventsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{CorporateEventsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{CorporateEventsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{CorporateEventsModel::SLIDE_STATUS}==CorporateEventsModel::SLIDE_STATUS_DISABLED){
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

    public function savecorporateEvents(CorporateEventsRequest $request){
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

    public function insertSlide(CorporateEventsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $CorporateEventsModel = new CorporateEventsModel();
            $CorporateEventsModel->{CorporateEventsModel::IMAGE} = $imageUpload["data"];
            $CorporateEventsModel->{CorporateEventsModel::HEADING_TOP} = $request->input(CorporateEventsModel::HEADING_TOP);
            $CorporateEventsModel->{CorporateEventsModel::HEADING_MIDDLE} = $request->input(CorporateEventsModel::HEADING_MIDDLE);
            // $CorporateEventsModel->{CorporateEventsModel::HEADING_BOTTOM} = $request->input(CorporateEventsModel::HEADING_BOTTOM);
            $CorporateEventsModel->{CorporateEventsModel::SLIDE_STATUS} = $request->input(CorporateEventsModel::SLIDE_STATUS);
            $CorporateEventsModel->{CorporateEventsModel::SLIDE_SORTING} = $request->input(CorporateEventsModel::SLIDE_SORTING);           
            $CorporateEventsModel->{CorporateEventsModel::STATUS} = 1;
            $CorporateEventsModel->{CorporateEventsModel::CREATED_BY} = Auth::user()->id;
            $CorporateEventsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(CorporateEventsRequest $request){
        $maxId = CorporateEventsModel::max(CorporateEventsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(CorporateEventsRequest $request){
        $check = CorporateEventsModel::where([CorporateEventsModel::ID=>$request->input(CorporateEventsModel::ID),CorporateEventsModel::STATUS=>1])->first();
        if($check){
            if($request->input(CorporateEventsModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{CorporateEventsModel::IMAGE} = $imageUpload["data"];
                    $check->{CorporateEventsModel::SLIDE_SORTING} = $request->input(CorporateEventsModel::SLIDE_SORTING);
                    $check->{CorporateEventsModel::HEADING_TOP} = $request->input(CorporateEventsModel::HEADING_TOP);
                    $check->{CorporateEventsModel::HEADING_MIDDLE} = $request->input(CorporateEventsModel::HEADING_MIDDLE);
                    // $check->{CorporateEventsModel::HEADING_BOTTOM} = $request->input(CorporateEventsModel::HEADING_BOTTOM);
                    $check->{CorporateEventsModel::SLIDE_STATUS} = $request->input(CorporateEventsModel::SLIDE_STATUS);
                    $check->{CorporateEventsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{CorporateEventsModel::SLIDE_SORTING} = $request->input(CorporateEventsModel::SLIDE_SORTING);
                $check->{CorporateEventsModel::HEADING_TOP} = $request->input(CorporateEventsModel::HEADING_TOP);
                $check->{CorporateEventsModel::HEADING_MIDDLE} = $request->input(CorporateEventsModel::HEADING_MIDDLE);
                // $check->{CorporateEventsModel::HEADING_BOTTOM} = $request->input(CorporateEventsModel::HEADING_BOTTOM);
                $check->{CorporateEventsModel::SLIDE_STATUS} = $request->input(CorporateEventsModel::SLIDE_STATUS);
                $check->{CorporateEventsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(CorporateEventsRequest $request){
        $check = CorporateEventsModel::find($request->input(CorporateEventsModel::ID));
        if($check){
            $check->{CorporateEventsModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{CorporateEventsModel::SLIDE_STATUS} = CorporateEventsModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{CorporateEventsModel::SLIDE_STATUS} = CorporateEventsModel::SLIDE_STATUS_DISABLED;
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
