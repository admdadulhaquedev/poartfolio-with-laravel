<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model{
    use HasFactory;

    protected $fillable = [
        "website_name",
        "favicon",
        "header_logo",
        "sticky_logo",
        "mobile_logo",
        "footer_logo",
        'about_us'
    ];

}
