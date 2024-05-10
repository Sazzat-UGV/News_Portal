<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->get();
        return view('backend.pages.gallery.video-gallery', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_english' => 'required|string|max:255|unique:videos,title_en',
            'title_bangla' => 'required|string|max:255|unique:videos,title_bn',
            'video_url' => 'required|string',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:10240',
        ]);
        $video = Video::create([
            'title_en' => $request->title_english,
            'title_bn' => $request->title_bangla,
            'video_link' => $request->video_url,
        ]);
        $this->image_upload($request, $video->id);
        Toastr::success('Video added successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $video = Video::findOrFail($id);
        $request->validate([
            'title_english' => 'required|string|max:255|unique:videos,title_en,' . $video->id,
            'title_bangla' => 'required|string|max:255|unique:videos,title_bn,' . $video->id,
            'video_url' => 'required|string',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:10240',
        ]);
        $video->update([
            'title_en' => $request->title_english,
            'title_bn' => $request->title_bangla,
            'video_link' => $request->video_url,
        ]);
        $this->image_upload($request, $video->id);
        Toastr::success('Video update successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);
        $photo_location = 'public/uploads/video-gallery/';
        $old_photo_location = $photo_location . $video->thumbnail;
        unlink(base_path($old_photo_location));
        $video->delete();
        Toastr::success('Video delete successfully!');
        return back();
    }

    public function changeStatus($id)
    {
        $video = Video::findOrFail($id);
        if ($video->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $video->update([
            'status' => $status,
        ]);
        Toastr::success('Status updated!');
        return back();
    }

    public function image_upload($request, $video_id)
    {
        $video = Video::findorFail($video_id);

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail != 'default_thumbnail.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/video-gallery/';
                $old_photo_location = $photo_location . $video->thumbnail;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/video-gallery/';
            $uploaded_photo = $request->file('thumbnail');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(500, 310)->save(base_path($new_photo_location));
            $check = $video->update([
                'thumbnail' => $new_photo_name,
            ]);
        }
    }
}
