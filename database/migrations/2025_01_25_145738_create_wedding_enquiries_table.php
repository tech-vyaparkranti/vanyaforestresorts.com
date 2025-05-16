<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('phone_number');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->string('capacity');
            $table->string('food');
            $table->text('message');
            $table->string('country_code')->nullable(); // Optional
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wedding_enquiries');
    }
}
