<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model {
    use HasFactory,SoftDeletes;
    protected $fillable = [
        "mega_title",
        "post_description",
        "auth_id",
        "category_id",
        "sub_category_id",
        "slug",
        "meta_tags",
        "status",
        "feature_status",
        "under_review",
        "post_views",
    ];

    function relationtouser() {
        return $this->hasOne(User::class, 'id', 'auth_id');
    }

}
