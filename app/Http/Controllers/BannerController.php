<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function edit()
    {
        $mainBanner = Banner::where('type', 'main')->first();
        $subBanner = Banner::where('type', 'sub')->get();
        return view('banner.update', compact('mainBanner', 'subBanner'));
    }

    public function update(Request $request)
    {
        $mainBanner = Banner::where('type', 'main')->first();
        $mainBanner->update([
            'banner_url'          => $request->input('location'),
        ]);

        return redirect()->route('banner.edit');
    }



}
