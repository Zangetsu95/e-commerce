<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSetting;
use App\Models\Seo;
use Image;

class WebSettingsController extends Controller
{
    /**
     * It returns the view of the settings page.
     */
    public function WebSettings()
    {
        /* Fetching the data from the database. */
        $settings = WebSetting::find(1);

        return view('backend.settings.setting_update', compact('settings'));
    }

    /**
     * It updates the web settings.
     * @param {Request} request - The request object.
     * @returns The return value of the last statement executed in the function.
     */
    public function WebSettingsUpdate(Request $request)
    {

        /* Getting the id of the setting from the request object. */
        $setting_id = $request->id;


        /* Checking if the file is present in the request object. */
        if ($request->file('logo')) {


            /* Creating a unique name for the image and saving it in the upload/logo folder. */
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('upload/logo/' . $name_gen);
            $save_url = 'upload/logo/' . $name_gen;

            /* Updating the data in the database. */
            WebSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'logo' => $save_url,

            ]);

            $notification = array(
                'message' => 'Settings Updated with Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        } /* Updating the data without the image. */ else {

            /* Updating the data in the database. */
            WebSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,


            ]);

            $notification = array(
                'message' => 'Settings Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function SeoSettings()
    {
        $seo = Seo::find(1);

        return view('backend.settings.seo_update', compact('seo'));
    }


    public function SeoSettingsUpdate(Request $request)
    {

        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,

        ]);

        $notification = array(
            'message' => 'Seo Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end mehtod

}
