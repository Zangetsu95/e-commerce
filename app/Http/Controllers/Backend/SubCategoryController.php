<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    function SubCategoryView()
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subCategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subCategory', 'category'));
    }

    function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_fr' => 'required',
        ], [
            'category_id.required' => 'Please select any option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fr' => $request->subcategory_name_fr,
            'subcategory_slug_en' => strtolower(str_replace('.', '-', $request->subcategory_name_en)),
            'subcategory_slug_fr' => str_replace('.', '-', $request->subcategory_name_fr),
        ]);

        $notifications = array(
            'message' => 'Category inserted SuccessFuly !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifications);
    } //end method

    function SubCategoryEdit($id)
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subCategory = SubCategory::findorFail($id);

        return view('backend.category.subcategory_edit', compact('subCategory', 'category'));
    } //end method

    function SubCategoryUpdate(Request $request)
    {
        $subCategory_id = $request->id;

        SubCategory::FindOrFail($subCategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fr' => $request->subcategory_name_fr,
            'subcategory_slug_eng' => strtolower(str_replace('.', '-', $request->subcategory_name_en)),
            'subcategory_slug_fr' => str_replace('.', '-', $request->subcategory_name_fr),
        ]);

        $notifications = array(
            'message' => 'SubCategory Updated SuccessFuly !',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notifications);
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


    //////////////////// SUBSUB CATEGORY !!!!!!!!!!!! ///////////////////////

    function SubSubCategoryView()
    {
        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subSubCategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subSubCategory', 'category'));
    }
    
    public function GetSubCategory($category_id)
    {

        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    }
}
