<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder{
    /**
     * Run the database seeds.
     * @return void
    */
    public function run() {
        DB::table('settings')->insert([
            "website_name" => env('APP_NAME'),
            "favicon" => "favicon.png",
            "header_logo" => "header-logo.png",
            "sticky_logo" => "sticky-logo.png",
            "mobile_logo" => "mobile-logo.png",
            "footer_logo" => "footer-logo.png",
            "about_us" => "Hello Everyone, Wellcome",
            "created_at" => Carbon::now(),
        ]);

    }
}
