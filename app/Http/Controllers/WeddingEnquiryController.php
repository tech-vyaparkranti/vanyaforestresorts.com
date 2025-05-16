<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeddingEnquiryRequest;
use App\Models\WeddingEnquiry;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WeddingEnquiryController extends Controller
{
    use CommonFunctions;
    use ResponseAPI;

    public function weddingenquiryView()
    {
        return view('Dashboard.Pages.weddingenquiry'); // Adjust to your Blade view location
    }
    public function store(WeddingEnquiryRequest $request)
{
    try {
        // Create a new enquiry entry
        $newEnquiry = new WeddingEnquiry();
        $newEnquiry->first_name = $request->input('first_name');
        $newEnquiry->country_code = $request->input('country_code');
        $newEnquiry->phone_number = $request->input('phone_number');
        $newEnquiry->message = $request->input('message');
        $newEnquiry->check_in_date = $request->input('check_in_date');
        $newEnquiry->check_out_date = $request->input('check_out_date');
        $newEnquiry->capacity = $request->input('capacity');
        $newEnquiry->food = $request->input('food');
        $newEnquiry->ip_address = $this->getIp();
        $newEnquiry->user_agent = $request->userAgent();

        // Save the enquiry in the database
        if ($newEnquiry->save()) {
            // Return success response
            return response()->json([
                'status' => true,
                'message' => 'Thank you for your enquiry. We will contact you shortly.'
            ]);
        } else {
            // If save failed, return a generic error message
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.'
            ]);
        }
    } catch (\Exception $exception) {
        // Catch any errors and report them
        report($exception);

        // Log the exception for debugging (Optional)
        Log::error("Exception occurred while storing wedding enquiry", ['exception' => $exception]);

        // Return a generic error message
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong. Please try again.'
        ]);
    }
}


    public function getWeddingEnquiry(Request $request)
    {
        $query = WeddingEnquiry::select('id', 'first_name', 'phone_number', 'check_in_date', 'check_out_date','capacity','food','message', 'created_at');
    
        $data = $query->get()->map(function ($row) {
            // Convert 'created_at' to Asia/Kolkata timezone and format it
            $row->created_at = Carbon::parse($row->created_at)->timezone('Asia/Kolkata')->format('Y-m-d H:i:s');
            return $row;
        });
    
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="javascript:void(0)" onclick="deleteEnquiry(' . $row->id . ')" class="btn btn-danger btn-sm">Delete</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
}
