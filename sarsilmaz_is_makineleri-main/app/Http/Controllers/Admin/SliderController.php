<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = DB::table('slider')->leftJoin('gallery', 'slider.slider_image', '=', 'gallery.id')->select('slider.*', 'gallery.media_url')->get();
        $title = "Slider";
        $sub_title = "";
        return view("admin.slider.slider", compact(["title", "sub_title", "sliders"]));
    }

    public function create ()
    {
        $gallery = Gallery::query()->get();
        $title = "Slider";
        $sub_title = "Ekle";
        return view("admin.slider.create_slider", compact(["title", "sub_title", "gallery"]));
    }

    public function store (Request $request)
    {
        $slider = new Slider();
        $slider->slider_title = $request->slider_title;
        $slider->slider_description = $request->slider_description;
        $slider->slider_image = $request->slider_image;
        $slider->slider_button = $request->slider_button;

        if ($slider->save()) {
            Session::put('add_slider', 'success');
        } else {
            Session::put('add_slider', 'error');
        };

        return redirect("panel/slider");
    }

    public function edit ($id)
    {
        $slider = Slider::query()->findOrFail($id);
        $image = $slider->gallery()->get();
        $gallery = Gallery::query()->get();
        $title = "Slider";
        $sub_title = "Güncelle";
        return view("admin.slider.edit_slider", compact(["title", "sub_title", "slider", "image", "gallery"]));
    }

    public function update (Request $request, $id)
    {
        $slider = Slider::query()->findOrFail($id);
        $slider->slider_title = $request->slider_title;
        $slider->slider_description = $request->slider_description;
        $slider->slider_image = $request->slider_image;
        $slider->slider_button = $request->slider_button;

        if ($slider->update()) {
            Session::put('update_slider', 'success');
        } else {
            Session::put('update_slider', 'error');
        };

        return redirect("panel/slider");
    }

    public function delete ($id)
    {
        $slider = Slider::query()->findOrFail($id);
        if ($slider->delete()) {
            Session::put('delete_slider', 'success');
        } else {
            Session::put('delete_slider', 'error');
        };

        return redirect("panel/slider");
    }
}
