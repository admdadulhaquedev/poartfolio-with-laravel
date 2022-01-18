<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("logo");
            $table->integer("category_id");
            $table->integer("images_id");
            $table->string("slug")->uniqid();
            $table->integer("status")->default(0)->comment("0=Deactive,1=Active");
            $table->bigInteger("project_views")->unsigned()->default(0);
            $table->bigInteger("project_link")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('portfolios');
    }
}
