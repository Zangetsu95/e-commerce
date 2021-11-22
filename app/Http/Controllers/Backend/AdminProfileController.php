<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;


class AdminProfileController extends Controller
{

    public function AdminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notifications = array(
            'message' => 'Admin Profile Updated SuccessFuly !',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notifications);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminUpdateChangePassword(Request $request)
    {



    }
}
