<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\Category;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * It returns the view of the blog category.
     */
    public function BlogCategory()
    {
        /* Getting all the data from the database. */
        $blogCategory = BlogPostCategory::latest()->get();

        return view('backend.blog.category.category_view', compact('blogCategory'));
    }


    /**
     * This function is used to store the blog category in the database.
     * @param {Request} request - The request object.
     */
    public function BlogCategoryStore(Request $request)
    {
        /* Validating the input fields. */
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_fr' => 'required',

        ], [
            'blog_category_name_en.required' => 'Input Blog Category English Name',
            'blog_category_name_fr.required' => 'Input Blog Category French Name',
        ]);



        /* Inserting the data into the database. */
        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_fr' => $request->blog_category_name_fr,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_fr' => str_replace(' ', '-', $request->blog_category_name_fr),
            'created_at' => Carbon::now(),


        ]);

        /* A notification message. */
        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


   /**
    * This function is used to edit the blog category.
    * @param id - The id of the blog category you want to edit.
    * @returns The blog category is being returned.
    */
    public function BlogCategoryEdit($id)
    {

        /* Finding the blog category by the id. */
        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit', compact('blogcategory'));
    }




    /**
     * This function is used to update the blog category.
     * @param {Request} request - The request object.
     */
    public function BlogCategoryUpdate(Request $request)
    {

       /* Getting the id from the request object. */
        $blogcategory_id = $request->id;


       /* Updating the blog category. */
        BlogPostCategory::findOrFail($blogcategory_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_fr' => $request->blog_category_name_fr,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_fr' => str_replace(' ', '-', $request->blog_category_name_fr),
            'created_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('blog-category')->with($notification);
    }

    /**
     * It deletes a blog category.
     * @param id - The id of the blog post category you want to delete.
     * @returns A redirect to the previous page with a notification.
     */
    public function BlogCategoryDelete($id)
    {
        /* Deleting the blog post category by the id. */
        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
