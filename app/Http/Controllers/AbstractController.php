<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbstractController extends Controller
{
    //comment
    protected $dir;
    protected $service;

    public function index()
    {
        return view('admin.' . $this->dir . '.index');
    }

    public function show($id)
    {
        $item = $this->service->show($id);
        return view('admin.' . $this->dir . '.show', compact('item'));
    }

    public function create()
    {
        $item = $this->service->create();
        return view('admin.' . $this->dir . '.create', compact('item'));
    }

    public function store()
    {
        $this->service->store(request()->all());
        return redirect()->route('admin.' . $this->dir . '.index')->with('success', 'Created!');
    }

    public function edit($id)
    {
        $item = $this->service->edit($id);
        return view('admin.' . $this->dir . '.edit', compact('item'));
    }

    public function update($id)
    {
        $this->service->update(request()->all(), $id);
        return redirect()->route('admin.' . $this->dir . '.index')->with('success', 'Updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.' . $this->dir . '.index')->with('success', 'Deleted!');
    }
}
