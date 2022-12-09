<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnologyRequest;
use App\Http\Services\TechnologyService;

class TechnologyController extends Controller
{
    protected $service;
    public function __construct()
    {
        $this->service = new TechnologyService();
    }

    public function index()
    {
        return view('admin.technology.index');
    }

    public function create()
    {
        $technology = $this->service->create();
        return view('admin.technology.create', compact('technology'));
    }

    public function store(TechnologyRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.technologies.index')->with('success', 'Created!');
    }

    public function edit($id)
    {
        $technology = $this->service->edit($id);
        return view('admin.technology.edit', compact('technology'));
    }

    public function update(TechnologyRequest $request, $id)
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('admin.technologies.index')->with('success', 'Updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.technologies.index')->with('success', 'Deleted!');
    }
}
