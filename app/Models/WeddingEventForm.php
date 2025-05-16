<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingEventForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkin',
        'checkout',
        'guests',
        'occasion',
        'budget',
        'food_preference',
        'mobile',
    ];
}
