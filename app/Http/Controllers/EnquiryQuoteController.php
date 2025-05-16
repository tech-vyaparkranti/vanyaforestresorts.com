<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnquiryQuoteModel;
use Yajra\DataTables\Facades\DataTables; // For DataTables integration
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryQuoteMail;
use Carbon\Carbon;

class EnquiryQuoteController extends Controller
{
    /**
     * Display the form page for submitting an enquiry quote.
     */
    public function enquiryQuoteView()
    {
        return view('Dashboard.Pages.enquiryQuote'); // Adjust to your Blade view location
    }

    /**
     * Save the enquiry quote details from the form.
     */
    public function saveEnquiryQuoteDetails(Request $request)
{
    // Validate incoming request
    $request->validate([
        'checkin' => 'required|date',
        'checkout' => 'required|date',
        'guests' => 'required|integer|min:1',
        'mobile' => 'required|digits:10',
    ]);

    // Save the data into the database
    $enquiry = new EnquiryQuoteModel();
    $enquiry->checkin_date = $request->input('checkin');
    $enquiry->checkout_date = $request->input('checkout');
    $enquiry->no_of_guests = $request->input('guests');
    $enquiry->mobile = $request->input('mobile');
    $enquiry->save();

    // Send the email with the correct data
    // try {
    //     // Use the correct variable name in the Mail function
    //     Mail::send('email.enquiry_quote', ['enquiry' => $enquiry], function ($message) {
    //         $message->to('recipient@example.com')  // Replace with the recipient email
    //                 ->subject('Enquiry Quote Details')
    //                 ->from('sender@example.com');  // Replace with the sender's email
    //     });

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been submitted successfully and email has been sent!',
        ], 200);
    // } catch (\Exception $e) {
    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Error sending email: ' . $e->getMessage(),
    //     ], 500);
    // }
}
    /**
     * Get a list of all enquiry quotes for DataTables or similar usage.
     */
    

    public function getEnquiryQuotes(Request $request)
    {
        $query = EnquiryQuoteModel::select('id', 'checkin_date', 'checkout_date', 'no_of_guests', 'mobile', 'created_at');
    
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
    
    /**
     * Delete a specific enquiry quote by ID.
     */
    public function deleteEnquiryQuote($id)
    {
        $enquiry = EnquiryQuoteModel::find($id);

        if (!$enquiry) {
            return response()->json([
                'success' => false,
                'message' => 'Enquiry not found.',
            ], 404);
        }

        $enquiry->delete();

        return response()->json([
            'success' => true,
            'message' => 'Enquiry deleted successfully.',
        ], 200);
    }
}
