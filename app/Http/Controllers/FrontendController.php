<?php

namespace App\Http\Controllers;

use App\Mail\RecivedEmail;
use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\ContactUs;
use App\Models\cv;
use App\Models\Portfolio;
use App\Models\PortfoliosImages;
use App\Models\SocialLink;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller{

    public function __construct(){
        $this->middleware('visitor');
    }

    public function index(){

        $contuct_info = ContactInfo::first();
        $social_accounts = SocialLink::all();
        $categories = Category::all();
        $portfolios = Portfolio::all();
        $cv = cv::where('id',1)->first();

        return view('frontend.index',[
            'portfolios' => $portfolios,
            'contuct_info' => $contuct_info,
            'social_accounts' => $social_accounts,
            'categories' => $categories,
            'cv' => $cv,
        ]);
    }

    public function singleportfolio($slug){

        $single_portfolio = Portfolio::where('slug',$slug)->first();
        $portfolio_key = 'portfolio_'.$single_portfolio->id;

        $portfolio_images = PortfoliosImages::where('portfolio_id', $single_portfolio->id)->get();

        //   project_views
        if (!Session::has($portfolio_key)) {
            $single_portfolio->increment('project_views');
            Session::put($portfolio_key,1);
        }

        return view('frontend.portfolio',[
            'single_portfolio' => $single_portfolio,
            'portfolio_images' => $portfolio_images,
        ]);
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
