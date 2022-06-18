<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Image;

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
        $blogCategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit', compact('blogCategory'));
    }




    /**
     * This function is used to update the blog category.
     * @param {Request} request - The request object.
     */
    public function BlogCategoryUpdate(Request $request)
    {

        /* Getting the id from the request object. */
        $blogCategory_id = $request->id;


        /* Updating the blog category. */
        BlogPostCategory::findOrFail($blogCategory_id)->update([
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

    //// BLOG POST  \\\\\\\\\\


    /**
     * It fetches all the blog posts from the database and returns the view.
     */
    public function AllBlogPost()
    {
        $blogPost = BlogPost::with('blogCategory')->latest()->get();
        return view('backend.blog.post.post_list', compact('blogPost'));
    }


    /**
     * It returns the view of the blog post.
     */
    public function AddBlogPost()
    {
        $blogPost = Blogpost::latest()->get();
        $blogCategory = BlogPostCategory::latest()->get();

        return view('backend.blog.post.post_add', compact('blogPost', 'blogCategory'));
    }

    /**
     * It takes the input from the form and validates it. If the validation is successful, it uploads
     * the image to the server and saves the image path to the database.
     * @param {Request} request - The request object.
     * @returns ```
     * return redirect()->route('blog-list')->with();
     * ```
     */
    public function BlogPostStore(Request $request)
    {
        $request->validate([
            'post_title_en' => 'required',
            'post_title_fr' => 'required',
            'post_image' => 'required',
        ], [
            'post_title_en.required' => 'Input Post Title English Name',
            'post_title_fr.required' => 'Input Post Title Hindi Name',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/post/' . $name_gen);
        $save_url = 'upload/post/' . $name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_fr' => $request->post_title_fr,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_slug_fr' => str_replace(' ', '-', $request->post_title_fr),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_fr' => $request->post_details_fr,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog-list')->with($notification);
    }

    /**
     * It finds the blog post and blog category by id and returns the view.
     * @param id - The id of the blog post you want to edit.
     */
    public function BlogPostEdit($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogCategory = BlogPostCategory::findOrFail($id);

        return view('backend.blog.post.post_edit',compact('blogPost','blogCategory'));
    }

    public function BlogPostUpdate(Request $request)
    {

        /* Getting the id from the request object. */
        $blogPost_id = $request->id;

        $request->validate([
            'post_details_fr' => 'required|max:60',
            'post_details_en' => 'required|max:60',
            'post_image' => 'required',
        ],[
            'long_descp_fr' => 'explain the product',
            'post_details_en' => 'explain the product',
        ]);
        /* Updating the blog category. */
        BlogPost::findOrFail($blogPost_id)->update([
            'post_title_en' => $request->post_title_en,
            'post_title_fr' => $request->post_title_fr,
            'post_image' => $request->post_image,
            'post_details_en' => $request->post_details_en,
            'post_details_fr' => $request->post_details_fr,


        ]);

        $notification = array(
            'message' => 'Blog Post Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('blog-category')->with($notification);
    }
}
