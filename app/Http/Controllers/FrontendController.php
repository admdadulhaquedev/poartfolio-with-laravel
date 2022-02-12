<?php

namespace App\Http\Controllers;

use App\Mail\RecivedEmail;
use App\Models\ContactInfo;
use App\Models\ContactUs;
use App\Models\Portfolio;
use App\Models\SocialLink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller{

    public function __construct(){
        $this->middleware('visitor');
    }

    public function index(){

        $portfolios = Portfolio::all();
        $contuct_info = ContactInfo::first();
        $social_accounts = SocialLink::all();



        return view('frontend.index',[
            'portfolios' => $portfolios,
            'contuct_info' => $contuct_info,
            'social_accounts' => $social_accounts,
        ]);
    }

    public function singleportfolio($slug){

        // $single_post = Portfolio::where('id',$id)->first();
        // $post_key = 'post_'.$single_post->id;

        // if (!Session::has($post_key)) {
        //     $single_post->increment('post_views');
        //     Session::put($post_key,1);
        // }
        return view('frontend.portfolio');
    }

    public function allportfolios(){
        return view('frontend.portfolios');
    }


    public function inboxemailrecived(Request $request){
        $email = $request->email;

        if (empty($request->email)) {
            return back()->with('emailNotValid_con', 'Email Not Valid');
        }

        Mail::to($email)->send(new RecivedEmail());


        if (Mail::failures()) {
            return back()->with('emailNotValid_con', 'Email Not Valid');

        }else{
            ContactUs::insert([
                'name' => $request->name,
                'email' => $request->email,
                'messages' => $request->note,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success_con', 'Email Send Successfully');
        }



    }



}
