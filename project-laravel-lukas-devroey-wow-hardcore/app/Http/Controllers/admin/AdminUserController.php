<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        // Haal alle users op, behalve de huidige ingelogde admin (zodat je jezelf niet per ongeluk delete/demote)
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        // Toggle de boolean value
        $user->is_admin = !$user->is_admin;
        $user->save();

        return back()->with('success', 'Gebruikersrechten aangepast.');
    }

    public function store(Request $request)
    {
        // Server-side validatie
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'is_admin' => 'boolean'
        ]);

        // Manuele creatie
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $request->has('is_admin'), // Checkbox check
        ]);

        return back()->with('success', 'Gebruiker aangemaakt.');
    }
}
