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
}
