<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function noticePage()
    {
        $notice = Notice::first();
        return view('backend.pages.widget.notice', compact('notice'));
    }

    public function noticeUpdate(Request $request)
    {
        $request->validate([
            'notice' => 'required|string',
        ]);
        $notice = Notice::first();
        $notice->update([
            'notice' => $request->notice,
        ]);
        Toastr::success('Notice updated successfully!');
        return back();
    }

    public function changeStatus()
    {
        $notice = Notice::find(1);
        if ($notice->active == 1) {
            $active = 0;
        } else {
            $active = 1;
        }
        $notice->update([
            'active' => $active,
        ]);
        Toastr::success('Status updated!');
        return back();
    }
}
