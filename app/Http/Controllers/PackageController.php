<?php

namespace App\Http\Controllers;

use App\Http\Services\PackageService;

class PackageController extends AbstractController
{
    protected $service;
    protected $dir = 'packagies';

    public function __construct()
    {
        $this->service = new PackageService();
    }
}
