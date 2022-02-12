<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Portfolio;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashController extends Controller{
    public function __construct(){
        // $this->middleware(['auth','verified']);
        $this->middleware(['auth']);
    }

    // Start All View
    public function requestedRegisterTrashView() {
        $only_trash_register = User::onlyTrashed()->get();
        return view('backend.trash.requested-register-trash',[
            'only_trash_register' => $only_trash_register
        ]);
    }

    public function categoryTreashView() {
        $only_trash_category = Category::onlyTrashed()->get();
        return view('backend.trash.category-trash',[
            'only_trash_category' => $only_trash_category
        ]);
    }

    public function inboxEmailTreashView() {
        $only_trash_inboxemail = ContactUs::onlyTrashed()->get();

        return view('backend.trash.inbox-email-trash', [
            'only_trash_inboxemail' => $only_trash_inboxemail
        ]);
    }


    public function portfolioTreashView() {
        if (Auth::user()->role == 1) {
            $only_trash_portfolio = Portfolio::onlyTrashed()->get();
        } else {
            $only_trash_portfolio = Portfolio::onlyTrashed()->where('auth_id', Auth::id())->get();
        }
        return view('backend.trash.post-trash',[
            'only_trash_portfolio' => $only_trash_portfolio
        ]);
    }

    public function socialLinkTreashView() {
        $only_trash_social_link = SocialLink::onlyTrashed()->get();
        return view('backend.trash.socialLink-trash',[
            'only_trash_social_link' => $only_trash_social_link
        ]);
    }

    // End All View



    // Start All Restore
    public function requestedRegisterRestore($id) {
        User::onlyTrashed()->find($id)->restore();
        return back()->with('success_undo', 'User undo Successfully');
    }

    public function categoryRestore($id) {
        Category::onlyTrashed()->find($id)->restore();
        return back()->with('success_undo', 'Category undo Successfully');
    }

    public function inboxEmailRestore($id) {
        ContactUs::onlyTrashed()->find($id)->restore();
        return back()->with('success_undo', 'Email undo Successfully');
    }



    public function portfolioRestore($id) {
        Portfolio::onlyTrashed()->find($id)->restore();
        return back()->with('success_undo', 'Portfolio undo Successfully');
    }

    public function socialLinkRestore($id) {
        SocialLink::onlyTrashed()->find($id)->restore();
        return back()->with('success_undo', 'Sucial Account undo Successfully');
    }


    // End All Restore


    // Start All ForceDelete
    public function requestedRegisterForceDelete($id) {
        User::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success_undo', 'Deleted Successfully');
    }

    public function categoryForceDelete($id) {
        unlink(base_path('public/uploads/categories/'.Category::onlyTrashed()->find($id)->category_photo));
        Category::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success_undo', 'Deleted Successfully');
    }

    public function inboxEmailForceDelete($id) {
        ContactUs::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success_undo', 'Deleted Successfully');
    }


    public function portfolioForceDelete($id) {
        Portfolio::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success_undo', 'Deleted Successfully');
    }

    public function socialLinkForceDelete($id) {
        SocialLink::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success_undo', 'Deleted Successfully');
    }

    // End All ForceDelete

}
