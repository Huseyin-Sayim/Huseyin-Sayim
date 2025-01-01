<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    public function index()
    {
        $title = 'Galeri';
        $sub_title = "Kütüphane";
        $gallery = Gallery::query()->get();
        return view("admin.gallery.gallery", compact(["title", "sub_title", "gallery"]));
    }

    public function create()
    {
        $title = 'Galeri';
        $sub_title = "Ekle";
        return view("admin.gallery.create_gallery", compact(["title", "sub_title"]));
    }

    public function store(Request $request)
    {
        $request->validate(['media' => 'required | image | mimes: jpeg,png,jpg,gif,webp',]);

        $gallery = new Gallery();
        $gallery->media_title = $request->media_title;
        $gallery->media_description = $request->media_description;


        $media_name = time() . '.' . $request->file('media')->extension();
        $mimeType = $request->file('media')->getMimeType();
        $request->file('media')->move(public_path('gallery'), $media_name);
        $media_path = "gallery/" . $media_name;

        $gallery->media_url = $media_path;
        $gallery->media_type = $mimeType;

        if ($gallery->save()) {
            Session::put("added_gallery", "success");
        } else {
            Session::put("added_gallery", "error");
        };
        return redirect("panel/gallery");
    }

    public function edit($id)
    {
        $image = Gallery::query()->findOrFail($id);
        $title = "Galeri";
        $sub_title = "Düzenle";
        return view("admin.gallery.gallery_edit", compact(["title", "sub_title", "image"]));
    }

    public function update (Request $request, $id)
    {
        $image = Gallery::query()->findOrFail($id);
        $image->media_title = $request->media_title;
        $image->media_description = $request->media_description;
        $image->media_status = $request->media_status;

        if ($image->update()) {
            Session::put("update_gallery", "success");
        } else {
            Session::put("update_gallery", "error");
        };
        return redirect("panel/gallery");
    }

    public function delete ($id) {
        $image = Gallery::query()->findOrFail($id);
        if ($image->delete()) {
            Session::put("delete_gallery", "success");
        } else {
            Session::put("delete_gallery", "success");
        };
        return redirect("panel/gallery");
    }
}
