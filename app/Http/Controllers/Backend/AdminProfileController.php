<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class AdminProfileController extends Controller
{


    /**
     * The function returns the admin profile view
     * @returns The admin profile view.
     */
    public function AdminProfile()
    {
        /* Returning the admin profile view. */
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }


   /**
    * This function is used to edit the admin profile.
    * @returns The view admin.admin_profile_edit is being returned.
    */
    public function AdminProfileEdit()
    {

        $id = Auth::user()->id;
		$editData = Admin::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }


    /**
     * It's updating the admin profile
     * @param {Request} request - It's the request object.
     * @returns It's returning the admin profile page.
     */
    public function AdminProfileStore(Request $request)
    {
        /* It's updating the admin profile. */
        $id = Auth::user()->id;
		$data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        /* It's checking if the file is being uploaded. If it is, it's deleting the old file and
        uploading the new one. */
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        /* It's saving the data and redirecting to the admin profile page. */
        $data->save();

        $notifications = array(
            'message' => 'Admin Profile Updated SuccessFuly !',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notifications);
    }

    /**
     * It returns the view admin.admin_change_password
     * @returns The view admin.admin_change_password is being returned.
     */
    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }


    /**
     * It's validating the data, checking if the old password matches the hashed password in the
     * database, if it does, it updates the password with the new one, and logs the user out
     * @param {Request} request - This is the request object that contains the old password and the new
     * password.
     * @returns It's returning the view of the admin.changepassword.blade.php file.
     */
    public function AdminUpdateChangePassword(Request $request)
    {

        /* It's validating the data, checking if the old password matches the hashed password in the
       database, if it does, it updates the password with the new one, and logs the user out. */
        $validateDAta = $request->validate([

            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {

            return redirect()->back();
        }
    }


    /**
     * It returns all the users in the database.
     */
    public function AllUsers()
    {
        /* It's getting all the users in the database and returning the view backend.user.all_user with
        the variable . */
        $users = User::latest()->get();

        return view('backend.user.all_user', compact('users'));
    }
}
