<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller{

    public function __construct(){
        $this->middleware(['auth','verified']);
    }


    public function index(){
        $settings = Setting::all()->first();
        return view('backend.settings.index',[
            'settings' => $settings,
        ]);
    }



    public function settingsupdate(Request $request){
        $setting_id = Setting::all()->first()->id;

        $request->validate([
            'Favicon' => 'nullable|image',
            'HeaderLogo' => 'nullable|image',
            'StickyLogo' => 'nullable|image',
            'MobileLogo' => 'nullable|image',
            'FooterLogo' => 'nullable|image',
            'about_us' => 'required',
        ]);


        // WebsiteName
        Setting::find($setting_id)->update([
            'website_name' => $request->WebsiteName,
            'about_us' => $request->about_us
        ]);

        // Favicon
        if ($request->hasFile('Favicon')) {

            // Delete Old Img
            unlink(base_path('public/uploads/settings/'.Setting::where('id',$setting_id)->first()->favicon));

            // New Img Name Create
            $favicon_ext = $request->file('Favicon')->getClientOriginalExtension();
            $favicon_name = "favicon".".".$favicon_ext;

            // Make & Save Img
            $img = Image::make($request->file('Favicon'));
            $img->resize(32 , 32)->save(base_path('public/uploads/settings/'.$favicon_name));

            // Update Database
            Setting::where('id',$setting_id)->update([
                'favicon' => $favicon_name,
            ]);

        }

        // HeaderLogo
        if ($request->hasFile('HeaderLogo')) {
            // Delete Old Img
            unlink(base_path('public/uploads/settings/'.Setting::where('id',$setting_id)->first()->header_logo));

            // New Img Name Create
            $header_logo_ext = $request->file('HeaderLogo')->getClientOriginalExtension();
            $header_logo_name = "header-logo".".".$header_logo_ext;

            // Make & Save Img
            $img = Image::make($request->file('HeaderLogo'));
            $img->save(base_path('public/uploads/settings/'.$header_logo_name));

            // Update Database
            Setting::where('id',$setting_id)->update([
                'header_logo' => $header_logo_name,
            ]);
        }

        // StickyLogo
        if ($request->hasFile('StickyLogo')) {
            // Delete Old Img
            unlink(base_path('public/uploads/settings/'.Setting::where('id',$setting_id)->first()->sticky_logo));

            // New Img Name Create
            $sticky_logo_ext = $request->file('StickyLogo')->getClientOriginalExtension();
            $sticky_logo_name = "sticky-logo".".".$sticky_logo_ext;

            // Make & Save Img
            $img = Image::make($request->file('StickyLogo'));
            $img->save(base_path('public/uploads/settings/'.$sticky_logo_name));

            // Update Database
            Setting::where('id',$setting_id)->update([
                'sticky_logo' => $sticky_logo_name,
            ]);

        }

        // MobileLogo
        if ($request->hasFile('MobileLogo')) {
             // Delete Old Img
             unlink(base_path('public/uploads/settings/'.Setting::where('id',$setting_id)->first()->mobile_logo));

             // New Img Name Create
             $mobile_logo_ext = $request->file('MobileLogo')->getClientOriginalExtension();
             $mobile_logo_name = "mobile-logo".".".$mobile_logo_ext;

             // Make & Save Img
             $img = Image::make($request->file('MobileLogo'));
             $img->save(base_path('public/uploads/settings/'.$mobile_logo_name));

             // Update Database
             Setting::where('id',$setting_id)->update([
                 'mobile_logo' => $mobile_logo_name,
             ]);

        }

        // FooterLogo
        if ($request->hasFile('FooterLogo')) {
             // Delete Old Img
             unlink(base_path('public/uploads/settings/'.Setting::where('id',$setting_id)->first()->footer_logo));

             // New Img Name Create
             $footer_logo_ext = $request->file('FooterLogo')->getClientOriginalExtension();
             $footer_logo_name = "footer-logo".".".$footer_logo_ext;

             // Make & Save Img
             $img = Image::make($request->file('FooterLogo'));
             $img->save(base_path('public/uploads/settings/'.$footer_logo_name));

             // Update Database
             Setting::where('id',$setting_id)->update([
                 'footer_logo' => $footer_logo_name,
             ]);

        };

        return back();

    }
}
