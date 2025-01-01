<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $blogs = DB::table("blog")->leftJoin("gallery", "blog.blog_image", "=", "gallery.id")->select("blog.*", "gallery.media_url")->limit(3)->get();
        $services = DB::table("services")->leftJoin("gallery", "services.service_image", "=", "gallery.id")->select("services.*", "gallery.media_url")->get();
        $about = Settings::query()->where("key", "=", "about")->get();
        $phone = Settings::query()->where("key", "=", "phone")->get();
        $why_choose = Settings::query()->where("key", "=", "why_choose_us")->get();
        $address = Settings::query()->where("key", "=", "address")->get();
        return view("index", compact(["blogs", "about", "services", "why_choose", 'phone', 'address']));
    }
}
