<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyNowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_now', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->string("email")->index("enquiry_email");
            $table->string("phone_number","20")->index("phone_number_index");
            $table->string("experience");
            $table->string("title");
            $table->string("company");
            $table->string("qualifications");
            $table->text("message");
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
        // Schema::dropIfExists('apply_now');
    }
}
