<?php

use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\ContactUs;
use App\Models\Portfolio;
use App\Models\PortfoliosImages;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\User;
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

// function  PortfoliosByCategory($category_id){
//     return Portfolio::latest()->where('category_id', $category_id)->where('status', 1)->get();
// }

function TodayDate(){
    return Carbon::now()->format('d M Y');
}


function PortfolioImagesByIDTitle($id,$title){
    return PortfoliosImages::where('portfolio_id',$id)->where('images_title',$title)->get();
}

function UserInfo(){
    return User::first();
}
