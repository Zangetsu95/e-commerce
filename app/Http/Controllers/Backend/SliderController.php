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
        $slider = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('varname'));
    }
}
