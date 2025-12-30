<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('items')->get();
        return view('admin.faq.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        FaqCategory::create($request->only('name'));
        return back()->with('success', 'Categorie toegevoegd!');
    }

    public function destroyCategory(FaqCategory $category)
    {
        $category->delete();
        return back()->with('success', 'Categorie verwijderd!');
    }

    public function createItem()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.create', compact('categories'));
    }

    public function storeItem(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        FaqItem::create($request->all());
        return redirect()->route('admin.faq.index')->with('success', 'Vraag toegevoegd!');
    }

    public function destroyItem(FaqItem $faqItem)
    {
        $faqItem->delete();
        return back()->with('success', 'Vraag verwijderd!');
    }
}
