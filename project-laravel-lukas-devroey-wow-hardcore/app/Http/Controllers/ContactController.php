<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        // Verstuur mail
        Mail::to('admin@ehb.be')->send(new \App\Mail\ContactFormMail($data));

        return back()->with('success', 'Bericht verzonden!');
    }
}
