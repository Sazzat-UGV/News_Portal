<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\Social;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function socialSettingPage()
    {
        $social = Social::first();
        return view('backend.pages.setting.social', compact('social'));
    }
    public function socialSettingUpdate(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'youtube' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);
        $social = Social::first();
        $social->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        Toastr::success('Social setting updated successfully!');
        return back();
    }
    public function seoSettingPage()
    {
        $seo = Seo::first();
        return view('backend.pages.setting.seo', compact('seo'));
    }
    public function seoSettingUpdate(Request $request)
    {
        $request->validate([
            'meta_author' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'google_verification' => 'nullable|string',
            'alexa_analytics' => 'nullable|string',
        ]);
        $seo = Seo::first();
        $seo->update([
            'meta_author' => $request->meta_author,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'google_verification' => $request->google_verification,
            'google_verification' => $request->google_verification,
            'alexa_analytics' => $request->alexa_analytics,
        ]);
        Toastr::success('SEO setting updated successfully!');
        return back();
    }

    public function websiteSettingPage()
    {
        $setting = Setting::first();
        return view('backend.pages.setting.website-setting', compact('setting'));
    }

    public function websiteSettingUpdate(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|mimes:jpg,jpeg,png,svg|max:10240',
            'favicon' => 'nullable|mimes:jpg,jpeg,png,svg|max:10240',
            'short_description_english' => 'required|string',
            'short_description_bangla' => 'required|string',
        ]);
        $setting = Setting::first();
        $setting->update([
            'short_description_en' => $request->short_description_english,
            'short_description_bn' => $request->short_description_bangla,
        ]);

        $this->image_upload($request, $setting->id);
        Toastr::success('Setting updated successfully!');
        return back();
    }

    public function image_upload($request, $setting_id)
    {
        $setting = Setting::findorFail($setting_id);

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                //delete old photo
                $photo_location = 'public/uploads/setting/';
                $old_photo_location = $photo_location . $setting->logo;
                unlink(base_path($old_photo_location));
            }

            $photo_loation = 'public/uploads/setting/';
            $uploaded_photo = $request->file('logo');
            $new_photo_name = 'logo' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            $upload = $uploaded_photo->move(public_path('uploads/setting'), $new_photo_name);
            $check = $setting->update([
                'logo' => $new_photo_name,
            ]);
        }

        if ($request->hasFile('favicon')) {
            if ($setting->favicon) {
                //delete old photo
                $photo_location = 'public/uploads/setting/';
                $old_photo_location = $photo_location . $setting->favicon;
                unlink(base_path($old_photo_location));
            }

            $photo_loation = 'public/uploads/setting/';
            $uploaded_photo = $request->file('favicon');
            $new_photo_name = 'favicon' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(192, 192)->save(base_path($new_photo_location));
            $check = $setting->update([
                'favicon' => $new_photo_name,
            ]);
        }
    }
}
