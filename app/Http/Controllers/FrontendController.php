<?php

namespace App\Http\Controllers;

use App\Mail\RecivedEmail;
use App\Mail\SubscriberRecivedEmail;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\EmailSubscriber;
use App\Models\Post;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FrontendController extends Controller{

    public function __construct(){
        $this->middleware('visitor');
    }

    public function index(){
        return view('frontend.index');
    }

    public function portfolio($id){

        $single_post = Post::where('id',$id)->first();
        $post_key = 'post_'.$single_post->id;

        if (!Session::has($post_key)) {
            $single_post->increment('post_views');
            Session::put($post_key,1);
        }

        return view('frontend.post-details');
    }

    public function portfolios(){
        return view('frontend.portfolios');
    }



    public function inboxemailrecived(Request $request){
        $email = $request->contactEmail;

        if (empty($request->contactEmail)) {
            return back()->with('emailNotValid_con', 'Email Not Valid');
        }
        Mail::to($email)->send(new RecivedEmail());

        if (Mail::failures()) {
            return back()->with('emailNotValid_con', 'Email Not Valid');

        }else{
            ContactUs::insert([
                'name' => $request->contactName,
                'phone' => $request->contactPhone,
                'email' => $request->contactEmail,
                'messages' => $request->contactMessage,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success_con', 'Email Send Successfully');
        }





    }



}
