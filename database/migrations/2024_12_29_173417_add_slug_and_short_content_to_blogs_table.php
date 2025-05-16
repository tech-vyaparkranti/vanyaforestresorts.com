<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugAndShortContentToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Add the 'slug' column as a string, unique and not nullable
            $table->string('slug')->unique()->nullable(false);

            // Add the 'short_content' column with 1000 characters, nullable and default null
            $table->string('short_content', 1000)->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Drop the 'slug' and 'short_content' columns if rolling back the migration
            $table->dropColumn('slug');
            $table->dropColumn('short_content');
        });
    }
}
