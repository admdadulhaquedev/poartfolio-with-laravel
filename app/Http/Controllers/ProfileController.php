<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller{

    public function __construct(){
        // $this->middleware(['auth','verified']);
        $this->middleware(['auth']);
    }

    public function index(){
        return view('backend.profile.profile');
    }

    public function update(Request $request, $id){

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dateOfbirth' => $request->dateOfbirth,
            'address' => $request->address,
            'about_me' => $request->about_me,
        ]);

        return back();

    }

    public function profilephotoupdate(Request $request, $id){

        $request->validate([
            'new_profile_photo' => 'image',
        ]);

        if ($request->hasFile('new_profile_photo')) {

            // Delete Old Img
            if (!User::where('id',$id)->first()->photo == "default-user.png") {
                unlink(base_path('public/uploads/profiles/'.User::where('id',$id)->first()->photo));
            }

            // New Img Name Create
            $new_profile_photo_ext = $request->file('new_profile_photo')->getClientOriginalExtension();
            $new_profile_photo_name = Auth::user()->name."-"."images"."-".$id.".".$new_profile_photo_ext;

            // Make & Save Img
            $img = Image::make($request->file('new_profile_photo'));
            $img->save(base_path('public/uploads/profiles/'.$new_profile_photo_name));

            // Update Database
            User::where('id',$id)->update([
                'photo' => $new_profile_photo_name,
            ]);

            return back();

        }

    }

    public function newregister(){
        return view('backend.authentication.register');
    }

    public function passwordChange(Request $request){

        $request->validate([
            '*' => 'required',
        ]);

        $user_info = User::where('id', Auth::id())->first();
        $user_old_password = $user_info->password;

        if (Hash::check($request->old_password, $user_old_password)) {
            if (!($request->new_password == $request->cnew_password)) {
                return back()->with('confirm_password', 'Confirm Password Not Match');
            }else{
                User::find(Auth::id())->update([
                    'password' => bcrypt($request->new_password)
                ]);
                return back()->with('success', 'Password Change Successfully');
            }
        }
        else{
            return back()->with('old_password', 'Old Password Not Match');
        }
    }



}
