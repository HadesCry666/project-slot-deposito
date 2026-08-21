<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;

class SimulatorController extends Controller
{
    public function index()
    {
        $content = SiteContent::allAsArray();
        return view('simulator', compact('content'));
    }
}
