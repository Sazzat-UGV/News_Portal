<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category:id,category_name_bn,category_name_en')->latest()->get();
        return view('backend.pages.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->select('id', 'category_name_bn', 'category_name_en')->latest()->get();
        return view('backend.pages.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|numeric',
            'subcategory_name_english' => 'required|string|unique:sub_categories,subcategory_name_en|max:55',
            'subcategory_name_bangla' => 'required|string|unique:sub_categories,subcategory_name_bn|max:55',
        ]);

        SubCategory::create([
            'category_id' => $request->category_name,
            'subcategory_name_en' => $request->subcategory_name_english,
            'subcategory_name_bn' => $request->subcategory_name_bangla,
        ]);
        Toastr::success('Subcategory added successfully!');
        return redirect()->route('subcategory.index');
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
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::select('id', 'category_name_bn', 'category_name_en')->latest()->get();
        return view('backend.pages.subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|numeric',
            'subcategory_name_english' => 'required|string|max:55|unique:sub_categories,subcategory_name_en,'.$id,
            'subcategory_name_bangla' => 'required|string|max:55|unique:sub_categories,subcategory_name_bn,'.$id,
        ]);
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update([
            'category_id' => $request->category_name,
            'subcategory_name_en' => $request->subcategory_name_english,
            'subcategory_name_bn' => $request->subcategory_name_bangla,
        ]);
        Toastr::success('Subcategory update successfully!');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        Toastr::success('Subcategory delete successfully!');
        return back();
    }
    

    public function changeStatus($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if ($subcategory->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $subcategory->update([
            'status' => $status,
        ]);
        return response()->json(200);
    }
}
