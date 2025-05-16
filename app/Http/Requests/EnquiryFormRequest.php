<?php

namespace App\Http\Requests;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EnquiryFormRequest extends FormRequest
{
    use ResponseAPI;
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
            "name"=>"required|string",
            "email"=>"required|email",
            "phone_number"=>"required|integer|digits_between:9,20",
            "message"=>"required|string",
            "captcha"=>"required|captcha",
        ];
    }

    public function messages()
    {
        return [
            "captcha.captcha"=>"Invalid captcha text.",
            "name.required"=>"Full Name is required.",
            "name.string"=>"Full Name should be string.",
            "name.string"=>"Full Name cannot be string greater than 100 characters."
        ];
    }
    
    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->getMessageBag()->first(),200));
    }
}
