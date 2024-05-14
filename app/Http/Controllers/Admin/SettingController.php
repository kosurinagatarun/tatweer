<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display the settings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $setting = Setting::firstOrCreate([]); // Retrieve or create a settings record
        return view('admin.settings.index', ['setting' => $setting]);
    }

    /**
     * Show the form for editing the settings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $setting = Setting::firstOrCreate([]);
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified settings in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|max:1024', // max 1MB
            'favicon' => 'nullable|image|max:512', // max 512KB
            'featured_image' => 'nullable|image|max:2048', // max 2MB
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'google_search_console' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'google_tag_manager' => 'nullable|string',
            'pixel_code' => 'nullable|string',
        ]);

        $setting = Setting::first();

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('settings', 'public');
            $setting->logo = $logoPath;
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('settings', 'public');
            $setting->favicon = $faviconPath;
        }

        if ($request->hasFile('featured_image')) {
            $featuredImagePath = $request->file('featured_image')->store('settings', 'public');
            $setting->featured_image = $featuredImagePath;
        }

        $setting->meta_title = $request->meta_title;
        $setting->meta_description = $request->meta_description;
        $setting->google_search_console = $request->google_search_console;
        $setting->google_analytics = $request->google_analytics;
        $setting->google_tag_manager = $request->google_tag_manager;
        $setting->pixel_code = $request->pixel_code;

        $setting->save();

        return redirect()->route('setting')->with('success', 'Settings updated successfully.');

    }
}
