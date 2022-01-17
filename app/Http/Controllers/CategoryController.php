<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
class CategoryController extends Controller{

    public function __construct(){
        $this->middleware(['auth','verified']);
    }



    public function index(){
        $categories = Category::all();

        return view('backend.category.index',[
            'categories' => $categories,
        ]);
    }


    public function create(){
        return view('backend.category.create');
    }


    public function store(Request $request){

        $request->validate([
            'CategoryName' => 'required',
            'CategoryPhoto' => 'nullable|image',
            'CategorieStatus' => 'required',
        ]);


        // Slug Create
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        $category_slug = make_slug(Str::lower($request->CategoryName));



        $category_id = Category::insertGetId([
            'category_name' => $request->CategoryName,
            'status' => $request->CategorieStatus,
            'slug' => $category_slug,
            'created_at' => Carbon::now()
        ]);

         // New Img Name Create
         $categor_images_ext = $request->file('CategoryPhoto')->getClientOriginalExtension();
         $categor_images_name = "category"."-".$category_id.".".$categor_images_ext;

         // Make & Save Img
         $img = Image::make($request->file('CategoryPhoto'));
         $img->save(base_path('public/uploads/categories/'.$categor_images_name));

         // Update Database
         Category::where('id',$category_id)->update([
             'category_photo' => $categor_images_name,
         ]);

         return back();


    }


    public function edit(Request $request){
        $category_data = Category::find($request->category_id);
        return $category_data;
    }


    public function update(Request $request){

        Category::find($request->category_id)->update([
            'category_name' => $request->category_name
        ]);

        // category_image
        if ($request->hasFile('category_image')) {

            // Delete Old Img
            unlink(base_path('public/uploads/categories/'.Category::where('id',$request->category_id)->first()->category_photo));

            // New Img Name Create
            $category_image_ext = $request->file('category_image')->getClientOriginalExtension();
            $category_image_name = "category"."-".$request->category_id.".".$category_image_ext;

            // Make & Save Img
            $img = Image::make($request->file('category_image'));
            $img->save(base_path('public/uploads/categories/'.$category_image_name));

            // Update Database
            Category::where('id',$request->category_id)->update([
                'category_photo' => $category_image_name,
            ]);

        }

        return back();
    }


    public function statusupdate(Request $request){

        $category_status = Category::where('id', $request->category_id)->first()->status;

        if ($category_status == "1") {
            Category::where('id',$request->category_id)->update([
                'status' => 0,
            ]);
            return " ";
        }

        if ($category_status == "0") {
            Category::where('id',$request->category_id)->update([
                'status' => 1,
            ]);
            return "checked";
        }


    }



    public function destroy(Category $category, $id){
        $category = Category::find($id);
        $category->delete();
        return back()->with('success_delete', ''.ucfirst($category->name).'Category Deleted Successfully');
    }

}
