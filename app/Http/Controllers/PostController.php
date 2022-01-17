<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
class PostController extends Controller{

    public function __construct(){
        $this->middleware(['auth','verified']);
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $all_post = Post::where('under_review', 0)->get();
        return view('backend.post.index',[
            'all_post' => $all_post
        ]);

    }



    public function create(){
        $allcategory = Category::all();
        return view('backend.post.create',[
            'allcategory' => $allcategory,
        ]);
    }



    public function store(Request $request){
        $author_role = Auth::user()->role;

        $request->validate([
            '*' => 'required'
        ]);


        $post_full_description =  $request->post_description;
        $dom = new \DomDocument();

        $dom->loadHtml($post_full_description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');
        // return $images;
        foreach($images as $key => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';',$data);
            list(, $data) = explode(',',$data);
            $data = base64_decode($data);

            $image_name = "/uploads/posts/descriptions/".time().$key.'.png';

            $path = public_path() . $image_name;
            file_put_contents($path, $data);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);

        }

        $description = $dom->saveHTML();

        // Slug Create
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        $post_slug = make_slug(Str::lower($request->post_title));

        if ($author_role == 1) {
            Post::insert([
                'mega_title' => $request->post_title,
                'post_description' => $description,
                'auth_id' => Auth::id(),
                'category_id' => $request->post_category,
                'slug' => $post_slug,
                'meta_tags' => $request->tags_name,
                'status' => $request->post_status,
                'feature_status' => $request->fetuer_status,
                'under_review' => 0,
                'created_at' => Carbon::now()
            ]);
        }
        else{
            Post::insert([
                'mega_title' => $request->post_title,
                'post_description' => $description,
                'auth_id' => Auth::id(),
                'category_id' => $request->post_category,
                'slug' => $post_slug,
                'meta_tags' => $request->tags_name,
                'status' => 0,
                'feature_status' => $request->fetuer_status,
                'under_review' => 1,
                'created_at' => Carbon::now()
            ]);
        }

        if (Auth::user()->role == 1) {
            return redirect('post');
        }
        return redirect('my/post');

    }


    public function show($slug){
        $post_details = Post::where('slug',$slug)->first();
        return view('backend.post.show',[
            'post_details' => $post_details
        ]);
    }




    public function edit($slug){
        $post_details = Post::where('slug',$slug)->first();
        $allcategory = Category::all();

        return view('backend.post.edit',[
            'post_details' => $post_details,
            'allcategory' => $allcategory,
        ]);

    }



    public function update(Request $request, $slug){

        return $slug;
        die();
        $author_role = Auth::user()->role;

        // $request->validate([
        //     '*' => 'required'
        // ]);


        $post_full_description =  $request->post_description;
        $dom = new \DomDocument();
        $dom->loadHtml($post_full_description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');
        // return $images;
        foreach($images as $key => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';',$data);
            list(, $data) = explode(',',$data);
            $data = base64_decode($data);

            $image_name = "/uploads/posts/descriptions/".time().$key.'.png';

            $path = public_path() . $image_name;
            file_put_contents($path, $data);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);

        }

        $description = $dom->saveHTML();

        // Slug Create
        function update_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        $post_slug = make_slug(Str::lower($request->post_title));

        if ($author_role == 1) {
            Post::where('slug', $slug)->update([
                'mega_title' => $request->post_title,
                'post_description' => $description,
                'auth_id' => Auth::id(),
                'category_id' => $request->post_category,
                'slug' => $post_slug,
                'meta_tags' => $request->tags_name,
                'status' => $request->post_status,
                'feature_status' => $request->fetuer_status,
                'under_review' => 0
            ]);
        }
        else{
            Post::where('slug', $slug)->update([
                'mega_title' => $request->post_title,
                'post_description' => $description,
                'auth_id' => Auth::id(),
                'category_id' => $request->post_category,
                'slug' => $post_slug,
                'meta_tags' => $request->tags_name,
                'status' => 0,
                'feature_status' => $request->fetuer_status,
                'under_review' => 1
            ]);
        }

        if (Auth::user()->role == 1) {
            return redirect('post');
        }
        return redirect('my/post');


    }



    public function mypost(){
        $user_post = Post::where('auth_id', Auth::id())->get();
        return view('backend.post.mypost',[
            "user_post" => $user_post
        ]);
    }



    public function requestedpostlist(){
        $requested_post = Post::where('under_review', 1)->get();
        return view('backend.post.requested-post',[
            'requested_post' => $requested_post
        ]);
    }



    public function postapprove($slug){
        $post = Post::where('slug',$slug)->first();
        $post->update([
            'under_review' => 0,
            'status' => 1
        ]);
        return back()->with('postapprove', 'Post Approved Successfully');

    }


    public function postreject($slug){
        $post = Post::where('slug',$slug)->first();
        $post->update([
            'under_review' => 3
        ]);
        return back()->with('success_postreject', 'Post Rejected Successfully');

    }

    public function rejectedpostlist(){
        if (Auth::user()->role == 1) {
            $rejectedpost = Post::where('under_review', 3)->get();
        } else {
            $rejectedpost = Post::where('under_review', 3)->where('auth_id', Auth::id())->get();
        }

        return view('backend.post.rejected-post',[
            'rejectedpost' => $rejectedpost
        ]);

    }


    public function postresubmit($slug){
        $post = Post::where('slug',$slug)->first();
        $post->update([
            'under_review' => 1
        ]);
        return back()->with('postresubmit', 'Post Resubmit Successfully');

    }


    public function destroy($slug){
        $post = Post::where('slug',$slug)->first();
        $post->delete();
        return back()->with('success_delete', 'Post Deleted Successfully');
    }




}
