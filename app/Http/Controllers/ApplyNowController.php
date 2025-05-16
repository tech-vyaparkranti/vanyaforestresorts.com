<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyNowRequest;
use App\Models\ApplyNow;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ApplyNowController extends Controller
{
    use CommonFunctions;
    use ResponseAPI;

    public function enquiryDetails(ApplyNowRequest $request){
        try{
            
            $check = ApplyNow::where([
                [ApplyNow::EMAIL,$request->input(ApplyNow::EMAIL)],
                [ApplyNow::PHONE_NUMBER,$request->input(ApplyNow::PHONE_NUMBER)],
            ])->whereRaw("date(created_at)=date(now())")->first();
            if($check){
                $response = $this->error("You alread sent a message for today.");
            }else{
                $newEnquiry = new ApplyNow();
                $newEnquiry->{ApplyNow::NAME} = $request->input(ApplyNow::NAME);
                $newEnquiry->{ApplyNow::EMAIL} = $request->input(ApplyNow::EMAIL);
                $newEnquiry->{ApplyNow::PHONE_NUMBER} = $request->input(ApplyNow::PHONE_NUMBER);
                $newEnquiry->{ApplyNow::EXPERIENCE} = $request->input(ApplyNow::EXPERIENCE);
                $newEnquiry->{ApplyNow::TITLE} = $request->input(ApplyNow::TITLE);
                $newEnquiry->{ApplyNow::COMPANY} = $request->input(ApplyNow::COMPANY);
                $newEnquiry->{ApplyNow::QUALIFICATIONS} = $request->input(ApplyNow::QUALIFICATIONS);
                $newEnquiry->{ApplyNow::MESSAGE} = $request->input(ApplyNow::MESSAGE);
                $newEnquiry->save();
                $response = $this->success("Thank you for your message. We will contact you shortly.",[]);
            }
        }catch(Exception $exception){
            report($exception);
            $response = $this->error("Something went wrong. ".$exception->getMessage());
        }
        return $response;
    }

    public function enquiryAdminPage(){
        return view("Dashboard.Pages.applyNow");
    }

    public function enquiryDataTable(){
        
        $query = ApplyNow::select(
            ApplyNow::ID,
            ApplyNow::NAME,             
            ApplyNow::EMAIL,
            ApplyNow::PHONE_NUMBER,
            ApplyNow::EXPERIENCE,
            ApplyNow::TITLE,
            ApplyNow::COMPANY,
            ApplyNow::QUALIFICATIONS,
            ApplyNow::MESSAGE,
            DB::raw('DATE_FORMAT('.ApplyNow::CREATED_AT.', "%W %M %e %Y %r") as created_at_formatted')
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}
