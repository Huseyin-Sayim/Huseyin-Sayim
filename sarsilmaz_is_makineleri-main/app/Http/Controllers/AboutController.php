<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Settings;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $phone = Settings::query()->where("key", "=", "phone")->get();
        $address = Settings::query()->where("key", "=", "address")->get();
        $services = Service::query()->get();
        $about = Settings::query()->where("key", "=", "about")->get();
        return view("pages.about", compact(["services", "about", "phone", "address"]));
    }
}
