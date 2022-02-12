<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContactInfoSeeder extends Seeder{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {
        DB::table('contact_infos')->insert([
            "email" => "amdadulhaquemelon15442@gmail.com",
            "whatsApp" => "+8801617253586",
            "phone" => "+8801575583122",
            "address" => "Dhaka, Bangladesh",
            "contact_info_text" => "Thank you for visiting! Got questions? Want to connect with us? We are here to help. Choose the method that works best for you. We look forward to hearing from you.",
            "created_at" => Carbon::now(),
        ]);

    }

}
