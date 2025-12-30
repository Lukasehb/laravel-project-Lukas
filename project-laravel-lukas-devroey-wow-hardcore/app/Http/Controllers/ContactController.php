<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Stuur naar de hardcoded admin email zoals gevraagd
        Mail::to('admin@ehb.be')->send(new ContactFormMail($validated));

        return back()->with('success', 'Je bericht is verzonden naar de Horde warchief!');
    }
}
