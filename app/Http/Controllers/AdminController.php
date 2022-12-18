<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function setCookie($cookie)
    {
        if ($cookie == 'darkMode') {
            Cookie::queue('darkMode', true);
        } elseif ($cookie == 'lightMode') {
            Cookie::queue('darkMode', false);
        }
        return back();
    }
}
