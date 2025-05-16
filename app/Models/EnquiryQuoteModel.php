<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryQuoteModel extends Model
{
    use HasFactory;

    protected $table = 'enquiry_quote'; // Name of the database table

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'checkin_date',    // Field for Check-in Date
        'checkout_date',   // Field for Check-out Date
        'no_of_guests',    // Field for Number of Guests
        'mobile',          // Field for Mobile Number
    ];
}
