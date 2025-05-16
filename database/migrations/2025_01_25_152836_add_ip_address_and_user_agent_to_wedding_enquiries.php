<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpAddressAndUserAgentToWeddingEnquiries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('wedding_enquiries', function (Blueprint $table) {
        $table->string('ip_address')->nullable();
        $table->string('user_agent')->nullable();
    });
}

public function down()
{
    Schema::table('wedding_enquiries', function (Blueprint $table) {
        $table->dropColumn(['ip_address', 'user_agent']);
    });
}

}
