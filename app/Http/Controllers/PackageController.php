<?php

namespace App\Http\Controllers;

use App\Http\Services\PackageService;

class PackageController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new PackageService();
    }

    public function index()
    {
        return view('admin.package.index');
    }
}
