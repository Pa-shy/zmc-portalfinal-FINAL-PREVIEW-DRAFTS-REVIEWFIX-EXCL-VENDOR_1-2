<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the Starlink-style Service Selection page.
     */
    public function index()
    {
        // This looks for resources/views/home.blade.php
        return view('home');
    }
}