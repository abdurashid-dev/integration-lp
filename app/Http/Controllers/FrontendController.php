<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Technology;

class FrontendController extends Controller
{
    public function index()
    {
        $packages = Package::with('images', 'technologies', 'platforms')->get();
        $technologies = Technology::latest('id')->get();
        return view('welcome', compact('packages', 'technologies'));
    }

    public function filter($filter = null)
    {
        $packages = Package::with('images', 'technologies', 'platforms')->whereRelation('technologies.technology', 'technology_id', $filter)->get();
        $technologies = Technology::latest('id')->get();
        return view('welcome', compact('packages', 'technologies'));
    }

    public function package($id)
    {
        $package = Package::with('images', 'technologies', 'platforms')->where('id', $id)->first();
        return view('package', compact('package'));
    }
}
