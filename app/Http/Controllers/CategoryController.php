<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
class CategoryController extends Controller{

    public function __construct(){
        // $this->middleware(['auth','verified']);
        $this->middleware(['auth']);
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
            'CategorieStatus' => 'required',
        ]);

       Category::insertGetId([
            'category_name' => $request->CategoryName,
            'status' => $request->CategorieStatus,
            'created_at' => Carbon::now()
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
