<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $pluginPath = base_path('plugins');
        $plugins = File::directories($pluginPath);

        return view('admin.settings.index', compact('settings', 'plugins'));
    }

    public function update(Request $request)
    {
        // Haal alle request data op
        $data = $request->all();

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['name' => $key], ['value' => $value]);
        }

        // Log voor debugging
        \Log::info('Instellingen bijgewerkt', $data);

        return response()->json(['success' => true]);
    }

    public function installPlugin($name)
    {
        Artisan::call('install:plugin', ['name' => $name]);
        return response()->json(['success' => true]);
    }

    public function uninstallPlugin($name)
    {
        Artisan::call('uninstall:plugin', ['name' => $name]);
        return response()->json(['success' => true]);
    }
} 