<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::with('division:id,division_name_bn,division_name_en')->latest('id')->get();
        return view('backend.pages.district.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::select('id', 'division_name_bn', 'division_name_en')->latest()->get();
        return view('backend.pages.district.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'division_name' => 'required|numeric',
            'district_name_english' => 'required|string|max:255|unique:districts,district_name_en',
            'district_name_bangla' => 'required|string|max:255|unique:districts,district_name_bn',
        ]);

        $district = District::create([
            'division_id' => $request->division_name,
            'district_name_en' => $request->district_name_english,
            'district_name_bn' => $request->district_name_bangla,
        ]);
        Toastr::success('District added successfully!');
        return redirect()->route('district.index');
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
        $divisions = Division::select('id', 'division_name_bn', 'division_name_en')->latest()->get();
        $district=District::findOrFail($id);
        return view('backend.pages.district.edit',compact('district','divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'division_name' => 'required|numeric',
            'district_name_english' => 'required|string|max:255|unique:districts,district_name_en,'.$id,
            'district_name_bangla' => 'required|string|max:255|unique:districts,district_name_bn,'.$id,
        ]);
        $district=District::findOrFail($id);
        $district->update([
            'division_id' => $request->division_name,
            'district_name_en' => $request->district_name_english,
            'district_name_bn' => $request->district_name_bangla,
        ]);
        Toastr::success('District update successfully!');
        return redirect()->route('district.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        Toastr::success('District deleted successfully!');
        return back();
    }
}
