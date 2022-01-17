<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller {
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
    */

    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    public function index(){
        return view('backend.contact-info.index');
    }



    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $request->validate([
            '*' => 'required',
        ]);

        ContactInfo::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'address' => $request->address,
            'contact_info_text' => $request->contact_info_text,
        ]);

        return back();
    }


}
