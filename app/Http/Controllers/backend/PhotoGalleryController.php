<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('backend.pages.gallery.photo-gallery', compact('photos'));
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
            'title_bangla' => 'required|string|max:255|unique:photos,title_bn',
            'title_english' => 'required|string|max:255|unique:photos,title_en',
            'photo' => 'required|mimes:jpg,jpeg,png|max:10240',
        ]);
        if ($request->hasFile('photo')) {
            $photo_loation = 'public/uploads/photo-gallery/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(500, 310)->save(base_path($new_photo_location));
            $check = Photo::create([
                'title_bn' => $request->title_bangla,
                'title_en' => $request->title_english,
                'photo' => $new_photo_name,
            ]);
            Toastr::success('Photo added successfully!');
            return back();
        }
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
        $photo = Photo::findOrFail($id);
        $request->validate([
            'title_bangla' => 'required|string|max:255|unique:photos,title_bn,' . $photo->id,
            'title_english' => 'required|string|max:255|unique:photos,title_en,' . $photo->id,
            'photo' => 'nullable|mimes:jpg,jpeg,png|max:10240',
        ]);
        if ($request->hasFile('photo')) {
            // delete old
            $photo_location = 'public/uploads/photo-gallery/';
            $old_photo_location = $photo_location . $photo->photo;
            unlink(base_path($old_photo_location));

            $photo_loation = 'public/uploads/photo-gallery/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(500, 310)->save(base_path($new_photo_location));
            $photo->update([
                'title_bn' => $request->title_bangla,
                'title_en' => $request->title_english,
                'photo' => $new_photo_name,
            ]);
            Toastr::success('Photo updated successfully!');
            return back();
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Photo::findOrFail($id);
        $photo_location = 'public/uploads/photo-gallery/';
        $old_photo_location = $photo_location . $photo->photo;
        unlink(base_path($old_photo_location));
        $photo->delete();
        Toastr::success('Photo delete successfully!');
        return back();
    }

    public function changeStatus($id)
    {
        $photo = Photo::findOrFail($id);
        if ($photo->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $photo->update([
            'status' => $status,
        ]);
        Toastr::success('Status updated!');
        return back();
    }
}
