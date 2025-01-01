<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function index ()
    {
        $services = DB::table('services')->leftJoin('gallery', 'services.service_image', '=', 'gallery.id')->select('services.*', 'gallery.media_url')->get();
        $title = "Hizmetler";
        $sub_title = "";
        return view('admin.services.service', compact(["title", "sub_title", "services"]));
    }

    public function create ()
    {
        $gallery = Gallery::query()->get();
        $title = "Hizmetler";
        $sub_title = "Ekle";
        return view("admin.services.create_service", compact(["title", "sub_title", "gallery"]));
    }

    public function store(Request $request)
    {
        $service = new Service();
        $service->service_title = $request->service_title;
        $service->service_intro_text = $request->service_intro_text;
        $service->service_description = $request->service_description;
        $service->service_image = $request->service_image;

        if ($service->save()) {
            Session::put('add_service', 'success');
        } else {
            Session::put('add_service', 'error');
        };

        return redirect("panel/service");
    }

    public function edit($id)
    {
        $service = Service::query()->findOrFail($id);
        $image = $service->gallery()->get();
        $gallery = Gallery::query()->get();
        $title = "Hizmetler";
        $sub_title = "Ekle";
        return view("admin.services.edit_service", compact(["title", "sub_title", "service", "image", "gallery"]));
    }

    public function update (Request $request, $id)
    {
        $service = Service::query()->findOrFail($id);
        $service->service_title = $request->service_title;
        $service->service_intro_text = $request->service_intro_text;
        $service->service_description = $request->service_description;
        $service->service_image = $request->service_image;

        if ($service->update()) {
            Session::put('update_service', 'success');
        } else {
            Session::put('update_service', 'error');
        };

        return redirect("panel/service");
    }

    public function delete($id)
    {
        $service = Service::query()->findOrFail($id);

        if ($service->delete()) {
            Session::put('delete_service', 'success');
        } else {
            Session::put('delete_service', 'error');
        };

        return redirect("panel/service");
    }
}
