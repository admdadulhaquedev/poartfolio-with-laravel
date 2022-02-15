<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\PortfoliosImages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
class PortfolioController extends Controller{

    public function __construct(){
        // $this->middleware(['auth','verified']);
        $this->middleware(['auth']);
    }

    public function index(){

        $all_portfolio = Portfolio::where('status', 1)->get();
        return view('backend.portfolio.index',[
            'all_portfolio' => $all_portfolio
        ]);

    }

    public function create(){
        $allcategory = Category::all();
        return view('backend.portfolio.create',[
            'allcategory' => $allcategory,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            '*' => 'required'
        ]);

        // Slug Create
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        $portfolio_slug = make_slug(Str::lower($request->title));

        // New Img Name Create
        $portfolio_logo_ext = $request->file("portfolio_logo")->getClientOriginalExtension();
        $portfolio_logo_name = "portfolio"."-"."logo"."-".Str::lower($request->title).".".$portfolio_logo_ext;

        // Make & Save Img
        $img = Image::make($request->file("portfolio_logo"));
        $img->save(base_path('public/uploads/portfolios/logos/'.$portfolio_logo_name));

        $portfolio_id = Portfolio::insertGetId([
            'title' => $request->title,
            'logo' => $portfolio_logo_name,
            'category_id' => $request->portfolio_category,
            'slug' => $portfolio_slug,
            'project_link' => $request->portfolio_link,
            'status' => $request->portfolio_status,
            'created_at' => Carbon::now()
        ]);


        return back();

    }

    public function show($slug){
        $post_details = Portfolio::where('slug',$slug)->first();
        return view('backend.portfolio.show',[
            'post_details' => $post_details
        ]);
    }


    public function edit($slug){
        $portfolio_details = Portfolio::where('slug',$slug)->first();
        $allcategory = Category::all();

        return view('backend.portfolio.edit',[
            'portfolio_details' => $portfolio_details,
            'allcategory' => $allcategory,
        ]);

    }

    public function update(Request $request){

        $request->validate([
            'portfolio_title' => 'required',
            'portfolio_category' => 'required',
            'project_link' => 'required',
            'portfolio_status' => 'required',
        ]);


        // Slug Create
        function make_slugupdate($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $portfolio_slug = make_slugupdate(Str::lower($request->portfolio_title));

        // Portfolio
        Portfolio::where('id', $request->id)->update([
            'title' => $request->portfolio_title,
            'category_id' => $request->portfolio_category,
            'slug' => $portfolio_slug,
            'status' => $request->portfolio_status,
            'project_link' => $request->project_link,
        ]);


        // Portfolio logo
        if ($request->hasFile('portfolio_logo')) {

            // Delete Old Img
            unlink(base_path('public/uploads/portfolios/logos/'.Portfolio::where('id',$request->id)->first()->logo));

            // New Img Name Create
            $portfolio_logo_ext = $request->file('portfolio_logo')->getClientOriginalExtension();
            $portfolio_logo_name = "portfolio"."-"."logo"."-".Str::lower($request->title).".".$portfolio_logo_ext;

            // Make & Save Img
            $img = Image::make($request->file('portfolio_logo'));
            $img->save(base_path('public/uploads/portfolios/logos/'.$portfolio_logo_name));

            // Update Database
            Portfolio::where('id',$request->id)->update([
                'logo' => $portfolio_logo_name,
            ]);

        }

        return redirect('portfolio');

    }

    public function destroy($slug){
        $post = Portfolio::where('slug',$slug)->first();
        $post->delete();
        return back()->with('success_delete', 'Post Deleted Successfully');
    }

}
