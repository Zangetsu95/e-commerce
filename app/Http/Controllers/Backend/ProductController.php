<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\MultiImg;
use Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view('backend.product.product_add', compact('categories', 'brands'));
    }

    public function StoreProduct(Request $request)
    {

        //création d'un id + nom unique avec l'extension de l'image
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        //l'extension laravel que nous avons installé
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        $request->validate([
            'long_descp_en' => 'required|max:60',
            'long_descp_fr' => 'required|max:60',
        ],[
            'long_descp_fr' => 'explain the product',
            'long_descp_en' => 'explain the product',
        ]);

        $product_id  = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_fr' => $request->product_name_fr,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_fr' => str_replace(' ', '-', $request->product_name_fr),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_fr' => $request->product_tags_fr,
            'product_size_en' => $request->product_size_en,
            'product_size_fr' => $request->product_size_fr,
            'product_color_en' => $request->product_color_en,
            'product_color_fr' => $request->product_color_fr,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_fr' => $request->short_descp_fr,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_fr' => $request->long_descp_fr,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;


            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }

        ////////// Een Multiple Image Upload End ///////////


        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    } // end method


    public function ManageProduct()
    {
        $products = Product::Latest()->get();
        return view('backend.product.product_view', compact('products'));
    }


    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $subSubCategory = SubSubCategory::latest()->get();

        $products = Product::FindOrFail($id);


        return view('backend.product.product_edit', compact('categories', 'brands', 'subCategory', 'subSubCategory', 'products', 'multiImgs'));
    }

    public function ProductDataUpdate(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_fr' => $request->product_name_fr,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_fr' => str_replace(' ', '-', $request->product_name_fr),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_fr' => $request->product_tags_fr,
            'product_size_en' => $request->product_size_en,
            'product_size_fr' => $request->product_size_fr,
            'product_color_en' => $request->product_color_en,
            'product_color_fr' => $request->product_color_fr,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_fr' => $request->short_descp_fr,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_fr' => $request->long_descp_fr,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            // 'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }

    public function MultiImageUpdate(Request $request)
    {
        //Add another pic for multiImage
        $imgs_add = $request->multi_img_add;
        $product_id = $request->id;

        if ($imgs_add) {
            foreach ($imgs_add as $id => $img) {
                //image intervention for thumnail
                $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $name_gen);
                $upload_path = 'upload/products/multi-image/' . $name_gen;

                MultiImg::insert([
                    'product_id' => $product_id,
                    'photo_name' => $upload_path,
                    'created_at' => Carbon::now(),
                ]);
            } //end for each
            // UPDATE MULTI IMAGE \\\\\\\\\\\\\
        } else {

            $imgs = $request->multi_img;

            foreach ($imgs as $id => $img) {

                // on va récuperer l'image avec l'id et la remplacer
                $imgDel = MultiImg::findOrFail($id);
                unlink($imgDel->photo_name);

                //création d'un id + nom unique avec l'extension de l'image
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                //l'extension laravel que nous avons installé
                Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
                $uploadPath = 'upload/products/multi-image/' . $make_name;


                MultiImg::where('id', $id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),
                ]);
            } //end foreach
        }

        $notification = array(
            'message' => 'Product Image Updated  Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function ThambnailImageUpdate(Request $request)
    {
        $product_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);


        //création d'un id + nom unique avec l'extension de l'image
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        //l'extension laravel que nous avons installé
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        Product::findOrFail($product_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Product Image Thambnail Updated  Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function MultiImageDelete($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);
        MultiImg::FindOrFail($id)->delete();

        $notification = array(
            'message' => 'Product MultiImage  Deleted  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product Active  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product Inactive  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id)
    {
        //delete the thambnail image
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        //We must also delete the multiple image !
        $images = MultiImg::where('product_id', $id)->get(); // we get all the data
        foreach ($images as $img) {

            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ManageStock()
    {
        $products = Product::latest()->get();

        return view('backend.product.product_stock',compact('products'));
    }
}
