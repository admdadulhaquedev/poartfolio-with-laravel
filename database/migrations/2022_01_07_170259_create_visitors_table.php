<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(){
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->longText("ip");
            $table->bigInteger("visitors")->default(0)->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
    */
    public function down(){
        Schema::dropIfExists('visitors');
    }
}
