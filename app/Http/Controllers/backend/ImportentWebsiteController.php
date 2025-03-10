<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Importentwebsite;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ImportentWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $websites = Importentwebsite::latest('id')->get();
        return view('backend.pages.setting.importent-website', compact('websites'));
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
            'website_name_english' => 'required|string|max:25',
            'website_name_bangla' => 'required|string|max:25',
            'website_link' => 'required|string',
        ]);

        $website = Importentwebsite::create([
            'website_name_en' => $request->website_name_english,
            'website_name_bn' => $request->website_name_bangla,
            'website_link' => $request->website_link,
        ]);
        Toastr::success('Website added successfully!');
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
            'website_name_english' => 'required|string|max:25',
            'website_name_bangla' => 'required|string|max:25',
            'website_link' => 'required|string',
        ]);
        $website = Importentwebsite::findOrFail($id);
        $website->update([
            'website_name_en' => $request->website_name_english,
            'website_name_bn' => $request->website_name_bangla,
            'website_link' => $request->website_link,
        ]);
        Toastr::success('Website updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $website = Importentwebsite::findOrFail($id);
        $website->delete();
        Toastr::success('Website deleted successfully!');
        return back();
    }
    public function changeStatus($id)
    {
        $website = Importentwebsite::findOrFail($id);
        if ($website->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $website->update([
            'status' => $status,
        ]);
        Toastr::success('Status updated!');
        return back();
    }
}
