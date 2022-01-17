<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     * @return void
    */
    public function __construct(){
        $this->middleware(['auth','verified']);
    }


    public function index(){
        return view('backend.profile.profile');
    }



    public function registerrequested(){
        $register_riguested_profile = User::where('role', '0')->get();
        return view('backend.authentication.requested-register',[
            "register_riguested_profile" => $register_riguested_profile
        ]);
    }



    public function destroy($id){
        $register_riguested = User::find($id);
        $register_riguested->delete();
        return back()->with('success_delete', ''.ucfirst($register_riguested->name).' Requested ragister Deleted Successfully');
    }


}
