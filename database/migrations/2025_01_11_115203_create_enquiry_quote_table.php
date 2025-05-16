<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryQuoteTable extends Migration
{
    public function up()
    {
        Schema::create('enquiry_quote', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->date('checkin_date'); // Check-in Date
            $table->date('checkout_date'); // Check-out Date
            $table->integer('no_of_guests'); // Number of Guests
            $table->string('mobile'); // Mobile Number
            $table->timestamps(); // Created At & Updated At
        });
    }

    public function down()
    {
        Schema::dropIfExists('enquiry_quote');
    }
}
