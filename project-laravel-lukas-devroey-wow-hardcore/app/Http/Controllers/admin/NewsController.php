<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Toon lijst met nieuwsberichten.
     */
    public function index()
    {
        $newsItems = NewsItem::latest()->paginate(10);
        return view('admin.news.index', compact('newsItems'));
    }

    /**
     * Toon formulier om nieuw bericht te maken.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Sla nieuw bericht op in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('news_images', 'public');
        }

        NewsItem::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
            'image_path' => $validated['image_path'] ?? null,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem aangemaakt!');
    }

    /**
     * Toon bewerk formulier.
     */
    public function edit(NewsItem $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update bestaand bericht.
     */
    public function update(Request $request, NewsItem $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Oude foto verwijderen indien aanwezig
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('news_images', 'public');
        }

        $news->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
            'image_path' => $validated['image_path'] ?? $news->image_path,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem bijgewerkt!');
    }

    /**
     * Verwijder bericht.
     */
    public function destroy(NewsItem $news)
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem verwijderd.');
    }
}
