<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Platform;

class FrontendController extends Controller
{
    public function index()
    {
        $packages = Package::with('images', 'technologies', 'platforms')->get();
        $platforms = Platform::latest('id')->get();
        return view('welcome', compact('packages', 'platforms'));
    }

    public function filter($filter = null)
    {
        $packages = Package::with('images', 'technologies', 'platforms')->whereRelation('platforms.platform', 'platform_id', $filter)->get();
        $platforms = Platform::latest('id')->get();
        return view('welcome', compact('packages', 'platforms'));
    }

    public function package($id)
    {
        $package = Package::with('images', 'technologies', 'platforms')->where('id', $id)->first();
        return view('package', compact('package'));
    }
}
