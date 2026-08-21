<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;

class HomeController extends Controller
{
    public function index()
    {
        $content = SiteContent::allAsArray();
        return view('home', compact('content'));
    }
}
