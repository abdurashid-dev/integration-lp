<?php

namespace App\Http\Controllers;

use App\Http\Services\PlatformService;

class PlatformController extends AbstractController
{
    protected $dir = 'platforms';
    protected $service;

    public function __construct()
    {
        $this->service = new PlatformService();
    }
}
