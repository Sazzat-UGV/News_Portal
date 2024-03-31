<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function profilePage()
    {
        return view('backend.pages.admin.profile');
    }

    public function profile(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|string|max:255|unique:users,email," . Auth::user()->id,
            "primary_phone" => "required|string|max:15",
            "secondary_phone" => "nullable|string|max:15",
            "address" => "required|string|max:255",
            "dob" => "nullable|date",
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "primary_phone" => $request->primary_phone,
            "secondary_phone" => $request->secondary_phone,
            "address" => $request->address,
            "dob" => $request->dob,
        ]);
        Toastr::success('Profile has been updated!');
        return back();
    }

    public function changePasswordPage()
    {
        return view('backend.pages.admin.change_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6|same:retype_password',
        ]);
        $currentPassword = Hash::check($request->old_password, Auth::user()->password);

        if ($currentPassword) {
            $user = User::findorFail(Auth::user()->id);
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            Auth::logout();
            Toastr::success('Password has been changed successfully!');
            return redirect()->route('admin.loginPage');
        } else {
            Toastr::error('Invalid password!');
            return back();
        }
    }

    public function changeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg|max:10240',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->update([]);
        $this->image_upload($request, $user->id);
        Toastr::success('Profile picture has been updated!');
        return back();
    }

    public function image_upload($request, $user_id)
    {
        $user = User::findorFail($user_id);

        if ($request->hasFile('image')) {
            if ($user->image != 'default_profile.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/users/';
                $old_photo_location = $photo_location . $user->image;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/users/';
            $uploaded_photo = $request->file('image');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(600, 600)->save(base_path($new_photo_location));
            $check = $user->update([
                'image' => $new_photo_name,
            ]);
        }
    }

}
