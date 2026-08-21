<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = SiteContent::orderBy('section')->orderBy('id')->get()->groupBy('section');
        return view('admin.content', compact('contents'));
    }

    public function update(Request $request, string $key)
    {
        $request->validate([
            'value' => ['nullable', 'string', 'max:5000'],
        ]);

        SiteContent::where('key', $key)->update(['value' => $request->input('value', '')]);

        return back()->with('success', 'Konten "' . $key . '" berhasil diperbarui.');
    }
}
