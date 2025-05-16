<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryForm extends Model
{
    use HasFactory;

    protected $table = "enquiry_form";


    const ID = "id";
    const NAME = "name";
    const EMAIL = "email";
    const PHONE_NUMBER = "phone_number";
    const MESSAGE = "message";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
