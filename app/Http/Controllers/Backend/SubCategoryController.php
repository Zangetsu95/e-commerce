<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    function SubCategoryView()
    {
        $subCategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subCategory'));
    }

    function SubCategoryStore(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_fr' => 'required',
            'subcategory_icon' => 'required',
        ], [
            'subcategory_name_en.required' => 'Input Category English Name',
            'subcategory_name_fr.required' => 'Input Category French Name',

        ]);

        SubCategory::insert([
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
    } //end method

    function SubCategoryEdit($id)
    {
        $subCategory = SubCategory::findorFail($id);

        return view('backend.category.category_edit', compact('subCategory'));
    } //end method

    function SubCategoryUpdate(Request $request)
    {
        $category_id = $request->id;
        $old_icon = $request->old_image;

        SubCategory::FindOrFail($category_id)->update([
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
    } //end method

    function SubCategoryDelete($id)
    {
        $subCategory = SubCategory::FindOrFail($id);


        SubCategory::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'Category Deleted SuccessFuly',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notifications);
    } //end method
}
