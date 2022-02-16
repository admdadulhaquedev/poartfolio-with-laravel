<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\PortfoliosImages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
class PortfolioImagesController extends Controller{

    public function __construct(){
        // $this->middleware(['auth','verified']);
        $this->middleware(['auth']);
    }


    public function create() {
        return view('backend.portfolio.portfolioImages',[
            "portfolios" => Portfolio::all(),
        ]);
    }


    public function store(Request $request) {

        foreach ($request->file("portfolio_images") as $key => $single_image) {

            // New Img Name Create
            $portfolio_photo_ext = $single_image->getClientOriginalExtension();
            $portfolio_photo_name = "portfolio"."-"."images"."-".$request->portfolio_id."-".Str::random('5').".".$portfolio_photo_ext;

            // Make & Save Img
            $img = Image::make($single_image);
            $img->save(base_path('public/uploads/portfolios/'.$portfolio_photo_name));

            PortfoliosImages::insert([
                'portfolio_id' => $request->portfolio_id,
                'images_title' => $request->images_title,
                'portfolio_images' => $portfolio_photo_name,
                'created_at' => Carbon::now()
            ]);
        }

        return back();
    }

}
