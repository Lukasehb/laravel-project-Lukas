<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Eager Loading ('with') om N+1 probleem te voorkomen
        // Dit haalt Categorieën op INCLUSIEF hun items in 2 queries i.p.v. 100
        $categories = FaqCategory::with('items')->get();

        return view('faq.index', compact('categories'));
    }
}
