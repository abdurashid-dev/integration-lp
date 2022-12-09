<?php

namespace App\Http\Controllers;

use App\Http\Services\PackageService;

class PackageController extends AbstractController
{
    protected $service;
    protected $dir = 'packages';

    public function __construct()
    {
        $this->service = new PackageService();
    }

    public function create()
    {
        [$technologies, $platforms, $item] = $this->service->create();
        return view('admin.packages.create', compact('technologies', 'platforms', 'item'));
    }

    public function store()
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'price' => 'sometimes',
            'description' => 'sometimes',
            'link' => 'sometimes',
            'type' => 'required',
            'status' => 'sometimes',
            'images' => 'sometimes',
            'technologies' => 'required',
            'platforms' => 'required',
        ]);
        $this->service->store($data);
        return redirect()->route('admin.packages.index')->with('success', 'Created!');
    }
}
