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
        return view('backend.pages.setting.photo-gallery', compact('photos'));
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
            'title' => 'required|string|max:255',
            'photo' => 'required|mimes:jpg,jpeg,png|max:10240',
        ]);
        if ($request->hasFile('photo')) {
            $photo_loation = 'public/uploads/photo-gallery/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(500, 310)->save(base_path($new_photo_location));
            $check = Photo::create([
                'title' => $request->title,
                'photo' => $new_photo_name,
            ]);
            Toastr::success('Phoot added successfully!');
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
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'required|mimes:jpg,jpeg,png|max:10240',
        ]);
        $photo = Photo::findOrFail($id);
        dd($request->all());
        if ($request->hasFile('photo')) {
            //delete old photo
            $photo_location = 'public/uploads/photo-gallery/';
            $old_photo_location = $photo_location . $photo->photo;
            unlink(base_path($old_photo_location));

            $photo_loation = 'public/uploads/photo-gallery/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(500, 310)->save(base_path($new_photo_location));
            $check = $photo->update([
                'title' => $request->title,
                'photo' => $new_photo_name,
            ]);
        }
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
}
