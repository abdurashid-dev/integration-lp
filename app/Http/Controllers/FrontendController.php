<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Technology;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Homepage');
        SEOMeta::setDescription('Integrat is ready integration and any other packages for web artisans!');
        SEOMeta::setCanonical('https://integrat.uz');

        OpenGraph::setDescription('Integrat is ready integration and any other packages for web artisans!');
        OpenGraph::setTitle('Integrat');
        OpenGraph::setUrl('https://integrat.uz');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('seo-logo.jpg'));

        JsonLd::setTitle('Homepage');
        JsonLd::setDescription('Integrat is ready integration and any other packages for web artisans!');

        $packages = Package::with('images', 'technologies', 'platforms')->orderBy('order')->get();
        $technologies = Technology::orderBy('order')->get();
        return view('welcome', compact('packages', 'technologies'));
    }

    public function filter($filter = null)
    {
        $tech = Technology::where('slug', $filter)->first();
        $packages = Package::with('images', 'technologies', 'platforms')->whereRelation('technologies.technology', 'technology_id', $tech->id)->orderBy('order')->get();
        $technologies = Technology::orderBy('order')->get();

        SEOMeta::setTitle($tech->name . ' - packages');
        SEOMeta::setDescription($tech->name . ' - packages for web artisans!');
        SEOMeta::setCanonical('https://integrat.uz/filter/' . $filter);

        OpenGraph::setDescription($tech->name . ' - packages for web artisans!');
        OpenGraph::setTitle($tech->name . ' - packages');
        OpenGraph::setUrl('https://integrat.uz');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset($tech->image));

        JsonLd::setTitle($tech->name . ' - packages');
        JsonLd::setDescription($tech->name . ' - packages for web artisans!');

        return view('welcome', compact('packages', 'technologies', 'tech'));
    }

    public function package($slug)
    {
        $package = Package::with('images', 'technologies', 'platforms')->where('slug', $slug)->first();

        SEOMeta::setTitle($package->name);
        SEOMeta::setDescription(Str::limit($package->description, 250));
        SEOMeta::setCanonical('https://integrat.uz/package/' . $slug);

        OpenGraph::setDescription(Str::limit($package->description, 250));
        OpenGraph::setTitle($package->name);
        OpenGraph::setUrl('https://integrat.uz');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('seo-logo.jpg'));

        JsonLd::setTitle($package->name);
        JsonLd::setDescription(Str::limit($package->description, 250));

        return view('package', compact('package'));
    }
}
