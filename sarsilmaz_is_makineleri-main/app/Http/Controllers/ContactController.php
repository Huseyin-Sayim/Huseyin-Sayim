<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $maps = Settings::query()->where("key", "=", "maps")->get();
        $phone = Settings::query()->where("key", "=", "phone")->get();
        $address = Settings::query()->where("key", "=", "address")->get();
        $services = DB::table("services")->leftJoin("gallery", "services.service_image", "=", "gallery.id")->select("services.*", "gallery.media_url")->get();
        return view("pages.contact", compact(['services', 'maps', 'phone', "address"]));
    }
}
