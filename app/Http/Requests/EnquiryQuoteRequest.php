<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'from' => 'nullable|string|max:255',
            // 'to' => 'nullable|string|max:255',
            // 'full_name' => 'required|string|max:255',
            // 'phone' => 'required|string|max:100',
            // 'email' => 'nullable|email',
            // 'message' => 'nullable|string',
            // 'city' => 'required|in:Within City,Outside City',
        ];
    }
}
