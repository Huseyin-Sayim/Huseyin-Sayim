<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $phone = Settings::query()->where("key", "=", "phone")->get();
        $address = Settings::query()->where("key", "=", "address")->get();
        $services = DB::table("services")->leftJoin("gallery", "services.service_image", "=", "gallery.id")->select("services.*", "gallery.media_url")->get();
        return view("pages.services", compact(["services", "phone", "address"]));
    }

    public function details ($id)
    {
        $phone = Settings::query()->where("key", "=", "phone")->get();
        $services = DB::table("services")->leftJoin("gallery", "services.service_image", "=", "gallery.id")->select("services.*", "gallery.media_url")->get();
        $service = Service::query()->findOrFail($id);
        $image = $service->gallery()->get();
        $address = Settings::query()->where("key", "=", "address")->get();
        return view('pages.service_details', compact(["services", "service", "image", "phone", "address"]));
    }
}
