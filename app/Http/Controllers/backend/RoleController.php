<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest('id')->get();
        return view('backend.pages.role&permission.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.role&permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|max:255|same:retype_password',
        ]);

        User::create([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => Hash::make($request->password),
            'category' => filled($request->category),
            'subcategory' => filled($request->subcategory),
            'division' => filled($request->division),
            'district' => filled($request->district),
            'post' => filled($request->post),
            'widget' => filled($request->widget),
            'ads' => filled($request->ads),
            'permission' => filled($request->permission),
            'gallery' => filled($request->gallery),
            'setting' => filled($request->setting),
        ]);
        Toastr::success('Admin added successfully!');
        return redirect()->route('role.index');
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
        $user = User::findOrFail($id);
        return view('backend.pages.role&permission.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|max:255|same:retype_password',
        ]);

        $user->update([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => Hash::make($request->password),
            'category' => filled($request->category),
            'subcategory' => filled($request->subcategory),
            'division' => filled($request->division),
            'district' => filled($request->district),
            'post' => filled($request->post),
            'widget' => filled($request->widget),
            'ads' => filled($request->ads),
            'permission' => filled($request->permission),
            'gallery' => filled($request->gallery),
            'setting' => filled($request->setting),
        ]);
        Toastr::success('Admin update successfully!');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Toastr::success('Admin delete successfully!');
        return back();
    }
}
