<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function displayAbout()
    {
        $setting = Setting::first();
        return view('page.about', compact('setting'));
    }

    public function displayNews()
    {
        $setting = Setting::first();
        return view('page.news', compact('setting'));
    }

    public function displayLogin()
    {
        $setting = Setting::first();
        return view('page.login', compact('setting'));
    }

    public function edit()
    {
        $setting = Setting::first();
        return view('setting.update', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update([
            'location'          => $request->input('location'),
            'hotline'           => $request->input('hotline'),
            'email'             => $request->input('email'),
            'time_active'       => $request->input('time_active'),
            'site_name'         => $request->input('site_name'),
            'site_description'  => $request->input('site_description'),  
        ]);

        return redirect()->route('setting.edit');
    }



}
