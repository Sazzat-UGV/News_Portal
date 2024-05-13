<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;

class AdsController extends Controller
{
    public function adsIndex()
    {
        $ads = Ads::get();
        return view('backend.pages.ads.vertical', compact('ads'));
    }

    public function adsStore(Request $request)
    {
        $request->validate([
            'ads_link' => 'required|string',
            'ads' => 'required|mimes:jpg,jpeg,png|max:10240',
            'type' => 'required|string',
        ]);

        $ads = Ads::create([
            'link' => $request->ads_link,
            'type' => $request->type,
        ]);

        $this->image_upload($request, $ads->id);
        Toastr::success('Ads added successfully!');
        return back();
    }

    public function adsUpdate(Request $request, $id)
    {
        $request->validate([
            'ads_link' => 'required|string',
            'ads' => 'nullable|mimes:jpg,jpeg,png|max:10240',
            'type' => 'required|string',
        ]);

        $ads = Ads::findorFail($id);

        $ads->update([
            'link' => $request->ads_link,
            'type' => $request->type,
        ]);

        $this->image_upload($request, $ads->id);
        Toastr::success('Ads update successfully!');
        return back();
    }

    public function adsDelete(Request $request, $id)
    {
        $ads = Ads::findorFail($id);
        //delete old photo
        $photo_location = 'public/uploads/ads/';
        $old_photo_location = $photo_location . $ads->ads;
        unlink(base_path($old_photo_location));

        $ads->delete();
        Toastr::success('Ads delete successfully!');
        return back();
    }

    public function image_upload($request, $ads_id)
    {
        $ads = Ads::findorFail($ads_id);
        if ($request->type == 'vertical') {
            if ($request->hasFile('ads')) {

                if ($ads->ads) {
                    //delete old photo
                    $photo_location = 'public/uploads/ads/';
                    $old_photo_location = $photo_location . $ads->ads;
                    unlink(base_path($old_photo_location));
                }

                $photo_location = 'public/uploads/ads/';
                $uploaded_photo = $request->file('ads');
                $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
                $new_photo_location = $photo_location . $new_photo_name;
                Image::make($uploaded_photo)->resize(696, 846)->save(base_path($new_photo_location));
                $check = $ads->update([
                    'ads' => $new_photo_name,
                ]);
            }

        } elseif ($request->type == 'horizontal') {
            if ($request->hasFile('ads')) {

                if ($ads->ads) {
                    //delete old photo
                    $photo_location = 'public/uploads/ads/';
                    $old_photo_location = $photo_location . $ads->ads;
                    unlink(base_path($old_photo_location));
                }

                $photo_location = 'public/uploads/ads/';
                $uploaded_photo = $request->file('ads');
                $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
                $new_photo_location = $photo_location . $new_photo_name;
                Image::make($uploaded_photo)->resize(912, 92)->save(base_path($new_photo_location));
                $check = $ads->update([
                    'ads' => $new_photo_name,
                ]);
            }
        }

    }

}
