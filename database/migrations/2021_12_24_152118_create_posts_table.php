<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("mega_title");
            $table->longText("post_description");
            $table->integer("auth_id");
            $table->integer("category_id");
            $table->integer("sub_category_id")->nullable();
            $table->string("slug")->uniqid();
            $table->string("meta_tags");
            $table->integer("status")->default(0)->comment("0=Deactive,1=Active");
            $table->integer("feature_status")->default(0)->comment("0=Normal,1=Feature");
            $table->integer("under_review")->default(0)->comment("0=Off,1=on");
            $table->bigInteger("post_views")->unsigned()->default(0);
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
        Schema::dropIfExists('posts');
    }
}
