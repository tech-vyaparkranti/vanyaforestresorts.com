<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingEnquiry extends Model
{
    use HasFactory;

    // Specify the table name (optional, Laravel will assume 'wedding_enquiries' by default)
    protected $table = 'wedding_enquiries';

    // Define which fields can be mass-assigned
    protected $fillable = [
        'first_name',
        'phone_number',
        'check_in_date',
        'check_out_date',
        'capacity',
        'food',
        'message',
        'country_code',
        'ip_address',  // Add ip_address
        'user_agent',  // Add user_agent
    ];

    // Optionally, if you want to format the date fields, you can use the $dates property
    protected $dates = [
        'check_in_date',
        'check_out_date',
        'created_at',
        'updated_at',
    ];
}
