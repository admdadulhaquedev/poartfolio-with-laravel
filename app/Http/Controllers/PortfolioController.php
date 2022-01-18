<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
class PortfolioController extends Controller{

    public function __construct(){
        $this->middleware(['auth','verified']);
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
        $post_slug = make_slug(Str::lower($request->post_title));


        Portfolio::insert([
            'title' => $request->post_title,
            'logo' => $request->post_title,
            'category_id' => $request->post_category,
            'images_id' => $request->post_category,
            'slug' => $post_slug,
            'project_link' => $post_slug,
            'status' => $request->post_status,
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
        $post_details = Portfolio::where('slug',$slug)->first();
        $allcategory = Category::all();

        return view('backend.portfolio.edit',[
            'post_details' => $post_details,
            'allcategory' => $allcategory,
        ]);

    }

    public function update(Request $request, $slug){}

    public function destroy($slug){
        $post = Portfolio::where('slug',$slug)->first();
        $post->delete();
        return back()->with('success_delete', 'Post Deleted Successfully');
    }

}
