<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryFormRequest;
use App\Models\EnquiryForm;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EnquiryFormController extends Controller
{
    use CommonFunctions;
    use ResponseAPI;

    public function enquiryFormDetails(EnquiryFormRequest $request){
        try{
            
            $check = EnquiryForm::where([
                [EnquiryForm::EMAIL,$request->input(EnquiryForm::EMAIL)],
                [EnquiryForm::PHONE_NUMBER,$request->input(EnquiryForm::PHONE_NUMBER)],
            ])->whereRaw("date(created_at)=date(now())")->first();
            if($check){
                $response = $this->error("You alread sent a message for today.");
            }else{
                $newEnquiry = new EnquiryForm();
                $newEnquiry->{EnquiryForm::NAME} = $request->input(EnquiryForm::NAME);
                $newEnquiry->{EnquiryForm::EMAIL} = $request->input(EnquiryForm::EMAIL);
                $newEnquiry->{EnquiryForm::PHONE_NUMBER} = $request->input(EnquiryForm::PHONE_NUMBER);
                $newEnquiry->{EnquiryForm::MESSAGE} = $request->input(EnquiryForm::MESSAGE);
                $newEnquiry->save();
                $response = $this->success("Thank you for your message. We will contact you shortly.",[]);
            }
        }catch(Exception $exception){
            report($exception);
            $response = $this->error("Something went wrong. ".$exception->getMessage());
        }
        return $response;
    }
    public function manageEnquiryForm(){
        return view("Dashboard.Pages.manageEnquiryForm");
    }

    public function EnquiryFormData(){
        

        $query = EnquiryForm::select(
            EnquiryForm::NAME,
            EnquiryForm::EMAIL,
            EnquiryForm::PHONE_NUMBER,
            EnquiryForm::MESSAGE,
            EnquiryForm::ID,
            // DB::raw("date_format(".EnquiryForm::CREATED_AT.", '%M %d %Y %r') as created_at_date")
            DB::raw('DATE_FORMAT(CONVERT_TZ('.EnquiryForm::CREATED_AT.',"+00:00","+05:30"), "%W %M %e %Y %r") as created_at_date')
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}
