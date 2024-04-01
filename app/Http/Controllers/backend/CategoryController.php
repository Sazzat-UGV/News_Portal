<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.pages.category.index', compact('categories'));
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
            'category_name_english' => 'required|string|max:255|unique:categories,category_name_en',
            'category_name_bangla' => 'required|string|max:255|unique:categories,category_name_bn',
        ]);

        $category = Category::create([
            'category_name_en' => $request->category_name_english,
            'category_name_bn' => $request->category_name_bangla,
        ]);
        Toastr::success('Category added successfully!');
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
        $request->validate([
            'category_name_english' => 'required|string|max:255|unique:categories,category_name_en,' . $id,
            'category_name_bangla' => 'required|string|max:255|unique:categories,category_name_bn,' . $id,
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'category_name_en' => $request->category_name_english,
            'category_name_bn' => $request->category_name_bangla,
        ]);
        Toastr::success('Category updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Toastr::success('Category deleted successfully!');
        return back();
    }

    public function changeStatus($id)
    {
        $category = Category::findOrFail($id);
        if ($category->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $category->update([
            'status' => $status,
        ]);
        return response()->json(200);
    }
}
