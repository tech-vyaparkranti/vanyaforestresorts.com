<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    use CommonFunctions;
    //

    public function blogSlider(){
        return view("Dashboard.Pages.manageBlog");
    }

    public function blogData(){
        try{
            $query = Blog::select(Blog::IMAGE,
        Blog::ID,
        Blog::TITLE,
        Blog::CONTENT,
        Blog::SHORT_CONTENT,
        Blog::META_KEYWORD,
        Blog::META_TITLE,
        Blog::META_DESCRIPTION,
        Blog::FACEBOOK_LINK,
        Blog::TWITTER_LINK,
        Blog::INSTAGRAM_LINK,
        Blog::YOUTUBE_LINK,
        Blog::SLIDE_SORTING,
        Blog::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{Blog::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{Blog::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{Blog::SLIDE_STATUS}==Blog::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->addColumn('content_row', function ($row) {
                return $this->getModal(
                    $row->id,
                    $row->content ?? " ",
                    'View Loan Details',
                    $row->title ?? "Loan Title"
                );
            })
            
            ->rawColumns(['action', 'content', 'content_row'])
            ->make(true);
            // ->rawColumns(['action'])
            // ->make(true);
        }
        catch(Exception $except){
            dd([$except->getMessage()]);
        }
    }

    public function saveBlog(BlogRequest $request){
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

    public function insertSlide(BlogRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $Blog = new Blog();
            $Blog->{Blog::IMAGE} = $imageUpload["data"];
            $Blog->{Blog::TITLE} = $request->input(Blog::TITLE);
            $Blog->{Blog::CONTENT} = $request->input(Blog::CONTENT);
            $Blog->{Blog::SHORT_CONTENT} = $request->input(Blog::SHORT_CONTENT);
            $Blog->{Blog::META_KEYWORD} = $request->input(Blog::META_KEYWORD);
            $Blog->{Blog::META_TITLE} = $request->input(Blog::META_TITLE);
            $Blog->{Blog::META_DESCRIPTION} = $request->input(Blog::META_DESCRIPTION);
            $Blog->{Blog::FACEBOOK_LINK} = $request->input(Blog::FACEBOOK_LINK);
            $Blog->{Blog::TWITTER_LINK} = $request->input(Blog::TWITTER_LINK);
            $Blog->{Blog::INSTAGRAM_LINK} = $request->input(Blog::INSTAGRAM_LINK);
            $Blog->{Blog::YOUTUBE_LINK} = $request->input(Blog::YOUTUBE_LINK);
            $Blog->{Blog::SLIDE_STATUS} = $request->input(Blog::SLIDE_STATUS);
            $Blog->{Blog::SLIDE_SORTING} = $request->input(Blog::SLIDE_SORTING);           
            $Blog->{Blog::STATUS} = 1;
            $Blog->{Blog::CREATED_BY} = Auth::user()->id;
            $Blog->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(BlogRequest $request){
        $maxId = Blog::max(Blog::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(BlogRequest $request){
        $check = Blog::where([Blog::ID=>$request->input(Blog::ID),Blog::STATUS=>1])->first();
        if($check){
            if($request->input(Blog::IMAGE)){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{Blog::IMAGE} = $imageUpload["data"];
                    $check->{Blog::SLIDE_SORTING} = $request->input(Blog::SLIDE_SORTING);
                    $check->{Blog::TITLE} = $request->input(Blog::TITLE);
                    $check->{Blog::CONTENT} = $request->input(Blog::CONTENT);
                    $check->{Blog::SHORT_CONTENT} = $request->input(Blog::SHORT_CONTENT);
                    $check->{Blog::META_KEYWORD} = $request->input(Blog::META_KEYWORD);
                    $check->{Blog::META_TITLE} = $request->input(Blog::META_TITLE);
                    $check->{Blog::META_DESCRIPTION} = $request->input(Blog::META_DESCRIPTION);
                    $check->{Blog::FACEBOOK_LINK} = $request->input(Blog::FACEBOOK_LINK);
                    $check->{Blog::TWITTER_LINK} = $request->input(Blog::TWITTER_LINK);
                    $check->{Blog::INSTAGRAM_LINK} = $request->input(Blog::INSTAGRAM_LINK);
                    $check->{Blog::YOUTUBE_LINK} = $request->input(Blog::YOUTUBE_LINK);
                    $check->{Blog::SLIDE_STATUS} = $request->input(Blog::SLIDE_STATUS);
                    $check->{Blog::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{Blog::SLIDE_SORTING} = $request->input(Blog::SLIDE_SORTING);
                $check->{Blog::TITLE} = $request->input(Blog::TITLE);
                $check->{Blog::CONTENT} = $request->input(Blog::CONTENT);
                $check->{Blog::SHORT_CONTENT} = $request->input(Blog::SHORT_CONTENT);
                $check->{Blog::META_KEYWORD} = $request->input(Blog::META_KEYWORD);
                $check->{Blog::META_TITLE} = $request->input(Blog::META_TITLE);
                $check->{Blog::META_DESCRIPTION} = $request->input(Blog::META_DESCRIPTION);
                $check->{Blog::FACEBOOK_LINK} = $request->input(Blog::FACEBOOK_LINK);
                $check->{Blog::TWITTER_LINK} = $request->input(Blog::TWITTER_LINK);
                $check->{Blog::INSTAGRAM_LINK} = $request->input(Blog::INSTAGRAM_LINK);
                $check->{Blog::YOUTUBE_LINK} = $request->input(Blog::YOUTUBE_LINK);
                $check->{Blog::SLIDE_STATUS} = $request->input(Blog::SLIDE_STATUS);
                $check->{Blog::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(BlogRequest $request){
        $check = Blog::find($request->input(Blog::ID));
        if($check){
            $check->{Blog::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{Blog::SLIDE_STATUS} = Blog::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{Blog::SLIDE_STATUS} = Blog::SLIDE_STATUS_DISABLED;
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
