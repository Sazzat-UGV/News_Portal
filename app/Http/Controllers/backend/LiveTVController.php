<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Livetv;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LiveTVController extends Controller
{
    public function liveTVWidgetPage()
    {
        $livetv = Livetv::first();
        return view('backend.pages.widget.liveTV', compact('livetv'));
    }

    public function liveTVWidgetUpdate(Request $request)
    {
        $request->validate([
            'embed_code' => 'nullable|string',
        ]);
        $livetv = Livetv::first();
        $livetv->update([
            'embed_code' => $request->embed_code,
        ]);
        Toastr::success('Live TV updated successfully!');
        return back();
    }

    public function changeStatus()
    {
        $livetv = Livetv::findOrFail(1);
        if ($livetv->active == 1) {
            $active = 0;
        } else {
            $active = 1;
        }
        $livetv->update([
            'active' => $active,
        ]);
        Toastr::success('Live TV status updated!');
        return back();
    }
}
