<?php

namespace App\Http\Controllers;

use App\Models\SocialIcons;
use App\Models\SocialLink;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SocialLinkController extends Controller{

    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $all_social_accounts = SocialLink::all();
        $icon_list = SocialIcons::all();
        return view('backend.social-account.index',[
            'all_social_accounts' => $all_social_accounts,
            'icon_list' => $icon_list
        ]);
    }

    public function create(){
        $icon_list = SocialIcons::all();
        return view('backend.social-account.create',[
            'icon_list' => $icon_list
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'account_name' => 'nullable',
            'icon_class' => 'required',
            'account_link' => 'required',
            'account_status' => 'required',
        ]);

        SocialLink::insert([
            'name' => $request->account_name,
            'profile_link' => $request->account_link,
            'icon_class' => $request->icon_class,
            'status' => $request->account_status,
            'created_at' => Carbon::now()
        ]);


        return redirect('social');


    }

    public function edit(Request $request){
        $social_data = SocialLink::find($request->social_id);
        return $social_data;
    }

    public function update(Request $request){

        SocialLink::find($request->account_id)->update([
            'name' => $request->account_name,
            'profile_link' => $request->account_link,
            'icon_class' => $request->icon_class,
        ]);

        return back();

    }

    public function statusupdate(Request $request){

        $social_status = SocialLink::where('id', $request->social_id)->first()->status;

        if ($social_status == "1") {
            SocialLink::where('id',$request->social_id)->update([
                'status' => 0,
            ]);
            return " ";
        }

        if ($social_status == "0") {
            SocialLink::where('id',$request->social_id)->update([
                'status' => 1,
            ]);
            return "checked";
        }


    }

    public function destroy(SocialLink $socialLink, $id){
        $social_link = SocialLink::find($id);
        $social_link->delete();
        return back()->with('success_delete', ''.ucfirst($social_link->name).' Social Deleted Successfully');
    }



}
