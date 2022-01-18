<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller {

    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    public function index(){
        return view('backend.contact-info.index');
    }

    public function update(Request $request, $id){

        $request->validate([
            '*' => 'required',
        ]);

        ContactInfo::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'whatsApp' => $request->whatsApp,
            'address' => $request->address,
            'contact_info_text' => $request->contact_info_text,
        ]);

        return back();
    }


}
