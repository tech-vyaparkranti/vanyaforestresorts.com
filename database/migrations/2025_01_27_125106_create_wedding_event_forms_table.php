<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingEventFormsTable extends Migration
{
    public function up()
    {
        Schema::create('wedding_event_forms', function (Blueprint $table) {
            $table->id();
            $table->string('checkin');
            $table->string('checkout');
            $table->string('guests');
            $table->string('occasion');
            $table->string('budget');
            $table->string('food_preference');
            $table->string('mobile');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wedding_event_forms');
    }
}
