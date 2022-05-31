<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    /**
     * A function that allows you to add a brand, edit a brand, delete a brand and view a brand.
     * @returns The return value of the last statement executed in the function.
     */
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

   /**
    * This function is used to insert the brand name and image into the database.
    * @param {Request} request - The request object.
    */
    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_fr' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_fr.required' => 'Input Brand French Name',

        ]);

        //création d'un id + nom unique avec l'extension de l'image
        $image = $request->file('brand_image');
        $name_eng = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        //l'extension laravel que nous avons installé
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_eng);
        $save_url = 'upload/brand/' . $name_eng;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_fr' => $request->brand_name_fr,
            'brand_slug_eng' => strtolower(str_replace('.', '-', $request->brand_name_en)),
            'brand_slug_fr' => str_replace('.', '-', $request->brand_name_fr),
            'brand_image' =>   $save_url,
        ]);

        $notifications = array(
            'message' => 'Brand inserted SuccessFuly !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifications);
    }

    public function BrandEdit($id)
    {
        $brand = Brand::findorFail($id);

        return view('backend.brand.brand_edit', compact('brand'));
    } //end method

    /**
     * It updates the brand.
     * @param {Request} request - The request object.
     * @returns ```
     * return redirect()->route('all.brand')->with();
     * ```
     */
    public function BrandUpdate(Request $request)
    {
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')) {
            // quand on rajoute une image
            unlink($old_image); //unlink previous one

            //création d'un id + nom unique avec l'extension de l'image
            $image = $request->file('brand_image');
            $name_eng = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            //l'extension laravel que nous avons installé
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_eng);
            $save_url = 'upload/brand/' . $name_eng;

            Brand::FindOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_eng' => strtolower(str_replace('.', '-', $request->brand_name_en)),
                'brand_slug_fr' => str_replace('.', '-', $request->brand_name_fr),
                'brand_image' =>   $save_url,
            ]);

            $notifications = array(
                'message' => 'Brand Updated SuccessFuly !',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notifications);
        } else {
            // quand on ne rajoute pas d'image
            Brand::FindOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_eng' => strtolower(str_replace('.', '-', $request->brand_name_en)),
                'brand_slug_fr' => str_replace('.', '-', $request->brand_name_fr),

            ]);

            $notifications = array(
                'message' => 'Brand Updated SuccessFuly',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notifications);
        }
    }


   /**
    * It deletes the brand from the database and deletes the image from the storage folder.
    * @param id - The id of the record to be deleted.
    */
    public function BrandDelete ($id)
    {
        $brand = Brand::FindOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'Brand Deleted SuccessFuly',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notifications);
    }
}
