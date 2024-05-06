<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
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
}
