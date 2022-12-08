<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        return view('admin.technology.index');
    }
}
