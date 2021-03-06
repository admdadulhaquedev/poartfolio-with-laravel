<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfosTable extends Migration{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(){
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('whatsApp')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('contact_info_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('contact_infos');
    }

}
