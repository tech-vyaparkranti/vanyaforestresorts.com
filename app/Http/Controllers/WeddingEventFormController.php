<?php

namespace App\Http\Controllers;

use App\Models\WeddingEventForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class WeddingEventFormController extends Controller
{
    // Show the wedding event form
    public function showForm()
    {
        return view('HomePage.eventsweddings');
    }

    public function eventenquiryView()
    {
        return view('Dashboard.Pages.eventenquiryView'); // Adjust to your Blade view location
    }
    // Store wedding event form data
    public function store(Request $request)
{
    // Validate the form input
    $validator = Validator::make($request->all(), [
        'checkin' => 'required|date',
        'checkout' => 'required|date',
        'guests' => 'required|string',
        'occasion' => 'required|string',
        'budget' => 'required|string',
        'food_preference' => 'required|string',
        'mobile' => 'required|digits:10',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Create a new form entry
    WeddingEventForm::create([
        'checkin' => $request->checkin,
        'checkout' => $request->checkout,
        'guests' => $request->guests,
        'occasion' => $request->occasion,
        'budget' => $request->budget,
        'food_preference' => $request->food_preference,
        'mobile' => $request->mobile,
    ]);
    
    // Redirect back with success message
    return redirect()->route('weddingeventform.form')->with('success', 'Thank you for submitting your event details!');
}

public function geteventEnquiry(Request $request)
    {
        $query = WeddingEventForm::select('id', 'mobile', 'checkin', 'checkout','guests','occasion','budget','food_preference', 'created_at');
    
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
