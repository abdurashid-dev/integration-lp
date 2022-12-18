<?php

namespace App\Http\Controllers;

use App\Http\Services\TechnologyService;

class TechnologyController extends AbstractController
{
    protected $service;
    protected $dir = 'technologies';

    public function __construct()
    {
        $this->service = new TechnologyService();
    }
}
