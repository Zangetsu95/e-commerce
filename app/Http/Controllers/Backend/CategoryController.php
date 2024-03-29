<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function CategoryView ()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }

    /**
     * This function is used to store the category data in the database.
     * @param {Request} request - The request instance
     */
    function CategoryStore (Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_fr' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'Input Category English Name',
            'category_name_fr.required' => 'Input Category French Name',

        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en' => strtolower(str_replace('.', '-', $request->category_name_en)),
            'category_slug_fr' => str_replace('.', '-', $request->category_name_fr),
            'category_icon' => $request->category_icon,
        ]);

        $notifications = array(
            'message' => 'Category inserted SuccessFuly !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifications);

    }

function CategoryEdit ($id)
    {
        $category = Category::findorFail($id);

        return view('backend.category.category_edit', compact('category'));
    }

/**
 * This function is used to update the category.
 * @param {Request} request - The request object.
 * @returns The method is returning the view of the page.
 */
function CategoryUpdate (Request $request)
    {
        $category_id = $request->id;
        $old_icon = $request->old_image;

        Category::FindOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_eng' => strtolower(str_replace('.', '-', $request->category_name_en)),
            'category_slug_fr' => str_replace('.', '-', $request->category_name_fr),
            'category_icon' => $request->category_icon,
        ]);

        $notifications = array(
            'message' => 'Brand Updated SuccessFuly !',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notifications);

    }

/**
 * It deletes a category from the database.
 * @param id - The id of the category you want to delete.
 */
function CategoryDelete ($id)
    {
        $category = Category::FindOrFail($id);


        Category::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'Category Deleted SuccessFuly',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notifications);
    }

}

