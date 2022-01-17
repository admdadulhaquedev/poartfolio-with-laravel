<?php

use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\ContactUs;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SocialLink;
use Carbon\Carbon;

function Settings(){
    return Setting::all()->first();
}

function ContactInfo(){
    return ContactInfo::all()->first();
}

function SocialLinks(){
    return SocialLink::where('status', 1)->get();
}

function  Notifications(){
    return ContactUs::all();
}


function  Categories(){
    return Category::where('status', 1)->get();
}

function  CategorybyID($id){
    return Category::where('id', $id)->first();
}

function  PostByCategory($category_id){
    return Post::latest()->where('category_id', $category_id)->where('status', 1)->get();
}

function TodayDate(){
    return Carbon::now()->format('d M Y');
}
