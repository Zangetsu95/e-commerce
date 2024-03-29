<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Image;
use Auth;
use Illuminate\Support\Facades\Hash;


/* This class is used to create, update, delete and view the admin user role. */
class AdminUserController extends Controller
{
    public function AllAdminRole()
    {
        $adminuser = Admin::where('type', 2)->latest()->get();
        return view('backend.role.admin_role_all', compact('adminuser'));
    }


    public function AddAdminRole()
    {
        return view('backend.role.admin_role_add');
    }

    /**
     * A function to store the admin user role.
     * @param {Request} request - The request object.
     */
    public function StoreAdminRole(Request $request)
    {


        /* This is a code for uploading image. */
        $image = $request->file('profile_photo_path');
        /* Generating a unique name for the image. */
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        /* Resizing the image to 225px by 225px and saving it to the upload/admin_images folder. */
        Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        /* This is a code for inserting data into the database. */
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,

            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'return_order' => $request->returnorder,
            'review' => $request->review,

            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'all_user' => $request->alluser,
            'admin_user_role' => $request->adminuserrole,
            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),


        ]);
        // dd($request);
        $notification = array(
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-admin-user')->with($notification);
    }

    /**
     * A function to edit the admin role.
     * @param id - The id of the user you want to edit.
     */
    public function EditAdminRole($id)
    {

        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin_role_edit', compact('adminuser'));
    }

   /**
    * It updates the admin user role.
    * @param {Request} request - The request object.
    * @returns The return value of the function is the value that is returned to the caller.
    */
    public function UpdateAdminRole(Request $request)
    {

        $admin_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {

            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
            $save_url = 'upload/admin_images/' . $name_gen;

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,

                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,

                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'return_order' => $request->returnorder,
                'review' => $request->review,

                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'all_user' => $request->alluser,
                'admin_user_role' => $request->adminuserrole,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);
        } else {

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,

                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,

                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'return_order' => $request->returnorder,
                'review' => $request->review,

                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'all_user' => $request->alluser,
                'admin_user_role' => $request->adminuserrole,
                'type' => 2,

                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all-admin-user')->with($notification);
        }
    }

    /**
     * It deletes the admin user from the database and deletes the profile photo from the storage.
     * @param id - The id of the record you want to delete.
     */
    public function DeleteAdminRole($id)
    {

        $adminimg = Admin::findOrFail($id);
        $img = $adminimg->profile_photo_path;
        unlink($img);

        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }
}
