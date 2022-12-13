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

    public function show($id)
    {
        $item = $this->service->show($id);
        return view('admin.packages.show', compact('item'));
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
            'price' => 'required',
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

    public function edit($id)
    {
        [$technologies, $platforms, $item] = $this->service->edit($id);
        return view('admin.packages.edit', compact('item', 'technologies', 'platforms'));
    }

    public function update($id)
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'sometimes',
            'link' => 'sometimes',
            'type' => 'required',
            'status' => 'sometimes',
            'images' => 'sometimes',
            'technologies' => 'required',
            'platforms' => 'required',
        ]);
        $this->service->update($data, $id);
        return redirect()->route('admin.packages.index')->with('success', 'Updated!');
    }
}
