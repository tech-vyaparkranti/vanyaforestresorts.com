<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecreationalActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recreational_activities', function (Blueprint $table) {
            $table->id();
            $table->string('image',500)->nullable(false);
            $table->string('image2',500)->nullable(false);
            $table->string('image3',500)->nullable(false);
            $table->string('heading_top',500)->nullable(true)->default(null);
            $table->string('heading_middle')->nullable(true)->default(null);
            // $table->string('heading_bottom',500)->nullable(true)->default(null);
            $table->enum('slide_status',["live","disabled"])->nullable(false)->default("disabled");
            $table->integer('slide_sorting')->nullable(false)->default("1")->index("ladies_beauty_parlour_index");
            $table->tinyInteger('status')->default('1')->nullable(false);
            $table->bigInteger("created_by")->nullable(true);
            $table->bigInteger("updated_by")->nullable(true);
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
        Schema::dropIfExists('recreational_activities');
    }
}
