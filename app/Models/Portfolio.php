<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Portfolio extends Model {
    use HasFactory,SoftDeletes;
    protected $fillable = [
        "title",
        "logo",
        "category_id",
        "images_id",
        "slug",
        "status",
        "project_views",
        "project_link"
    ];

    function relationtouser() {
        return $this->hasOne(User::class, 'id', 'auth_id');
    }

}
