<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration{
    /**
     * Run the migrations.
     * @return void
    */
    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('photo')->default("default-user.png");
            $table->string('phone')->nullable();
            $table->timestamp('dateOfbirth');
            $table->string('address')->nullable();
            $table->text('about_me')->nullable();
            $table->string('password');
            $table->string('role')->comment('1=Admin')->default('0');
            $table->integer("status")->default(1)->comment("0=Deactive,1=Active");
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
    */
    public function down(){
        Schema::dropIfExists('users');
    }
}
