<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model{
    use HasFactory;
    protected $fillable = [
        'email',
        'whatsApp',
        'phone',
        'address',
        'contact_info_text',
    ];
}
