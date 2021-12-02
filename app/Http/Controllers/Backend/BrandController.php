<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

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
}
