<?php

namespace App\Http\Controllers;

use App\Models\Package;

class FrontendController extends Controller
{
    public function index()
    {
        $packages = Package::with('images', 'technologies', 'platforms')->get();
        return view('welcome', compact('packages'));
    }

    public function package($id)
    {
        $package = Package::with('images', 'technologies', 'platforms')->where('id', $id)->first();
        return view('package', compact('package'));
    }
}
