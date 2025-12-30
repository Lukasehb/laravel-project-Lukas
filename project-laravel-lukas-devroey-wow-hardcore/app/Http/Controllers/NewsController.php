<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        // Haal nieuws op, gesorteerd op nieuwste eerst
        $newsItems = NewsItem::latest()->get();

        // Verwijs naar de PUBLIEKE map: news.index
        return view('news.index', compact('newsItems'));
    }

    public function show(NewsItem $newsItem): View
    {
        return view('news.show', compact('newsItem'));
    }
}
