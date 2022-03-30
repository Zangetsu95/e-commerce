<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\MultiImg;
use Image;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }

    public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_img' => 'required',
        ], [
            'slider_img_required' => "Please Select one image !"

        ]);

        //création d'un id + nom unique avec l'extension de l'image
        $image = $request->file('slider_img');
        $name_eng = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        //l'extension laravel que nous avons installé
        Image::make($image)->resize(2307, 807)->save('upload/slider/' . $name_eng);
        $save_url = 'upload/slider/' . $name_eng;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' =>   $save_url,
        ]);

        $notifications = array(
            'message' => 'Slider Image inserted SuccessFuly !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifications);
    } //end method
}
