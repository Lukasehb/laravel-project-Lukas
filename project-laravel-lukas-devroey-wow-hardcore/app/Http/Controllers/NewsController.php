<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {

        $newsItems = NewsItem::latest()->get();


        return view('welcome', compact('newsItems'));
    }


    public function show(NewsItem $newsItem)
    {

        return view('news.show', compact('newsItem'));
    }
}
