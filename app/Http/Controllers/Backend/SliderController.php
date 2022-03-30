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

    public function SliderEdit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('sliders'));
    }

    public function SliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('slider_img')) {
            // quand on rajoute une image
            unlink($old_image); //unlink previous one

            //création d'un id + nom unique avec l'extension de l'image
            $image = $request->file('slider_img');
            $name_eng = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            //l'extension laravel que nous avons installé
            Image::make($image)->resize(2307, 807)->save('upload/slider/' . $name_eng);
            $save_url = 'upload/slider/' . $name_eng;

            Slider::FindOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' =>   $save_url,
            ]);

            $notifications = array(
                'message' => 'Slider Updated SuccessFuly !',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notifications);
        } else {
            // quand on ne rajoute pas d'image
            Slider::FindOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $notifications = array(
                'message' => 'Slider Updated without image SuccessFuly',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notifications);
        }
    }
}
