<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'tags' => 'array', // Verwacht een array van tag IDs
            'tags.*' => 'exists:tags,id' // Check of ID bestaat in tags tabel
        ]);

        $path = $request->file('image')->store('news', 'public');

        $newsItem = NewsItem::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $path,
            'published_at' => now(),
        ]);

        // Many-to-Many koppeling leggen (Pivot table invullen)
        // $request->tags bevat array van IDs, bijv: [1, 3]
        if ($request->has('tags')) {
            $newsItem->tags()->attach($request->tags);
        }

        return redirect()->route('admin.news.index');
    }

    public function update(Request $request, NewsItem $newsItem)
    {
        // ... validatie ...

        // Bij update gebruik je sync() in plaats van attach()
        // sync() verwijdert oude relaties en voegt de nieuwe toe
        if ($request->has('tags')) {
            $newsItem->tags()->sync($request->tags);
        }

        // ... update logic ...
    }
}
