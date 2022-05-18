<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;

class HomeBlogController extends Controller
{
    /**
     * It gets the latest blog posts and categories and returns them to the view.
     * @returns A view called blog_list.
     */
    public function GetBlog()
    {
        /* Getting the latest blog posts and categories and returning them to the view. */
        $blogPost = BlogPost::latest()->get();
        $blogCategory = BlogPostCategory::latest()->get();

        return view('frontend.blog.blog_list', compact('blogPost', 'blogCategory'));
    }

    /**
     * It gets the blog details of a blog post with the given id
     * @param id - The id of the blog post you want to view.
     * @returns A view with the blog post and blog category
     */
    public function GetBlogDetails($id)
    {
        /* Getting the latest blog post and blog category. */
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_view', compact('blogPost', 'blogCategory'));
    }

   /**
    * It returns the view of the blog category list.
    * @param category_id - The id of the category you want to display.
    */
    public function BlogCategoryPost($category_id)
    {
        /* Getting the latest blog post and blog category. */
        $blogCategory = BlogPostCategory::latest()->get();
    	$blogPost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();

        return view('frontend.blog.bog_cat_list', compact('blogPost', 'blogCategory'));
    }
}
