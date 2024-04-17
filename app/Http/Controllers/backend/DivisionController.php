<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::select('id', 'division_name_bn', 'division_name_en', 'created_at')->latest()->get();
        return view('backend.pages.division.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'division_name_english' => 'required|string|max:255|unique:divisions,division_name_en',
            'division_name_bangla' => 'required|string|max:255|unique:divisions,division_name_bn',
        ]);

        $division = Division::create([
            'division_name_en' => $request->division_name_english,
            'division_name_bn' => $request->division_name_bangla,
        ]);
        Toastr::success('Division added successfully!');
        return redirect()->route('division.index');
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
        $division = Division::findOrFail($id);
        return view('backend.pages.division.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'division_name_english' => 'required|string|max:55|unique:divisions,division_name_en,' . $id,
            'division_name_bangla' => 'required|string|max:55|unique:divisions,division_name_bn,' . $id,
        ]);
        $division = Division::findOrFail($id);
        $division->update([
            'division_name_en' => $request->division_name_english,
            'division_name_bn' => $request->division_name_bangla,
        ]);
        Toastr::success('Division update successfully!');
        return redirect()->route('division.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $division = Division::findOrFail($id);
        $division->delete();
        Toastr::success('Division delete successfully!');
        return back();
    }
}
