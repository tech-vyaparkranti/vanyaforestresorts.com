<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferPackageRequest;
use App\Models\OfferPackageModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class OfferPackageController extends Controller
{
    use CommonFunctions;
    //

    public function offerPackageslider(){
        return view("Dashboard.Pages.offerPackage");
    }

    public function offerPackageData(){
        try{
            $query = OfferPackageModel::select(OfferPackageModel::IMAGE,
        OfferPackageModel::ID,
        OfferPackageModel::HEADING_TOP,
        // OfferPackageModel::HEADING_BOTTOM,
        OfferPackageModel::HEADING_MIDDLE,
        OfferPackageModel::SLIDE_SORTING,
        OfferPackageModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{OfferPackageModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{OfferPackageModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{OfferPackageModel::SLIDE_STATUS}==OfferPackageModel::SLIDE_STATUS_DISABLED){
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

    public function saveofferPackage(OfferPackageRequest $request){
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

    public function insertSlide(OfferPackageRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $OfferPackageModel = new OfferPackageModel();
            $OfferPackageModel->{OfferPackageModel::IMAGE} = $imageUpload["data"];
            $OfferPackageModel->{OfferPackageModel::HEADING_TOP} = $request->input(OfferPackageModel::HEADING_TOP);
            $OfferPackageModel->{OfferPackageModel::HEADING_MIDDLE} = $request->input(OfferPackageModel::HEADING_MIDDLE);
            // $OfferPackageModel->{OfferPackageModel::HEADING_BOTTOM} = $request->input(OfferPackageModel::HEADING_BOTTOM);
            $OfferPackageModel->{OfferPackageModel::SLIDE_STATUS} = $request->input(OfferPackageModel::SLIDE_STATUS);
            $OfferPackageModel->{OfferPackageModel::SLIDE_SORTING} = $request->input(OfferPackageModel::SLIDE_SORTING);           
            $OfferPackageModel->{OfferPackageModel::STATUS} = 1;
            $OfferPackageModel->{OfferPackageModel::CREATED_BY} = Auth::user()->id;
            $OfferPackageModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(OfferPackageRequest $request){
        $maxId = OfferPackageModel::max(OfferPackageModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(OfferPackageRequest $request){
        $check = OfferPackageModel::where([OfferPackageModel::ID=>$request->input(OfferPackageModel::ID),OfferPackageModel::STATUS=>1])->first();
        if($check){
            if($request->input(OfferPackageModel::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{OfferPackageModel::IMAGE} = $imageUpload["data"];
                    $check->{OfferPackageModel::SLIDE_SORTING} = $request->input(OfferPackageModel::SLIDE_SORTING);
                    $check->{OfferPackageModel::HEADING_TOP} = $request->input(OfferPackageModel::HEADING_TOP);
                    $check->{OfferPackageModel::HEADING_MIDDLE} = $request->input(OfferPackageModel::HEADING_MIDDLE);
                    // $check->{OfferPackageModel::HEADING_BOTTOM} = $request->input(OfferPackageModel::HEADING_BOTTOM);
                    $check->{OfferPackageModel::SLIDE_STATUS} = $request->input(OfferPackageModel::SLIDE_STATUS);
                    $check->{OfferPackageModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{OfferPackageModel::SLIDE_SORTING} = $request->input(OfferPackageModel::SLIDE_SORTING);
                $check->{OfferPackageModel::HEADING_TOP} = $request->input(OfferPackageModel::HEADING_TOP);
                $check->{OfferPackageModel::HEADING_MIDDLE} = $request->input(OfferPackageModel::HEADING_MIDDLE);
                // $check->{OfferPackageModel::HEADING_BOTTOM} = $request->input(OfferPackageModel::HEADING_BOTTOM);
                $check->{OfferPackageModel::SLIDE_STATUS} = $request->input(OfferPackageModel::SLIDE_STATUS);
                $check->{OfferPackageModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(OfferPackageRequest $request){
        $check = OfferPackageModel::find($request->input(OfferPackageModel::ID));
        if($check){
            $check->{OfferPackageModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{OfferPackageModel::SLIDE_STATUS} = OfferPackageModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{OfferPackageModel::SLIDE_STATUS} = OfferPackageModel::SLIDE_STATUS_DISABLED;
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
