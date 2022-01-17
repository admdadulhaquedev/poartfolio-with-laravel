<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(){
        DB::table('users')->insert([
            "name" => "Amdadul Haque Melon",
            "email" => "amdadulhaquemelon15442@gmail.com",
            "photo" => "default-user.png",
            "dateOfbirth" => Carbon::now(),
            "address" => "Dhaka, Bangladesh",
            "phone" => "+8801575583122",
            "password" => Hash::make("admin@gmail.com"),
            "about_me" => "I am a person who is positive about every aspect of life. I demonstrate excellent skills in communication and collaboration. Most of all I am committed to achieving my targets",
            "role" => 1,
            "created_at" => Carbon::now(),
        ]);
    }

}
