<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(){
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("website_name");
            $table->string("favicon");
            $table->string("header_logo");
            $table->string("sticky_logo");
            $table->string("mobile_logo");
            $table->string("footer_logo");
            $table->string("about_us")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
    */
    public function down(){
        Schema::dropIfExists('settings');
    }
}
