<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\PrayerTime;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PrayerTimeController extends Controller
{
    public function prayerTimeWidgetPage()
    {
        $prayerTime = PrayerTime::first();
        return view('backend.pages.widget.prayer-time', compact('prayerTime'));
    }

    public function prayerTimeWidgetUpdate(Request $request)
    {
        $request->validate([
            'fajr' => 'required|string',
            'dhuhr' => 'required|string',
            'asr' => 'required|string',
            'maghrib' => 'required|string',
            "isha_a" => 'required|string',
            'jumu_ah' => 'nullable|string',
        ]);
        $prayerTime = PrayerTime::first();
        $prayerTime->update([
            'fajr' => $request->fajr,
            'dhuhr' => $request->dhuhr,
            'asr' => $request->asr,
            'maghrib' => $request->maghrib,
            "isha_a" => $request->isha_a,
            "jumu_ah" => $request->jumu_ah,
            'active' => filled($request->active),
        ]);
        Toastr::success('Prayer time updated successfully!');
        return back();
    }
}
