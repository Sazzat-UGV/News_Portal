<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Post;
use App\Models\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['category:id,category_name_en,category_name_bn', 'subcategory:id,subcategory_name_bn,subcategory_name_en'])->latest('id')->select('id', 'category_id', 'subcategory_id', 'title_en', 'title_bn', 'thumbnail', 'created_at', )->get();
        return view('backend.pages.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->select('id', 'category_name_bn', 'category_name_en')->get();
        $divisions = Division::select('id', 'division_name_bn', 'division_name_en')->get();
        return view('backend.pages.post.create', compact('categories', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|numeric',
            'subcategory_name' => 'nullable|numeric',
            'division_name' => 'nullable|numeric',
            'district_name' => 'nullable|numeric',
            'title_english' => 'required|string|max:255',
            'title_bangla' => 'required|string|max:255',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:10240',
            'tags_bangla' => 'required|string|max:255',
            'tags_english' => 'required|string|max:255',
            'details_english' => 'required|string|max:10000',
            'details_bangla' => 'required|string|max:10000',
        ]);

        $post = Post::create([
            'category_id' => $request->category_name,
            'subcategory_id' => $request->subcategory_name,
            'division_id' => $request->division_name,
            'district_id' => $request->district_name,
            'user_id' => auth()->user()->id,
            'title_en' => $request->title_english,
            'title_bn' => $request->title_bangla,
            'details_en' => $request->details_english,
            'details_bn' => $request->details_bangla,
            'tags_en' => $request->tags_english,
            'tags_bn' => $request->tags_bangla,
            'breaking_news' => filled($request->breaking_news),
            'first_section' => filled($request->firstSection),
            'first_section_thumbnail' => filled($request->generalBigThumbnail),
            'bigthumbnail' => filled($request->firstSectionBigThumbnail),

            'post_date' => date('Y'),
            'post_month' => date('M'),
        ]);
        $this->image_upload($request, $post->id);
        Toastr::success('Post added successfully!');
        return redirect()->route('post.index');
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
        $post = Post::findOrFail($id);
        $categories = Category::select('id', 'category_name_bn', 'category_name_en')->get();
        $divisions = Division::select('id', 'division_name_bn', 'division_name_en')->get();
        return view('backend.pages.post.edit', compact('post', 'categories', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|numeric',
            'subcategory_name' => 'nullable|numeric',
            'division_name' => 'nullable|numeric',
            'district_name' => 'nullable|numeric',
            'title_english' => 'required|string|max:255',
            'title_bangla' => 'required|string|max:255',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:10240',
            'tags_bangla' => 'required|string|max:255',
            'tags_english' => 'required|string|max:255',
            'details_english' => 'required|string|max:10000',
            'details_bangla' => 'required|string|max:10000',
        ]);
        $post = Post::findOrFail($id);
        $post->update([
            'category_id' => $request->category_name,
            'subcategory_id' => $request->subcategory_name,
            'division_id' => $request->division_name,
            'district_id' => $request->district_name,
            'user_id' => auth()->user()->id,
            'title_en' => $request->title_english,
            'title_bn' => $request->title_bangla,
            'details_en' => $request->details_english,
            'details_bn' => $request->details_bangla,
            'tags_en' => $request->tags_english,
            'tags_bn' => $request->tags_bangla,
            'breaking_news' => filled($request->breaking_news),
            'first_section' => filled($request->firstSection),
            'status' => filled($request->status),
            'first_section_thumbnail' => filled($request->generalBigThumbnail),

            'bigthumbnail' => filled($request->firstSectionBigThumbnail),
            'post_date' => date('Y'),
            'post_month' => date('M'),
        ]);
        $this->image_upload($request, $post->id);
        Toastr::success('Post update successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->thumbnail != 'default_thumbnail.jpg') {
            //delete old photo
            $photo_location = 'public/uploads/thumbnail/';
            $old_photo_location = $photo_location . $post->thumbnail;
            unlink(base_path($old_photo_location));
        }
        $post->delete();
        Toastr::success('Post delete successfully!');
        return back();
    }

    public function getSubcategory($id)
    {
        $subcategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategory, 200);
    }

    public function getDistrict($id)
    {
        $district = District::where('division_id', $id)->get();
        return response()->json($district, 200);
    }

    public function image_upload($request, $post_id)
    {
        $post = Post::findorFail($post_id);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail != 'default_thumbnail.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/thumbnail/';
                $old_photo_location = $photo_location . $post->thumbnail;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/thumbnail/';
            $uploaded_photo = $request->file('thumbnail');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(500, 310)->save(base_path($new_photo_location));
            $check = $post->update([
                'thumbnail' => $new_photo_name,
            ]);
        }
    }

}
