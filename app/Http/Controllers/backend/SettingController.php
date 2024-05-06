<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\Social;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

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
}
