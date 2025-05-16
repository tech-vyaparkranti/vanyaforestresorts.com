<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeddingEnquiryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can add any additional authorization logic here
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'phone_number' => 'required|regex:/^[1-9][0-9]{9}$/', // Ensuring a valid phone number
            'check_in_date' => 'required|date|after:today',
            'check_out_date' => 'required|date|after:check_in_date', // Ensuring check-out is after check-in
            'capacity' => 'required|integer|min:1',
            'food' => 'required|in:veg,non-veg,veg-nonveg,Jain-veg',
            'message' => 'required|string',
            'captcha' => 'required|captcha', // Assuming you're using a captcha package
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please enter your first name.',
            'phone_number.required' => 'Please enter your phone number.',
            'phone_number.regex' => 'Please enter a valid phone number.',
            'check_in_date.required' => 'Please select a check-in date.',
            'check_out_date.required' => 'Please select a check-out date.',
            'capacity.required' => 'Please enter the capacity.',
            'food.required' => 'Please select the food preference.',
            'message.required' => 'Please enter a message.',
            'captcha.required' => 'Please complete the captcha.',
        ];
    }
}
