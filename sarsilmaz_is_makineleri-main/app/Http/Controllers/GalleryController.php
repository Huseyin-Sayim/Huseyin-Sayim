<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        $phone = Settings::query()->where("key", "=", "phone")->get();
        $address = Settings::query()->where("key", "=", "address")->get();
        $gallery = Gallery::query()->where("media_status", "=", "1")->get();
        $services = DB::table("services")->leftJoin("gallery", "services.service_image", "=", "gallery.id")->select("services.*", "gallery.media_url")->get();
        return view("pages.gallery", compact(['gallery', 'services', 'phone', 'address']));
    }
}
