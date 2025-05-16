<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyNow extends Model
{
    use HasFactory;

    protected $table = "apply_now";


    const ID = "id";
    const NAME = "name";
    const EMAIL = "email";
    const PHONE_NUMBER = "phone_number";
    const EXPERIENCE = "experience";
    const TITLE = "title";
    const COMPANY = "company";
    const QUALIFICATIONS = "qualifications";
    const MESSAGE = "message";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
