<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::query()->get();
        $title = "Ayarlar";
        $sub_title = "";
        return view("admin.settings.settings", compact(["title", "sub_title", "settings"]));
    }

    public function edit($id)
    {
        $settings = Settings::query()->findOrFail($id);
        $title = "Ayarlar";
        $sub_title = "Güncelle";
        return view("admin.settings.settings_edit", compact(["title", "sub_title", "settings"]));
    }

    public function update(Request $request, $id)
    {
        $settings = Settings::query()->findOrFail($id);
        $settings->name = $request->settings_name;
        $settings->value = $request->settings_value;

        if ($settings->update()) {
            Session::put('update_settings', 'success');
        } else {
            Session::put('update_settings', 'error');
        };

        return redirect("panel/settings");
    }
}
