<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->latest()->paginate(15);
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        return back()->with('success', 'User "' . $validated['name'] . '" berhasil ditambahkan.');
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        if ($user->isAdmin()) {
            return back()->with('error', 'Tidak bisa menghapus akun admin.');
        }

        $name = $user->name;
        $user->delete();

        return back()->with('success', 'User "' . $name . '" berhasil dihapus.');
    }
}
