<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;

class EmailController extends Controller{

    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $inbox_emails = ContactUs::all();
        return view('backend.email.inbox',[
            'inbox_emails' => $inbox_emails
        ]);
    }


    public function singleemail($id){
        ContactUs::find($id)->update([
            'read_at' => "read"
        ]);
        $email_details = ContactUs::find($id);
        return view('backend.email.single-email',[
            'email_details' => $email_details
        ]);
    }


    public function inboxemaildestroy($id){
        $inbox_message = ContactUs::find($id);
        $inbox_message->delete();
        return back()->with('success_delete', ''.ucfirst($inbox_message->name).' Message Deleted Successfully');
    }

}
